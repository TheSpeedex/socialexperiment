@extends('layouts.app')


@section('content')

<form action ="{{route('update')}}" method = "POST">
     @csrf
        <p> Edit Post </p>
        <p>{{$post ->id}}</p>
        <input type="hidden" name="id" value=" {{$post->id}}">
        <textarea id="editContent" name="editContent" rows="13" class="form-control @error('editContent') is-invalid @enderror" placeholder="Edit Content!" value="{{ old('editContent') }}" required>{{$post->message}}</textarea>
        <button type ="submit">Edit The Post!</button>
</form>


@endsection
