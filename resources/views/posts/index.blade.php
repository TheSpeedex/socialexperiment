@extends('layouts.app')

@section('content')
    <p> Posts</p>
<button type ="button" onclick = "location.href ='post-creator'">Create Posts</button>

    <ul>
        @foreach ($posts as $post)
            <li>Name: {{$post->posterProfile->name}}</li>
            <li onclick = "location.href='{{route('postEnlarge',['id'=>$post->id])}}'">Message: {{$post->message}}</li>
        @endforeach
    </ul>

@endsection
