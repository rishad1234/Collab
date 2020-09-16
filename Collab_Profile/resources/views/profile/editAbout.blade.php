@extends('layouts.app')


@section('content')
<div class="container mt-5 containsForm">
    <div class="row">
        <div class="col-sm-7">
            <h3>About</h3>


            <form class="mt-3" action="/profile/edit/about/{{Auth::user()->id}}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="about">Enter about</label>
                <textarea name="about" class="form-control" id="about" rows="3" > {{Auth::user()->about}}</textarea>
                </div>
                <button class="btn btn-outline-dark">Save Information</button>
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
@endsection