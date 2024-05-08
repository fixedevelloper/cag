<?php


namespace App\Services;


use function Spatie\Ignition\ErrorPage\jsonEncode;

class CoinrangingService
{
    public function allCoins(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.coinranking.com/v2/coins',[
            'query' => [
                'x-access-token'=>env("COIN_RANGING_API")
            ]
        ]);

        return json_decode($response->getBody(),true);
    }
public function getAllCoins(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.coinranking.com/v2/coins",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-access-token:".env("COIN_RANGING_API")
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
}
