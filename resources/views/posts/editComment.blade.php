@extends('layouts.app')


@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/posts.css" rel="stylesheet">
</head>

<form action ="{{route('updateComments')}}" method = "POST">
     @csrf
     <div class = "card">
        <h3> Edit Post </h3>
        <input type="hidden" name="id" value=" {{$post->id}}">
        <textarea id="editCommentContent" name="editCommentContent" rows="13" class="form-control @error('editCommentContent') is-invalid @enderror" placeholder="Edit Content!" value="{{ old('editCommentContent') }}" required>{{$post->message}}</textarea>
        <input type="file" id="real-file" name="image" accept="image/*">
        <button type ="submit">Edit The Post!</button>
    </div>        
</form>


@endsection
