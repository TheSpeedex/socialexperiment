<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    use HasFactory;


    public function posterProfile(){
        
        return $this->belongsTo('App\Models\User','users_id');
    }

    public function postComments(){
        return $this->hasMany('App\Models\Comment','posts_id');
    }



}
