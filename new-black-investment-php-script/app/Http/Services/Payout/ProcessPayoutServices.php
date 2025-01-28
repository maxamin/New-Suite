<?php
namespace App\Http\Services\Payout;

use App\Http\Services\Payout\Bank\ProcessBankPayoutServices;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class ProcessPayoutServices
{
    private $bank;

    public function __construct(
        ProcessBankPayoutServices $bank
    )
    {
        $this->bank = $bank;
    }

    /**
     * Payout Transfer
     * 
     * @param string phone Number
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     * @param string bank code
     * @param string bank name
     * @param string account number
     * @param string account name
     * @param string swift code
     * @param string id type
     * @param string id number
     * @param string narration
     */
    public function payout(
        string $phoneNumber = null,
        string $reference,
        string $currency,
        string $amount,
        string $method,
        string $bank_code,
        string $bank_name = null,
        string $account_number,
        string $account_name,
        string $swift_code = null,
        string $id_type = null,
        string $id_number = null,
        string $narration = null
    )
    {
        try {

            // Process
            $payment = $this->bank->transfer($phoneNumber, $reference, $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $swift_code, $id_type, $id_number, $narration);

            // Exception
            if($payment instanceof \Exception) throw new \Exception($payment->getMessage());

            // Response
            return $payment;

        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }
}
