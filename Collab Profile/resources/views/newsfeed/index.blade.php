@extends('layouts.app')


@section('content')

<!-- main news feed starts-->

<!-- start status -->
<div class="container mt-5">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form class="status_input">
            <div class="form-group">
                <input type="text" class="form-control" id="statusInput" aria-describedby="statusInputHelp"
                data-toggle="modal" data-target="#modal_status" placeholder="What's on your mind?">
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
</div>
<!-- end status -->

<!-- status modal -->

<div class="modal fade" id="modal_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/{{Auth::user()->id}}/post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" id="message-text" placeholder="Enter your status" name="status"></textarea>
                    @error('status')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="" type="file" name="image">
                    @error('image')
                    <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-dark" type="submit">Post</button>
                    {{-- <a href="#" class="btn btn-outline-dark" role="button" aria-disabled="true"  data-dismiss="modal">Post</a> --}}
                </div>
            </form>
        </div>
        
    </div>
</div>
</div>
<!-- status modal end -->



<div class="container mt-5">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <!-- each post starts-->

        @forelse ($posts as $item)
            <div class="post_box">
                <div class="post_author row">
                    <div class="col-2 col-lg-1 autho_img">
                        <img src="images/profile-profile-img.jpg" alt="">
                    </div>
                    <div class="col-10 col-lg-11 autho_description pl-4">
                        <p class="autho_name">Robert C. Merton</p>
                        <p class="post_time">{{$item->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
                <div class="post_body pt-4">
                    <p>
                        {{$item->status}}
                    </p>
                </div>
                <div class="post_img pt-2">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="">
                </div>

                @comments(['model' => $item])
                <!-- comment starts -->
                <!-- <div class="post_comments">

                    <div class="comment_holder">
                        <p class="commnet_author ">Rakib Ul Hasan</p>
                        <p class="comment_body">Lorem ipsum dolor sit amet consectetur adipisicing elit. In omnis
                            quam tempore tenetur? Sint cumque voluptatem provident!</p>
                    </div>

                    <div class="comment_input">
                        <form>
                            <div class="row">
                                <div class="col-9 col-lg-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="CommentInput"
                                            aria-describedby="CommentInputHelp" placeholder="comment">
                                    </div>
                                </div>
                                <div class="col-3 send_com col-lg-2">
                                    <button type="submit"
                                        class="btn btn-outline-dark comment_send_btn">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
                <!-- comment ends -->
            </div>
        @empty
            <p>nothing found :-( </p>
        @endforelse
        
        <!-- each post ends-->
    </div>
    <div class="col-md-2"></div>
</div>
</div>

<!-- main news feed ends-->

















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