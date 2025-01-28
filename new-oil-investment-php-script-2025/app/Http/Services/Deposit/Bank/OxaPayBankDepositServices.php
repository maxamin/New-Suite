<?php

namespace App\Http\Services\Deposit\Bank;

use App\Http\Services\Deposit\Bank\Util\ResponseBankUtilDepositServices;
use App\Models\BankList;
use App\Models\PaymentMethod;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class OxaPayBankDepositServices
{

    /**
     * Deposit Payment
     *
     * @param string reference
     * @param string network
     * @param string amount
     * @param string method
     */
    public function deposit(
        string $reference,
        string $network,
        string $amount,
        string $method
    ) {
        try {

            // Network check
            $network = BankList::where(['bank_code' => $network])->first();

            // Network not exist
            if(!$network) throw new \Exception("Network $network not available");

            // Request Body
            $requestBody = array(
                "merchant" => "*****",
                "currency" => $network->currency,
                "network" => $network->bank_code,
                "callbackUrl" => URL::route('ipn.oxapay'),
                "description" => "Order ".$reference,
                "orderId" => $reference
            );

            // Send Curl Request
            $sendRequest = $this->curlRequest('POST', 'merchants/request/staticaddress', $requestBody);

            // Exception
            if ($sendRequest instanceof \Exception) throw new \Exception($sendRequest->getMessage());

            // Format Response
            $response = ResponseBankUtilDepositServices::response(200, 2, true, $reference, $reference, $network->currency, 0, $method, null, $sendRequest['network'], $sendRequest['address']);

            // Response
            return $response;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Cur Request
     * send request
     *
     * @param string method
     * @param string endpoint
     * @param string body
     */
    public function curlRequest(
        string $method,
        string $endpoint,
        array $body = []
    ) {

        try {

            //return json_decode('{ "result": 100, "message": "Successful operation", "address": "0xD7957Ffd4Eb0B74eb443DEMOB2D3b0658bf'.$body['network'].'", "currency": "USDT", "network": "'.$body['network'].'" }', true);

            // Find Setting
            $setting = PaymentMethod::where(['tag' => 'oxapay', 'status' => 'active'])->first();

            // Exception
            if(!$setting) throw new \Exception("Service not enabled at the moment");

            // Parse setting
            $setting = json_decode($setting->settings);

            $body['merchant'] = $setting->payin_key->value;

            // Convert request data to JSON
            $jsonData = json_encode($body);

            // Curl Request
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.oxapay.com/' . $endpoint,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_POSTFIELDS => $jsonData,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            // there was an error contacting
            if ($err) throw new \Exception('Curl returned error: ' . $err);

            // Convert Json to Json Array
            $response_array = json_decode($response, true);

            // Check status
            if (!in_array($httpcode, ['200'])) throw new \Exception($response_array['message']);

            // Check if successful
            if (!in_array($response_array['result'], ['200', '100'])) throw new \Exception($response_array['message']);


            return $response_array;
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }
}
