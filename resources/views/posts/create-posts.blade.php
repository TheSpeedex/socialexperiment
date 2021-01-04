@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/posts.css" rel="stylesheet">
</head>

<form action ="{{route('post-creator')}}" method = "POST" enctype ="multipart/form-data">
     @csrf
        <div class = "card">
        <h3> Create Post </h3>
        <textarea id="content" name="content" rows="13" class="form-control @error('content') is-invalid @enderror" placeholder="Add Post Content!" value="{{ old('content') }}" required></textarea>
        <select name="tags[]" id="tag" multiple>
                @foreach ($tags as $tag)
                <option value={{$tag->id}}>{{$tag->name}}</option>
                @endforeach
            </select>
        <input type="file" id="real-file" name="image" accept="image/*">
        <button id="submit" type ="submit">Post The Post!</button>
        
    </div>
</form>
@endsection
