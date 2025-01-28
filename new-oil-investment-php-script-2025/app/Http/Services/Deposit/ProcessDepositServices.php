<?php
namespace App\Http\Services\Deposit;

use App\Http\Services\Deposit\Bank\ProcessBankDepositServices;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class ProcessDepositServices
{
    private $bank;

    public function __construct(
        ProcessBankDepositServices $bank
    )
    {
        $this->bank = $bank;
    }

    /**
     * Deposit Payment
     * 
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     */
    public function deposit(
        string $reference,
        string $currency,
        string $amount,
        string $method
    )
    {
        try {

            // Process
            $payment = $this->bank->deposit($reference, $currency, $amount, $method);

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
