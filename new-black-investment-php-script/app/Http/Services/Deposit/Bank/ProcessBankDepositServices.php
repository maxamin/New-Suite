<?php
namespace App\Http\Services\Deposit\Bank;

use App\Models\Setting;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class ProcessBankDepositServices
{
    private $oxapay;

    public function __construct(
        OxaPayBankDepositServices $oxapay
    )
    {
        $this->oxapay = $oxapay;
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

            // Hold User
            $setting = Setting::first();

            if($setting->auto_deposit != 1) throw new \Exception("Service not available. Try again later");

            // Verify deposit Type
            if(!in_array($method, ['oxapay'])) throw new \Exception("Deposit method not available at the moment");

            // Oxa Pay
            if(in_array($method, ['oxapay'])) {
                $payment = $this->oxapay->deposit($reference, $currency, $amount, $method);
            }

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
