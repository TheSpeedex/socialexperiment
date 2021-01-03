@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/posts.css" rel="stylesheet">
</head>

<body>
<button type ="button" onclick = "location.href ='post-creator'">Create Posts</button>

<div class="header">
  <h2>Social Experiment</h2>
</div>

<div class="row">
  <div class="leftcolumn">
  @foreach($posts as $post)
    <div class="card">
      <h2>{{$post->posterProfile->name}}</h2>
      <h5>{{$post->created_at}}</h5>
      <div class="fakeimg">
          @if($post->image->filename != "blank.png")            
                <img src = "{{asset('storage/images')}}/{{$post->image->filename}}" alt = "image" style ="height:200px;"  >
            @endif
            </div>
      <p onclick = "location.href='{{route('postEnlarge',['id'=>$post->id])}}'">Message: {{$post->message}}</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
    @endforeach
  </div>
  
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>

</body>


    <div class ="parent white">
        
            <div class = "card purple">
            <h1</h1>
                <div class ="visual yellow">
</div>
                
            </div>
        
    </div>


    

@endsection
