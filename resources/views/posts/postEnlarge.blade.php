@extends('layouts.app')

@section('title','posts')

@section('content')
        <ul>
                <li>Name: {{$post->posterProfile->name}}</li>
                <li>Message: {{$post->message}}</li>
@endsection
