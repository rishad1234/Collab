@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >

@if (session()->has('failed'))
    <div class="alert alert-danger">
        {{ session()->get('failed') }}
    </div>
@endif


{{-- {{ dd($post[0]->image) }} --}}
<form action="/saveEdit/{{$post[0]->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <textarea class="form-control" id="message-text" placeholder="Enter your status" name="status" >{{ $post[0]->status }}</textarea>
        @error('status')
        <p>{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <img src="{{ asset('storage/' . $post[0]->image) }}" alt="">

        <input class="" type="file" name="image" value="{{$post[0]->image}}">
        @error('image')
        <p>{{$message}}</p>
        @enderror
    </div>


    <div class="modal-footer">
        <button class="btn btn-outline-dark" type="submit">Post</button>
        {{-- <a href="#" class="btn btn-outline-dark" role="button" aria-disabled="true"  data-dismiss="modal">Post</a> --}}
    </div>
</form>
<a href="/delete/posts/{{$post[0]->id}}" class="btn btn-outline-dark float-right mt-3"> Delete</a>

{{-- {{dd($post)}} --}}












<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
crossorigin="anonymous"></script>
<script>
$(".like_btn").click(function () {
    $(this).text("Liked");
    $(this).prop("disabled", true);
    var like_str = $(".like_count p").text();
    var extract_like = like_str.match(/\d+/)[0];
    extract_like++;
    $(".like_count p").text(extract_like + " likes");
})
</script>

@endsection