<?php


namespace App\Services;


use Flutterwave\Controller\PaymentController;
use Flutterwave\Flutterwave;
use Flutterwave\Library\Modal;
use Flutterwave\EventHandlers\MomoEventHandler as PaymentHandler;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class FlutterwareService
{
    public function initialize($user_data)
    {
        Flutterwave::setUp([
            'public_key'=>env('FLUTTER_PUBLIC_KEY'),
            'secret_key'=>env('FLUTTER_SECRET_KEY'),
            'encryption_key'=>env('FLUTTER_ENCRYTION_KEY'),
            'environment'=>'staging'
        ]);
        //This generates a payment reference
        try {
            Flutterwave::bootstrap();
            $customHandler = new PaymentHandler();
            $client = new Flutterwave();
            $modalType = Modal::POPUP; // Modal::POPUP or Modal::STANDARD
            $controller = new PaymentController( $client, $customHandler, $modalType );
        } catch(\Exception $e ) {
            echo $e->getMessage();
        }
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer,mobilemoneyfranco',
            'amount' => $user_data['amount'], //hard coded
            'email' => Auth::user()->email,
            'tx_ref' => Flutterwave::create(),
            'currency' => "xaf",
            'redirect_url' => $user_data['flutterwave_callback'],
            'customer' => [
                'email' => $user_data['email'],
                "phone_number" => $user_data['phone'],
                "name" => $user_data['name'],
            ],

            "customizations" => [
                "title" => "",
                "description" => null,
            ]
        ];

        return  $controller->process($data);

/*        if ($payment['status'] !== 'success') {
            //return to callback


            //payment-fail if no callback

            return \redirect()->route('payment-fail');
        }
        return redirect($payment['data']['link']);*/

    }
    public function make_transfert($user_data)
    {
        logger(env("FLUTTER_SECRET_KEY"));
        $url="https://api.flutterwave.com/v3/payments";
        $txnid = Uuid::uuid4();
        $data = [
            'payment_options' => 'card,banktransfer,mobilemoneyfranco',
            'amount' => strval($user_data['amount']),
            'email' => Auth::user()->email,
            'tx_ref' => $txnid,
            'currency' => "usd",
            'redirect_url' => $user_data['flutterwave_callback'],
            'customer' => [
                'email' => $user_data['email'],
                "phone_number" => $user_data['phone'],
                "name" => $user_data['name'],
            ],

            "customizations" => [
                "title" => "",
                "description" => null,
            ]
        ];
        $response = $this->cURL($url, $data);
        logger(json_encode($response));
        return $response;
    }
    protected function cURL($url, $json)
    {

        // Create curl resource
        $ch = curl_init($url);

        // Request headers
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Bearer '.env("FLUTTER_SECRET_KEY"),
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
