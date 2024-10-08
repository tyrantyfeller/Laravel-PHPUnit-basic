<?php

namespace App\Http\Controllers;


use App\Http\Validation\StorePostSunriseSunset;
use DateTime;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Psr7\Request;

class SunriseSunset extends BaseController
{
    private $urlSunriseSunset = 'https://api.sunrise-sunset.org/';
    private $error_list = array(
        "INVALID_REQUEST" => 'lat or lng parameters are missing or invalid',
        "INVALID_DATE" => 'date parameter is missing or invalid',
        "UNKNOWN_ERROR" => 'the request could not be processed due to a server error. The request may succeed if you try again',
        "INVALID_TZID" => 'tzid parameter value provided is invalid, response is valid but times are in UTC'
    );

    public function index() {
        return view('Pages/SunriseSunset');
    }

    public function getSunriseSunset(StorePostSunriseSunset $request) {
        try {
            $response = $this->sendRequest($request);

            $result = $this->getRemaingTime($request['type'], $response->results);

            return view(
                'Pages/SunriseSunset',
                [
                    'response' => $result,
                    'request' => $request
                ]
            );

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $message = json_decode($response->getBody()->getContents());


            $msg = 'An unexpected error occurred.';
            if (array_key_exists($message->status, $this->error_list)) {
                $msg = $this->error_list[$message->status];
            }

            return view(
                'Pages/SunriseSunset',
                [
                    'message_error' => $msg
                ]
            );
        }
    }

    private function sendRequest($Request) {
        $client = new \GuzzleHttp\Client();

        $url = $this->urlSunriseSunset . 'json?lat=' . $Request['latitude'] . '&lng=' . $Request['longitude'];

        $request = new Request('GET', $url);

        return json_decode($client->send($request)->getBody());
    }

    private function getRemaingTime($type, $results) {
        date_default_timezone_set('America/Sao_Paulo');

        if ($type == 'sunrise') {
            $time = date('Y-m-d H:i:s',  strtotime($results->sunrise));
        } else {
            $time = date('Y-m-d H:i:s',  strtotime($results->sunset));
        }

        $now = new DateTime();
        $sunrise_sunset_date = new DateTime($time);

        $remaing_time = $now->diff($sunrise_sunset_date);

        if (
            strtotime($now->format('Y-m-d H:i:s'))
            >
            strtotime($time)
        ) {
            $remaing_time_text = $remaing_time->format('%H:%i:%s'). " ago.";
        } else {
            $remaing_time_text = "In {$remaing_time->format('%H:%i:%s')}";
        }

        return array(
            'type' => $type,
            'remaing_time' => $remaing_time_text,
            'exact_datetime' => $now->format('d/m/y H:i:s'),
            'request_datetime' => date('d/m/y H:i:s', strtotime($remaing_time->format('%H:%i:%s')))
        );
    }
}
