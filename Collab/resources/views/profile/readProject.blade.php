@extends('layouts.app')


@section('content')

<div class="container researchTemplate mt-5 mb-5">
    <div class="row">
        <div class="col-sm-12">


            <div class="researchTemplate__holder mt-3 mb-3">

                @if ($project[0]->thumbnail_image)
                    <img style="width:100%" src=" {{ asset('storage/' . $project[0]->thumbnail_image) }}" alt="">
                @else
                    <img style="width:100%" src="/images/project-img.jpg" alt="">
                @endif
                
                
            </div>


            @forelse ($project as $item)
                <a href="/profile/{{Auth::user()->id}}/edit/project/{{$item->id}}" class="btn btn-outline-dark edit_article"><i class="fas fa-edit"></i>  Edit</a>
                <a href="/profile/{{Auth::user()->id}}/delete/project/{{$item->id}}" class="btn btn-outline-dark edit_article"><i class="fas fa-edit"></i>  Delete</a>
                <div style="background:#f8f9fa; border-radius:10px; padding: 10px;" class="mt-3">
                    <h3> {{$item->title}} </h3>
                    <p> {!!$item->description!!} </p>
                </div>
                
            @empty
            
            @endforelse

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
<script src="/js/editResearchProject.js"></script>
@endsection