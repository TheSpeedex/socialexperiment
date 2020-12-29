@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <p> Posts</p>
<button type ="button" onclick = "location.href ='post-creator'">Create Posts</button>

    <ul>
        @foreach ($posts as $post)
            <li>Name: {{$post->posterProfile->name}}</li>
            <li onclick = "location.href='{{route('postEnlarge',['id'=>$post->id])}}'">Message: {{$post->message}}</li>
        @endforeach
    </ul>

@endsection
