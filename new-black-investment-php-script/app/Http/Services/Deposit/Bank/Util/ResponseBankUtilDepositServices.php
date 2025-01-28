<?php
namespace App\Http\Services\Deposit\Bank\Util;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class ResponseBankUtilDepositServices
{
    
    /**
     * Format Deposit Payment
     * 
     * @param int status
     * @param int status id
     * @param bool auto
     * @param string reference
     * @param string currency
     * @param string amount
     * @param string method
     * @param string link
     * @param string network
     * @param string address
     * 
     * @return array
     */
    public static function response(
        int $status,
        int $status_id,
        bool $auto,
        string $reference,
        string $orderRef,
        string $currency,
        string $amount = '0',
        string $method,
        string $link = null,
        string $network = null,
        string $address = null
    )
    {

        // Data method
        $data = [
            'status' => $status,
            'auto' => $auto,
            'reference' => $reference,
            'order_ref' => $orderRef,
            'method' => $method,
            'currency' => $currency,
            'network' => strtolower($network),
            'address' => $address,
            'amount' => number_format($amount, 2, '.', ''),
            'link' => $link,
            'status_id' => $status_id
        ];

        // Response
        return $data;
    }
}
