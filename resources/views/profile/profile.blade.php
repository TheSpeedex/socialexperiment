@extends('layouts.app')


@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/profile1.css" rel="stylesheet">
</head>
<body>
<!-- Add icon library -->

      <div class="card">
      <center><img class = "avatar" src = "{{asset('storage/images')}}/{{$user->image->filename}}" alt = "avatar" left:50% ></center>
      <h1>{{$user->name}}</h1>
      <p class="title">Rank Of Profile: "{{$user->role}}"</p>
</div>
</body>


@endsection