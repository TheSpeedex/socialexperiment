<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/profile1.css" rel="stylesheet">
</head>
<body>
<!-- Add icon library -->

      <div class="card">
      <img src = "{{asset('storage/images')}}/{{$user->image->filename}}" alt = "image" width:50% >
      <h1>"{{$user->name}}"</h1>
      <p class="title">CEO & Founder, Example</p>
      <p>Harvard University</p>
      <a href="#"><i class="fa fa-dribbble"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
       <a href="#"><i class="fa fa-facebook"></i></a>
      <p><button>Contact</button></p>
</div>
</body>
</html>

