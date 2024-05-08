<?php


namespace App\Services;


use Ramsey\Uuid\Uuid;

class PaydunyaService
{

    private $base_url;
    /**
     * PaydunyaService constructor.
     */
    public function __construct()
    {
        $this->base_url = (env('APP_ENV') == 'local') ? 'https://app.paydunya.com/api/v1/' : 'https://app.paydunya.com/sandbox-api/v1/';;
    }

    public function make_transfert($item)
    {
        $data=[
            'account_alias'=>$item['phone'],
            'amount'=>$item['amount'],
            'withdraw_mode'=>$item['draw']
        ];
        $response = $this->cURL($this->base_url . "disburse/get-invoice", $data);
        logger(json_encode($response));
        if ($response->response_code=='00'){
            $txnid = Uuid::uuid4();
            $soud=[
                'disburse_invoice'=>$response->disburse_token,
                'disburse_id'=>$txnid
            ];
            $response_ = $this->cURL($this->base_url . "disburse/submit-invoice", $soud);
            return $response_;
        }else{
            return $response;
        }
    }
    private function getDraw($method){
        switch (strtolower($method)){
            case 'moov benin':
                return 'moov-benin';
            case 'mtn benin':
                return 'mtn-benin';
            case 'free senegal':
                return 'free-money-senegal';
            case 'wave benin':
                return 'wave-senegal';
            case 'orange senegal':
                return 'orange-money-senegal';
            case 'mtn cote d ivoire':
                return 'mtn-ci';
            case 'orange cote d ivoire':
                return 'orange-money-ci';
            case 'moov cote d ivoire':
                return 'moov-ci';
            case 'tmoney togo':
                return 't-money-togo';
            case 'orange mali':
                return 'orange-money-mali';
            /*            case 'orange cameroun':
                            return 'orange-money-cameroun';
                        case 'mtn cameroun':
                            return 'mtn-money-mali';*/
            default:
                return 'mtn-ci';
        }
    }
    protected function cURL($url, $json)
    {

        // Create curl resource
        $ch = curl_init($url);

        // Request headers
        $headers = array(
            'Content-Type:application/json',
            "PAYDUNYA-MASTER-KEY: ".env("PAYDUNYA_PRINCIPAL"),
            "PAYDUNYA-PRIVATE-KEY: ".env("PAYDUNYA_SECRET_KEY"),
            "PAYDUNYA-TOKEN: ".env("PAYDUNYA_TOKEN")
        );
        // Return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $output contains the output string
        $output = curl_exec($ch);

        // Close curl resource to free up system resources
        curl_close($ch);
        return json_decode($output);
    }
}
