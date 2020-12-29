@extends('layouts.app')

@section('title','posts')

@section('content')
        <ul>
                <li>Name: {{$post->posterProfile->name}}</li>
                <li>Message: {{$post->message}}</li>
                @if($user -> id == $post->users_id)
                <button type ="button" onclick = "location.href='{{route('edit',['id'=>$post->id])}}'">Edit Post</button>
                @endif
                <textarea id="comment-content" name="comment-content" rows="13" class="form-control @error('comment-content') is-invalid @enderror" placeholder="Add Comment Here" value="{{ old('comment-content') }}" required></textarea>
                <button type ="submit">Add Comment!</button>
</ul>

@endsection
