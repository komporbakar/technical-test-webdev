<?php

namespace App;

use Illuminate\Support\Facades\Http;

class RandomUser
{
    public static function fetchData()
    {
        $response = Http::get('https://randomuser.me/api/');
        $data =  $response->json()['results'];

        return $data[0];
    }
}
