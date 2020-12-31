<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

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
        $request->validate([
            'content'=>'required',
            'image' => 'mimes:jpeg,jpg,png|max:1024'
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
        $post->imagePath=$imageName;
        $post->save();
        return redirect('posts');
    }


    public function postDelete(Request $request){

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

    public function imageUpload(){
        return view('imageUpload');
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('images'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
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

}
