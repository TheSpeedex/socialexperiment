<?php
namespace App;
use Illuminate\Support\Facades\Http;

class Norris{

    public function api(){#service containter to communicate with API
        $data =Http::get("https://api.chucknorris.io/jokes/random");#Dependecy Injection As Returning HTTP With Api info
        $decodeN=json_decode($data,true);#Returns the JSON view
        dd($decodeN);     
        return $decodeN;
    }


}