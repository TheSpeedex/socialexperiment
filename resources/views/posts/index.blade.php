@extends('layouts.app')

@section('content')
    <p> Posts</p>
<button type ="button" onclick = "location.href ='post-creator'">Create Posts</button>

    <ul>
        @foreach ($posts as $post)
            <li>Name: {{$post->posterProfile->name}}</li>
            <li onclick = "location.href='{{route('postEnlarge',['id'=>$post->id])}}'">Message: {{$post->message}}</li>
            @if($post->image->filename != "blank.png")            
                <img src = "{{asset('storage/images')}}/{{$post->image->filename}}" alt = "image" width:50% >
                @endif
            
        @endforeach
    </ul>

@endsection
