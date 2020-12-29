<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $posts = Post::All();
        return view('posts.index',['posts' => $posts]);
    }

    public function naviToCreatePost(){
        return view('posts.create-posts');
    }

    public function createPost(Request $request){#any info sent is saved in request
        $user = User::where('id', '=', Auth::guard()->id())->first();
        $post = new Post;
        $post->message=$request->content;
        $post->users_id=$user->id;     
        $post->save();
        return redirect('posts');
    }

    public function postDelete(Request $request){

    }


    public function update(Request $request){
        $post =Post::find($request->id);
        $post->message=$request->editContent;    
        $post->save();
        return redirect('posts');
    }

    public function show($id){
        $post = Post::findOrFail($id);
        $user = User::where('id', '=', Auth::guard()->id())->first();

        return view('posts.postEnlarge',['post'=> $post,"user"=>$user]);
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('posts.edit',['post'=> $post]);
    }


}
