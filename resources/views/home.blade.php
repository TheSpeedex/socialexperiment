@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/posts.css" rel="stylesheet">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <button id =hButton type ="button" onclick = "location.href ='http://socialexperiment.test/posts'">To Posts</button>
                    <button id =hButton type ="button" onclick = "location.href ='{{ url('profile') }}'">Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
