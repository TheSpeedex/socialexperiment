@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/welcome.css" rel="stylesheet">
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <img class = "titleLogo" src = "{{ asset('storage/images/titleLogo.jpg') }}" alt = "titleLogo"  >
            <div class="card">
                <div class="card-header">{{ __('Welcome To The Social Experiment !') }}</div>
                    <button type ="button" onclick = "location.href ='http://socialexperiment.test/login'">To Login</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
