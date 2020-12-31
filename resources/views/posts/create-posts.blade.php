@extends('layouts.app')

@section('content')

<form action ="{{route('post-creator')}}" method = "POST" enctype ="multipart/form-data">
     @csrf
        <p> Create Post </p>
        <textarea id="content" name="content" rows="13" class="form-control @error('content') is-invalid @enderror" placeholder="Add Post Content!" value="{{ old('content') }}" required></textarea>
        <button type ="submit">Post The Post!</button>
        <input type="file" id="real-file" hidden="hidden" />
        <button type="button" id="custom-button">CHOOSE A FILE</button>
        <span id="custom-text">No file chosen, yet.</span>
        
</form>
<script>
const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});
</script>
@endsection
