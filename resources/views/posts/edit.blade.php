@extends('layouts.app')


@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/posts.css" rel="stylesheet">
</head>
<form action ="{{route('update')}}" method = "POST">
     @csrf
     <div class = "card">
        <h3> Edit Post Of: {{$post ->posterProfile->name}} </h3>
        <input type="hidden" name="id" value=" {{$post->id}}">
        <textarea id="editContent" name="editContent" rows="13" class="form-control @error('editContent') is-invalid @enderror" placeholder="Edit Content!" value="{{ old('editContent') }}" required>{{$post->message}}</textarea>
        <button type ="submit">Edit The Post!</button>
    </div>     
</form>


@endsection
