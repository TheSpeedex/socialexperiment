@extends('layouts.app')

@section('content')
    <p> Posts</p>

    <ul>
        @foreach ($posts as $post)
            <li>{{$post->message}}</li>
        @endforeach
    </ul>

@endsection
