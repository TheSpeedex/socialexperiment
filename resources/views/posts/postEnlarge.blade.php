@extends('layouts.app')

@section('title','posts')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>

    <div class="container mt-3">
        <p class="mb-2"><a href="{{ url('/posts') }}"><< Post List</a></p>
        <h3 class="mb-2 pb-1 border-bottom">{{$post->posterProfile->name}}</h3>
        <p>{{$post->message}}</p>
        <hr/>
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
                            <hr/>
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
</script>




@endsection
