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
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     * @param string bank code
     * @param string account number
     * @param string account name
     * @param string narration
     */
    public function payout(
        string $reference,
        string $currency,
        string $amount,
        string $method,
        string $bank_code,
        string $account_number,
        string $account_name,
        string $narration = null
    )
    {
        try {

            // Process
            $payment = $this->bank->transfer($reference, $currency, $amount, $method, $bank_code, $account_number, $account_name, $narration);

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
