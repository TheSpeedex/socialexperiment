@extends('layouts.app')


@section('content')

<form action ="{{route('updateComments')}}" method = "POST">
     @csrf
        <p> Edit Post </p>
        <p>{{$post ->id}}</p>
        <input type="hidden" name="id" value=" {{$post->id}}">
        <textarea id="editCommentContent" name="editCommentContent" rows="13" class="form-control @error('editCommentContent') is-invalid @enderror" placeholder="Edit Content!" value="{{ old('editCommentContent') }}" required>{{$post->message}}</textarea>
        <button type ="submit">Edit The Post!</button>
</form>


@endsection
