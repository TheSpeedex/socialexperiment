@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/posts.css" rel="stylesheet">
</head>

<body>


<div class="header">
  <h2>The Social Experiment</h2>
</div>

<div class="row">
  <div class="leftcolumn">
  @foreach($posts as $post)
    <div class="card">
      <h2>{{$post->posterProfile->name}}</h2>
      <h5>Posted On: {{$post->created_at}}</h5>
      <h5>Most Recent Update On: {{$post->updated_at}}</h5>
      <div class="fakeimg">
          @if($post->image->filename != "blank.png")            
                <img src = "{{asset('storage/images')}}/{{$post->image->filename}}" alt = "image" style ="height:200px;"  >
            @endif
            </div>
      <p onclick = "location.href='{{route('postEnlarge',['id'=>$post->id])}}'">Message: {{$post->message}}</p>
    </div>
    @endforeach
  </div>
  
  <div class="rightcolumn">
    <div class="card">
    <h2>{{$post->posterProfile->user}}</h2>
        <img class = "fakeimg"onclick = "location.href='{{ url('profile') }}'" src = "{{asset('storage/images')}}/{{$post->posterProfile->image->filename}}" alt = "avatar"  >
        <h2>{{$post->posterProfile->name}}</h2>
        <button type ="button" onclick = "location.href ='post-creator'">Create Posts</button>
    </div>
  </div>
</div>
<div class="footer">
  <h2>Footer</h2>
</div>
</body>
   
{{$posts->links()}}
@endsection
