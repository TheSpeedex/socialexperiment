<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 

use Illuminate\Http\Request;

use App\Models\User;

class ProfileController extends Controller
{
    
    public function profile(){
        $user = User::where('id', '=', Auth::guard()->id())->first();
        return view('profile.profile',['user' => $user]);
    }





}
