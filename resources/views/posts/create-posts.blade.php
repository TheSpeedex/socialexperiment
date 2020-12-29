@extends('layouts.app')

@section('content')

<form action ="{{route('post-creator')}}" method = "POST">
     @csrf
        <p> Create Post </p>
        <textarea id="content" name="content" rows="13" class="form-control @error('content') is-invalid @enderror" placeholder="Add Post Content!" value="{{ old('content') }}" required></textarea>
        <button type ="submit">Post The Post!</button>
</form>
@endsection
