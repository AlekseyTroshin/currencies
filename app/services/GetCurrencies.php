<?php

namespace app\services;

class GetCurrencies
{

    private $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function getCurrency()
    {
        $curl = $this->curl;

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://www.cbr.ru/scripts/XML_daily.asp?date_req=02/03/2002",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/xml'
            ]
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $xml = simplexml_load_string($response);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            echo "<pre>";

            foreach ($array['Valute'] as $j) {
                var_dump($j);

                echo "<br>";
            }
            echo "</pre>";
        }
    }

}