@extends('layouts.app')

@section('content')

<form action ="{{route('post-creator')}}" method = "POST" enctype ="multipart/form-data">
     @csrf
        <p> Create Post </p>
        <textarea id="content" name="content" rows="13" class="form-control @error('content') is-invalid @enderror" placeholder="Add Post Content!" value="{{ old('content') }}" required></textarea>
        <button type ="submit">Post The Post!</button>
        <input type="file" id="real-file" name="image" accept="image/*">
        
</form>
@endsection
