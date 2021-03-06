@extends('layouts.app')


@section('content')


@php
    $send_to = $user->id;    
@endphp


<div class="container portfolioContainer mt-5 mb-5">
    {{-- flash message start --}}
    @if (session()->has('success'))
            <script>
                setTimeout(function(){ $('.successMSG').fadeOut('fast'); }, 1500);
            </script>
            <div class="alert alert-success successMSG">
                <strong>
                    {!! session()->get('success') !!}
                </strong>
            </div>
        @endif
    {{-- flash message end --}}
    <div class="row">
        <div class="col-sm-8 wrapperProfile">
            <!-- intro - information -->
            <div class="containIntroInfo">
                <div class="containIntroInfo__coverImg">
                    

                    @if ($user->cover_image)
                        <img src=" {{ asset('storage/' . $user->cover_image) }}" alt="">
                    @else
                        <img src="/images/profile-cover-img.jpg" alt="">
                    @endif

                </div>
                <div class="containIntroInfo__profileImg">

                    @if ($user->profile_image)
                        <img src=" {{ asset('storage/' . $user->profile_image) }}" alt="">
                    @else
                        <img src="/images/unisex-avatar.png" alt="">
                    @endif
                    

                    @if($user->id != Auth::user()->id)
                        <button type="button" class="btn btn-outline-dark float-right mt-3 mr-2" data-toggle="modal" data-target="#msgModal">Message</button>
                    @else
                        <a href="/posts/{{Auth::user()->id}}" class="btn btn-outline-dark float-right mt-3 mr-2">View All Posts</a>
                    @endif

                </div>
                <!-- Modal -->
                <div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Write Message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="/conversation/start">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" id="-text" placeholder="Enter your status" name="text"></textarea>
                                        <input type="hidden" name="to" value="{{$send_to}}"> 
                                    </div>
                                    <button type="submit" class="btn btn-outline-dark">Send Message</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="containIntroInfo__info">
                    @if($user->id == Auth::user()->id)
                        <a href="/profile/{{$user->id}}/edit"><i class="fas fa-edit float-right containIntroInfo__info__edit"></i></a>
                    @endif
                    <h4 class="containIntroInfo__info__name">{{ $user->name }}</h4>
                    <p class="containIntroInfo__info__designation">{{ $user->designation }}</p>
                    <p class="containIntroInfo__info__institution">{{ $user->institution_name }}</p>
                    <p class="containIntroInfo__info__country">{{ $user->country}}</p>
                </div>
            </div>
            <div class="about">
                @if($user->id == Auth::user()->id)
                <a href="/profile/{{$user->id}}/edit/about"><i class="fas fa-edit float-right about__edit"></i></a>
                @endif
                <h4>About</h4>
                <p>{{ $user->about }}</p>
            </div>
            <div class="research">
                @if($user->id == Auth::user()->id)
                <a href="/profile/{{$user->id}}/add/research" class="btn research__btn active float-right " role="button" aria-pressed="true">Add New</a>
                @endif

                <h4>Research</h4>
                             

                {{-- research are being added from database
                using this forelse loop every research if being fetched from database
                and displaying it to view --}}
                @forelse ($research as $item)
                    <div class="row no-gutters research__each mt-3" onclick="location.href='/profile/{{$user->id}}/research/{{$item->id}}';">
                        <!-- <div class="col-lg-3 research__each__img">
                            {{-- <img src="/images/research-img.jpg" alt=""> --}}
                            @if ($item->thumbnail_image)
                                <img src=" {{ asset('storage/' . $item->thumbnail_image) }}" alt="">
                            @else
                                <img src="/images/research-img.jpg" alt="">
                            @endif
                        </div> -->
                        <div class="col-lg-12 research__each__info mt-4">
                            <h5>
                                <!-- limit: 8 words -->
                                {{ $item->title }}
                            </h5>
                            <p>
                                <!-- limit:40 words -->
                            {{ str_limit($item->description, 300, '...') }} <a href="/profile/{{$user->id}}/research/{{$item->id}}">more</a> </p>
                        </div>
                    </div>
                    <hr>
                @empty
                    <div style="margin-top:20px;background: #f8f9fa; padding: 10px; border-radius:10px;" class="">
                        <h5>No research paper to show</h5>
                    </div>
                @endforelse
                

            </div>
            <div class="projects">
                @if($user->id == Auth::user()->id)
                <a href="/profile/{{$user->id}}/add/project" class="btn research__btn active float-right " role="button" aria-pressed="true">Add New</a>
                @endif
                <h4>Projects</h4>



                @forelse ($project as $item)
                    <div class="row no-gutters projects__each mt-3" onclick="location.href='/profile/{{$user->id}}/project/{{$item->id}}';">
                        <div class="col-lg-3 projects__each__img">

                            @if ($item->thumbnail_image)
                                <img src=" {{ asset('storage/' . $item->thumbnail_image) }}" alt="">
                            @else
                                <img src="/images/project-img.jpg" alt="">
                            @endif
                            {{-- <img src="/images/project-img.jpg" alt=""> --}}
                        </div>
                        <div class="col-lg-9 projects__each__info">
                            <h5>
                                <!-- limit: 8 words -->
                                {{ $item->title }}
                            </h5>
                            <p>
                                <!-- limit:40 words -->
                                {{ str_limit($item->excerpt, 300, '...') }} <a href="/profile/{{$user->id}}/project/{{$item->id}}">more</a> </p>
                        </div>
                    </div>
                    <hr>
                @empty
                    <div style="margin-top:20px;background: #f8f9fa; padding: 10px; border-radius:10px;" class="">
                        <h5>No projects to show</h5>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="col-sm-4">
            <div class="profileInterests">
                @if($user->id == Auth::user()->id)
                <a href="/interest"><i class="fas fa-edit float-right profileInterests__edit"></i></a>
                @endif
                
                <h3>Interests</h3>
                <div class="profileInterests__containLists">
                    <ul class="profileInterests__containLists__lists">
                        @forelse ($interest as $item)
                            <li>{{ $item->interest }}</li>
                        @empty
                            <div style="margin-top:20px;background: white; padding: 10px; border-radius:10px;" class="">
                                <h5>No interests to show</h5>
                            </div>
                        @endforelse
                        
                    </ul>
                </div>

                
            </div>
            <div class="">
                
            </div>
        </div>
    </div>
</div>
@endsection