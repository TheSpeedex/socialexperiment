<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Norris;
class ApiController extends Controller
{
    
    public function Norris(){
        $Norris = app()->make('Norris');
        $Norris -> api();
        
    }




}
