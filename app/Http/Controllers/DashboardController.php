<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Unicodeveloper\JusibePack\Facades\Jusibe;



class DashboardController extends Controller
{

    public $client;

    public $BASE_URL = 'https://jusibe.com/smsapi';

    public function __construct(){

        $this->client = new Client([
            'base_uri' => $this->BASE_URL,
            'auth' => [
                config('app.jusibe_public_key'),
                config('app.jusibe_access_token')
            ]
        ]);
    }

    public function initiateSms(array $phone_number,$message){

        return $this->client->post('https://jusibe.com/smsapi/bulk/send_sms', [
            'form_params' => [
                'to' => $phone_number,
                'from' => 'AKSCP',
                'message'   => $message,
            ],
        ]);
    }


    public function userCount(){

        return [
            'total' => User::count(),
            'male' => User::where('gender','M')->count(),
            'female' => User::where('gender','F')->count()
        ];
    }
}
