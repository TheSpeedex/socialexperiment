<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/profile1.css" rel="stylesheet">
</head>
<body>
<!-- Add icon library -->

      <div class="card">
      <img class = "avatar" src = "{{asset('storage/images')}}/{{$user->image->filename}}" alt = "avatar"  >
      <h1>{{$user->name}}</h1>
      <p class="title">CEO & Founder, Example</p>
      <p>"{{$user->role}}"</p>
      <p><button>Edit</button></p>
</div>
</body>
</html>

