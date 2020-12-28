@extends('layouts.app')
@section('content')
        <ul>
                <li>Name: {{$post->posterProfile->name}}</li>
                <li>Message: {{$post->message}}</li>
@endsection
