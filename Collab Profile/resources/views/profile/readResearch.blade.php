
@extends('layouts.app')


@section('content')
<div class="container mt-5 containsForm">
    <div class="row">
        <div class="col-sm-12">

            @forelse ($research as $item)
                <h3> {{$item->title}} </h3>

                <p> {{$item->description}} </p>
                <a href=" {{route('downloadFile', $item->id)}} " class="btn btn-outline-dark">Download PDF</a>
            @empty
                
            @endforelse

            {{-- <h3>Title of the Research Paper</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quidem dolorem officiis natus provident laborum voluptatibus eos quis repellat! Rerum magni cumque corporis exercitationem voluptas dolores modi quam aliquid est fugiat, assumenda quae consectetur quidem laborum! Repellat esse sit expedita aliquid aperiam est corrupti asperiores veniam ipsum. Omnis quas, laboriosam perspiciatis illo nobis odio voluptatum voluptatibus sit fugiat adipisci magni distinctio error, nulla similique unde id veritatis illum et quae dolores voluptas. Exercitationem quos ut alias aspernatur pariatur dolore voluptate cupiditate ea neque reiciendis cumque, quam soluta eligendi nulla sint quas natus earum temporibus et excepturi eum incidunt facere. Consequatur qui molestias dolore vero.
                <br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, voluptate nulla dolorem vero adipisci pariatur quidem, nobis sequi quis nemo quae distinctio esse, nisi praesentium accusamus eum nostrum aspernatur numquam! Quibusdam facere vitae eius similique adipisci perspiciatis sint corporis asperiores voluptates consequatur et exercitationem nostrum autem dolor minus delectus eum odio sed cum quisquam non rerum, repellendus hic! Aliquid reiciendis neque libero voluptate molestias.
            </p> --}}
            
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