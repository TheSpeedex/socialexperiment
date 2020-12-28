@extends('layouts.app')

@section('content')
    <p> Posts</p>
<button type ="button" onclick = "location.href ='post-creator'">Create Posts</button>

    <ul>
        @foreach ($posts as $post)
            <li>Id: {{$post->id}}</li>
            <li>Name: {{$post->posterProfile->name}}</li>
            <li>UserID: {{$post->users_id}}</li>
            <li>Message: {{$post->message}}</li>
        @endforeach
    </ul>

@endsection
