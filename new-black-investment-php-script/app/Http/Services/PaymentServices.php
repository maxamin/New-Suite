<?php
namespace App\Http\Services;

use App\Http\Services\Deposit\ProcessDepositServices;
use App\Http\Services\Payout\ProcessPayoutServices;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class PaymentServices
{
    private $deposit;
    private $payout;

    public function __construct(
        ProcessDepositServices $deposit,
        ProcessPayoutServices $payout
    )
    {
        $this->deposit = $deposit;
        $this->payout = $payout;
    }

    /**
     * Deposit
     * 
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     */
    function charge(
        string $reference,
        string $currency,
        string $amount,
        string $method
    ){
        try {

            // Send Request
            $payment = $this->deposit->deposit($reference, $currency, $amount, $method);

            // Exception
            if($payment instanceof \Exception) throw new \Exception($payment->getMessage());

            // Response
            return array('status' => true, 'data' => $payment, 'message' => 'Successful');
        } catch (\Exception $th) {
            //throw $th;
            return array('status' => false, 'message' => $th->getMessage());
        }
    }

    /**
     * Payout
     * 
     * @param string phone Number
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     * @param string bank code
     * @param string account number
     * @param string account name
     * @param string swift code
     * @param string id type
     * @param string id number
     * @param string narration
     */
    function payout(
        string $phoneNumber = null,
        string $reference,
        string $currency,
        string $amount,
        string $method,
        string $bank_code,
        string $account_number,
        string $account_name,
        string $swift_code = null,
        string $id_type = null,
        string $id_number = null,
        string $narration = null
    ){
        try {

            // Narration
            $narration = ($narration) ? $narration : 'Transfer payment for '.$account_name;

            // Send Request
            $payment = $this->payout->payout($phoneNumber, $reference, $currency, $amount, $method, $bank_code, null, $account_number, $account_name, $swift_code, $id_type, $id_number, $narration);

            // Exception
            if($payment instanceof \Exception) throw new \Exception($payment->getMessage());

            // Response
            return array('status' => true, 'data' => $payment, 'message' => 'Successful');
        } catch (\Exception $th) {
            //throw $th;
            return array('status' => false, 'message' => $th->getMessage());
        }
    }

}
