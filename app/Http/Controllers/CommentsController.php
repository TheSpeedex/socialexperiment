<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function index(){
        $posts=\App\Post::all();
        return view('posts',['posts'=>$posts]);
    }
    // Post Detail
    public function detail(Request $request,$id){
        $post=\App\Post::find($id);
        return view('postEnlarge',['post'=>$post]);
    }




    
}
