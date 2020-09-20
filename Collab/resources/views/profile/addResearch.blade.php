@extends('layouts.app')


@section('content')

<div class="container mt-5 containsForm">
    <div class="row">
        <div class="col-sm-7">

            <form class="mt-3" action="/profile/{{Auth::user()->name}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group basinInfoGroup">
                    <label for="title">Title</label>
                    <textarea class="form-control" id="about" rows="1" name="title"></textarea>
                    @error('title')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group basinInfoGroup">
                    <label for="about">Enter Excerpt</label>
                    <textarea class="form-control" class="content" id="about" rows="6" name="description"></textarea>
                    @error('description')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group basinInfoGroup">
                    <label for="exampleFormControlFile1">Upload files</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="document">
                    @error('document')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-outline-dark">Add Research</button>
            </form>

        </div>
        <div class="col-sm-5">
        </div>
    </div>
</div>







<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
<!-- local -->
<script src="/js/handle-addnew-research.js"></script>

@endsection