<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;




    public function commentOnPost(){
        return $this ->belongsTo('App\Models\Post','posts_id');
    }




    public function commentProfile(){
        return $this ->belongsTo('App\Models\Profiles','profiles_id');
    }

    



}
