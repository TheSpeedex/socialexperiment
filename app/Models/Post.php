<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function profiles(){
        
        return $this->belongsTo('App\Models\Profiles');
    }


    use HasFactory;
}
