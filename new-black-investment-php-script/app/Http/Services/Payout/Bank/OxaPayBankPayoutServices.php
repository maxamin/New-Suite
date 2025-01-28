<?php
namespace App\Http\Services\Payout\Bank;

use App\Http\Services\Payout\Bank\Util\ResponseBankUtilPayoutServices;
use App\Models\BankList;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\URL;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class OxaPayBankPayoutServices
{
    
    /**
     * Transfer Payment
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
     * @param string id type
     * @param string id number
     * @param string narration
     */
    public function transfer(
        string $phoneNumber = null,
        string $reference,
        string $currency,
        string $amount,
        string $method,
        string $bank_code,
        string $bank_name = null,
        string $account_number,
        string $account_name,
        string $id_type = null,
        string $id_number = null,
        string $narration = null
    )
    {
        try {

            // Get Support Code
            $bank_list = BankList::where(['bank_code' => $bank_code, 'status' => 1])->first();

            // Exception
            if(!$bank_list) redirect()->route('mybank')->with("error", "Network $bank_code not available. Please update your address info again");

            // Request Body
            $requestBody = array(
                "key" => '****',
                "currency" => $bank_list->currency,
                "network" => $bank_code,
                "address" => $account_number,
                "amount" => $amount,
                "callbackUrl" => '' . URL::route('ipn.oxapay') . ''
            );

            // Send Curl Request
            $sendRequest = $this->curlRequest('POST', 'api/send', $requestBody);

            // Exception
            if($sendRequest instanceof \Exception) throw new \Exception($sendRequest->getMessage());

            // Format Response
            $response = ResponseBankUtilPayoutServices::response(200, 2, true, $reference, $sendRequest['trackId'], $currency, $amount, $method, $bank_code, $bank_name, $account_number, $account_name, $narration);

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

            //return json_decode('{ "result": 100, "message": "Successful operation", "trackId": "'.time().'", "status": "Complete" }', true);

            // Find Setting
            $setting = PaymentMethod::where(['tag' => 'oxapay', 'status' => 'active'])->first();

            // Exception
            if(!$setting) throw new \Exception("Service not enabled at the moment");

            // Parse setting
            $setting = json_decode($setting->settings);
            
            $body['key'] = $setting->payout_key->value;

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
