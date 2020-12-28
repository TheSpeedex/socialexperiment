<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::All();
        return view('posts.index',['posts' => $posts]);
    }

    public function show(){
        
    }
}
