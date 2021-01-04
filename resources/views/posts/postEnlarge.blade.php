@extends('layouts.app')

@section('title','posts')

@section('content')
<head>
<style>
    * {
      box-sizing: border-box;
    }
    .editPopup {
      position: relative;
      text-align: center;
      width: 100%;
    }
    .formPopup {
      display: none;
      position: fixed;
      left: 50%;
      top: 5%;
      transform: translate(-40%, 5%);
      z-index: 9;
    }
    .formContainer {
      max-width: 700px;
      height: 100%;
      padding: 300px;
      background-color: #fff;
    }
    .formContainer input[type=text]{
      width: 100%;
      padding: 0px;
      margin: 5px 0 5px 0;
      border: none;
      background: #eee;
    }
    .formContainer input[type=text]:focus{
      background-color: #ddd;
      outline: none;
    }
    .formContainer .btn:hover,
    .openButton:hover {
      opacity: 1;
    }
  </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/posts.css" rel="stylesheet">
</head>

    <div class="card">
        <p class="mb-2"><a href="{{ url('/posts') }}"><< Post List</a></p>
        <h3 class="mb-2 pb-1 border-bottom">{{$post->posterProfile->name}}</h3>
        @if($post->image->filename != "blank.png")          
                <img src = "{{asset('storage/images')}}/{{$post->image->filename}}" alt = "image" width:50% >
                @endif
        <p>{{$post->message}}</p>
        @if($user -> id == $post->users_id || $user -> role == "admin")
                <button type ="button" onclick = "location.href='{{route('edit',['id'=>$post->id])}}'">Edit Post</button>
                @endif
        <hr/>
        @foreach ($post->tags as $tag)
                     <a>#{{$tag->name}}</a>
                        @endforeach
        {{-- Post Comments --}}
        <div class="card mt-4">
            <h5 class="card-header">Comments <span class="comment-count float-right badge badge-info">{{ count($post->postComments) }}</span></h5>
            <div class="card-body">
                {{-- Add Comment --}}
                <div class="add-comment mb-3">
                    @csrf
                    <textarea minlength="5" class="form-control comment" placeholder="Enter Comment"></textarea>
                    <button data-post="{{ $post->id }}" class="btn btn-dark btn-sm mt-2 save-comment">Submit</button>
                </div>
                <hr/>
                {{-- List Start --}}
                <div class="comments"> 
                    @if(count($post->postComments)>0)
                        @foreach($post->postComments as $comment)
                            <blockquote class="blockquote">
                              <small class="mb-0">{{ $comment->cmessage }}</small>
                            </blockquote>
                            <small>-{{$comment->commentProfile->name}}</small>
                            @if($user -> id == $comment->users_id || $user->role ="admin")
                                <button type = "button" class = "openButton btn btn-primary float -right btn-sm" onclick="openForm({{$comment}})">Edit</button>
                                @endif
                            <hr/>
                                <div class="editPopup">
                                        <div class ="formPopup" id ="popupForm">
                                                <div class ="card">
                                                        <h2>Edit Comment</h2><br>
                                                        <textarea class ="form-control comment" id= "pre_edit_content" placeholder ="Enter Comment"></textarea><br>
                                                        <input type= "hidden" id="comment_id" class="form-control comment_id">
                                                        <button data-post="{{ $post->id }}" class="btn btn-success edit-comment">Submit</button><br>
                                                        <button type="button" class = "btn cancel btn-danger" onclick = "closeForm()">Cancel</button>
                                                        
                                                </div>
                                        </div>
                                </div>
                        @endforeach
                    @else
                    <p class="no-comments">No Comments Yet</p>
                    @endif
                    
                </div>
            </div>
        </div>
        {{-- ## End Post Comments --}}
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">


// Edit Comment
$(".edit-comment").on('click',function(){
    var _comment=$("#pre_edit_content").val();
    var _comment_id=$(".comment_id").val();
    var _user = '<?php echo $user->name;?>';
    var vm=$(this);
    // Run Ajax
    $.ajax({
        url:"{{ url('edit-comment') }}",//route
        type:"post",
        dataType:'json',
        data:{
            comment:_comment,
            comment_id:_comment_id,
            user:_user,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            vm.text('Saving...').addClass('disabled');
        },
        success:function(res){            
            vm.text('Save').removeClass('disabled');
            window.location = ('{{route('postEnlarge',['id'=>$post->id])}}')
        }   
    });
});


// Save Comment
$(".save-comment").on('click',function(){
    var _comment=$(".comment").val();
    var _post=$(this).data('post');
    var _user = '<?php echo $user->name;?>';
    var vm=$(this);
    // Run Ajax
    $.ajax({
        url:"{{ url('save-comment') }}",
        type:"post",
        dataType:'json',
        data:{
            comment:_comment,
            post:_post,
            user:_user,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            vm.text('Saving...').addClass('disabled');
        },
        success:function(res){
            var _html='<blockquote class="blockquote animate__animated animate__bounce">\
            <small class="mb-0">'+_comment+'</small>\
            <small class="mb-0">'+_user+'</small>\
            </blockquote><hr/>';
            if(res.bool==true){
                $(".comments").prepend(_html);
                $(".comment").val('');
                $(".user").val('');
                $(".comment-count").text($('blockquote').length);
                $(".no-comments").hide();
            }
            vm.text('Save').removeClass('disabled');
            window.location = ('{{route('postEnlarge',['id'=>$post->id])}}')
        }   
    });
});


function openForm(comment) {
        $("#comment_id").val(comment.id);
        $("#pre_edit_content").val(comment.cmessage);
        document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
    }

</script>






@endsection
