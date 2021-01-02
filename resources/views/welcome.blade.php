@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>




                    <button type ="button" onclick = "location.href ='http://socialexperiment.test/login'">To Login</button>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
