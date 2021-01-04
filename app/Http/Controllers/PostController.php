<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tag;

class PostController extends Controller
{
    public function catalogue(){
        
        $posts = Post::paginate(10);
        return view('posts.catalogue',['posts' => $posts]);
    }

    public function naviToCreatePost(){
        $tags = Tag::All();
        return view('posts.create-posts',['tags' => $tags]);
    }



    public function createPost(Request $request){#any info sent is saved in request
        $request->validate([
            'content'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:2048'
        ]);
        if($request->image !=null){
            $image = $request->file('image');
            $imageName =time().'.'.$image->extension();
            $image->move(public_path('storage/images'),$imageName);
        }else{
            $imageName ="blank.png";
        }
        $user = User::where('id', '=', Auth::guard()->id())->first();
        $post = new Post;
        $post->message=$request->content;
        $post->users_id=$user->id;     
        $post->save();
        $post->tags()->attach( $request->tags);
        $post->image()->create(['filename'=>$imageName]);
        return redirect('posts');
    }




    public function updateComment(Request $request){
        $post =Comment::find($request->id);
        $post->cmessage=$request->editCommentContent;    
        $post->save();
        return redirect('posts');
    }

    public function editComment($id){
        $post = Post::findOrFail($id);
        return view('posts.editComment',['comment'=> $comment]);
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
 

// Save Comment
function save_comment(Request $request){
    $comment=new Comment;
    $comment->users_id = Auth::guard()->id();
    $comment->posts_id=$request->post;
    $comment->cmessage=$request->comment;
    $comment->save();
    return response()->json([
        'bool'=>true
    ]);
}
// edit Comment
function edit_comment(Request $request){
    $comment =Comment::where('id', $request->comment_id)->first();
    $comment->cmessage=$request->comment;
    $comment->save();
    return response()->json([
        'bool'=>true
    ]);
}

}
