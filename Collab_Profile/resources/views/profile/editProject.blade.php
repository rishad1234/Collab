@extends('layouts.app')



@section('content')
<div class="container mt-3">
    <div class="row  editorResearch">
        <div class="col-sm-12 editorResearch__holder">
            <div class="row">
                <div class="col-sm-12 editorResearch__holder__form">
                    <form class="mt-3" action="/profile/edit/project/{{$project[0]->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        {{-- have a bug here.. can not edit thumbnail image. thats why this part is commented --}}
                        {{-- <div class="form-group">
                            <label for="thumbnailImg">Choose Thumbnail for your project</label>
                            <input type="file" class="form-control-file" id="thumbnailImg" name="thumbnail_image">
                            @error('thumbnail_image')
                            <p>{{$message}}</p>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="title">Enter Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{ $project[0]->title }}">
                            @error('title')
                            <p>{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="excerptArtcile">Enter Excerpt</label>
                            <textarea class="form-control" id="excerptArtcile" rows="5" maxlength="200" name="excerpt">{{ $project[0]->excerpt }}</textarea>
                            @error('excerpt')
                            <p>{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <textarea class="content" name="description">{{ $project[0]->description }} </textarea>
                            @error('description')
                            <p>{{$message}}</p>
                            @enderror
                        </div>
                        <button class="btn btn-outline-dark getValEditor mt-3 mb-5">Save Change</button>
                    </form>
                </div>
                <div class="col-sm-6"></div>
            </div>
            
        </div>
    </div>
</div>






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
<!-- local -->
<script src="/js/handle-addnew-research.js"></script>
@endsection