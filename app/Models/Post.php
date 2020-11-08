<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    use HasFactory;


    public function posterProfile(){
        
        return $this->belongsTo('App\Models\Profiles','profiles_id');
    }



}
