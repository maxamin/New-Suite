<?php
namespace App\Http\Services\Payout\Bank;

use App\Models\Setting;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class ProcessBankPayoutServices
{
    private $oxapay;

    public function __construct(
        OxaPayBankPayoutServices $oxapay
    )
    {
        $this->oxapay = $oxapay;
    }

    /**
     * Transfer Payment
     *
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     * @param string bank code
     * @param string bank name
     * @param string account number
     * @param string account name
     * @param string id number
     * @param string narration
     */
    public function transfer(
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

            // Hold User
            $setting = Setting::first();

            // Verify transfer Type
            if(!in_array($setting->auto_transfer_default, ['oxapay'])) throw new \Exception("Payout method not available at the moment");

            // Watch Pay
            if(in_array($setting->auto_transfer_default, ['oxapay'])) {
                $payment = $this->oxapay->transfer($reference, $currency, $amount, $method, $bank_code, $account_number, $account_name, $narration);
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
