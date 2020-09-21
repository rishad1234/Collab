
@extends('layouts.app')


@section('content')
<div class="container mt-5 containsForm">
    <div class="row">
        <div class="col-sm-12">

            @forelse ($research as $item)
                <h3> {{$item->title}} </h3>

                <p> {{$item->description}} </p>

                

                <a href="/storage/{{$item->document}}" class="btn btn-outline-dark">Read Document</a>
                @if($item->user_id == Auth::user()->id)
                    <a href="/profile/{{Auth::user()->id}}/delete/research/{{$item->id}}" class="btn btn-outline-dark edit_article"><i class="fas fa-edit"></i>  Delete</a>
                @else
                    
                @endif
                @empty
                
            @endforelse
            
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