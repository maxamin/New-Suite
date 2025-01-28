<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CryptoWallet;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class IpnOxaPayController extends Controller
{
    public function ipn(Request $request)
    {

        try {

            // Validate request
            $validator = Validator::make($request->all(), [
                'type' => 'required|in:payment,payout',
                'trackId' => 'required',
                'txID' => 'required',
                'amount' => 'required',
                'address' => '',
                'status' => 'required|in:Paid,Completed,Rejected'
            ]);

            // Validation Failed
            if ($validator->fails()) throw new \Exception(implode('...', $validator->errors()->all()));

            // Deposit Handle
            if(in_array($request->type, ['payment']) && $request->status == 'Paid') {
                $updateData = self::updateDeposit($request->address, $request->amount, $request->all());
            }

            // Payout Handle
            if(in_array($request->type, ['payout'])) {
                $updateData = self::updatePayout($request->status, $request->trackId, $request->amount, $request->all());
            }

            // Exception
            if($updateData instanceof \Exception) throw new \Exception($updateData->getMessage());

            $notify = ['success' => true, 'message'=> 'Transaction was successful'];
            return response($notify, 200);
        } catch (\Exception $th) {
            //throw $th;
            $notify = ['success' => false, 'message' => $th->getMessage()];
            return response($notify, 400);
        }

    }//

    /**
     * Deposit update transaction
     */
    public static function updateDeposit(
        string $reference,
        string $amount,
        array $data
    ) {
        try {

            // Find Transaction
            $transaction = Deposit::where('transaction_id', $data['txID'])->first();

            // Verify is transaction exisit
            if ($transaction) throw new \Exception('Transaction was already complete');

            // Method
            $method = PaymentMethod::where('tag', 'oxapay')->first();

            // Find Crypto Wallet
            $wallet = CryptoWallet::where(['address' => $reference])->first();

            // Verify wallet
            if(!$wallet) throw new \Exception("Wallet not available");


            $final_amount = 0;
            $charge = 0;
            if ($method->recharge_charge > 0){
                $charge = ($method->recharge_charge * $amount) / 100;
            }

            $final_amount = $amount - $charge;
            $actual_receive_amount = $final_amount * $wallet->bank->rate;

            $transaction = new Deposit();
            $transaction->user_id = $wallet->user_id;
            $transaction->method_name = 'OxaPay';
            $transaction->order_id = rand(00000,99999);
            $transaction->transaction_id = $data['txID'];
            $transaction->number = $wallet->address;
            $transaction->amount = $amount;
            $transaction->charge_amount = $charge;
            $transaction->final_amount = $final_amount;
            $transaction->date = date('d-m-Y H:i:s');
            $transaction->data = json_encode($data);
            $transaction->status = 'approved';
            $transaction->save();

            $user = User::find($wallet->user_id);

            // Update user balance
            $user->deposit_balance = $user->deposit_balance + $actual_receive_amount;
            $user->save();

            return $transaction;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Payout update transaction
     */
    public static function updatePayout(
        string $status,
        string $reference,
        string $amount,
        array $data
    ) {
        try {
            // Find payout
            $payout = Withdrawal::where('order_id', $reference)->first();

            // Verify is payout exisit
            if (!$payout) throw new \Exception('Transaction not found');

            $user = User::find($payout->user_id);

            // Verify if payout status not complete
            if (in_array($payout->status, ['rejected'])) throw new \Exception('Transaction was already complete');

            // Verify successful status
            if(in_array($status, ['Complete'])) {
                // Update payout
                $payout->status = 'approved';
                $payout->save();
            }

            // Verify failed status | Refund amount to user
            if(in_array($status, ['Rejected'])) {
                // Update payout
                $payout->status = 'rejected';
                $payout->save();

                // Refund amount to User Wallet
                $user->balance = $user->balance + $payout->amount;
                $user->save();
            }

            return $payout;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }
}
