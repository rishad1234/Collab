@extends('layouts.app')


@section('content')

<div class="container mt-5 containsForm">
    <div class="row">
        <div class="col-sm-7">
            <h3>Edit Your Information</h3>
        <form class="mt-3" action="/profile/edit/{{ Auth::user()->id}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
                <div class="form-group">
                    <label for="coverImg">Choose Profile Photo</label>
                    <input type="file" class="form-control-file" id="coverImg" name="profile_image" accept="image/x-png,image/gif,image/jpeg">
                    @error('profile_image')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="profileImg">Choose Cover Picture</label>
                    <input type="file" class="form-control-file" id="profileImg" name="cover_image" accept="image/x-png,image/gif,image/jpeg">
                    @error('cover_image')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name" >Enter your name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                    @error('name')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="designation">Enter your designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{Auth::user()->designation}}">
                    @error('designation')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="institution_name">Enter your institution</label>
                    <input type="text" class="form-control" id="institution_name" name="institution_name" value="{{Auth::user()->institution_name}}">
                    @error('institution_name')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Enter your country</label>
                <input type="text" class="form-control" id="country" name ="country" value="{{Auth::user()->country}}">
                    @error('country')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <div class="col-sm-5">
                    <button class="btn btn-outline-dark float-right my-5" >Save Information</button>
                </div>
                @csrf
                
            </form>
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
@endsection