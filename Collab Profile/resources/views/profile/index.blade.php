@extends('layouts.app')


@section('content')
<div class="container portfolioContainer mt-5 mb-5">
    <div class="row">
        <div class="col-sm-8">
            <!-- intro - information -->
            <div class="containIntroInfo">
                <div class="containIntroInfo__coverImg">
                    {{-- <img src="/images/profile-cover-img.jpg" alt=""> --}}

                    @if (Auth::user()->cover_image)
                        <img src=" {{ asset('storage/' . Auth::user()->cover_image) }}" alt="">
                    @else
                        <img src="/images/profile-cover-img.jpg" alt="">
                    @endif

                    
                </div>
                <div class="containIntroInfo__profileImg">

                    
                    @if (Auth::user()->profile_image)
                        <img src=" {{ asset('storage/' . Auth::user()->profile_image) }}" alt="">
                    @else
                        <img src="/images/profile-profile-img.jpg" alt="">
                    @endif


                </div>
                <div class="containIntroInfo__info">
                    <a href="/profile/{{Auth::user()->name}}/edit"><i class="fas fa-edit float-right containIntroInfo__info__edit"></i></a>
                    <h4 class="containIntroInfo__info__name">{{ Auth::user()->name }}</h4>
                    <p class="containIntroInfo__info__designation">{{ Auth::user()->designation }}</p>
                    <p class="containIntroInfo__info__institution">{{ Auth::user()->institution_name }}</p>
                    <p class="containIntroInfo__info__country">{{ Auth::user()->country}}</p>
                </div>
            </div>
            <div class="about">
                
                <a href="/profile/{{Auth::user()->name}}/edit/about"><i class="fas fa-edit float-right about__edit"></i></a>
                <h4>About</h4>
                <p>{{ Auth::user()->about }}</p>
            </div>
            <div class="research">
                <a href="/profile/{{Auth::user()->name}}/add/research" class="btn research__btn active float-right " role="button" aria-pressed="true">Add New</a>

                <h4>Research</h4>
                             

                {{-- research are being added from database
                using this forelse loop every research if being fetched from database
                and displaying it to view --}}
                @forelse ($research as $item)
                    <div class="row no-gutters research__each mt-3" onclick="location.href='research-project-template-me.html';">
                        <div class="col-lg-3 research__each__img">
                            <img src="/images/research-img.jpg" alt="">
                        </div>
                        <div class="col-lg-9 research__each__info">
                            <h5>
                                <!-- limit: 8 words -->
                                {{ $item->title }}
                            </h5>
                            <p>
                                <!-- limit:40 words -->
                            {{ str_limit($item->description, 300, '...') }} <a href="/profile/{{Auth::user()->name}}/research/{{$item->id}}">more</a> </p>
                        </div>
                    </div>
                    <hr>
                @empty
                    <h5><p>no Research paper found</p></h5>

                @endforelse
                

                {{-- for now we dont need this static research design.
                commenting it out for future need --}}

                {{-- <h4>Research</h4>
                <!-- research - 1 -->
                <div class="row no-gutters research__each mt-3" onclick="location.href='research-project-template-me.html';">
                    <div class="col-lg-3 research__each__img">
                        <img src="/images/research-img.jpg" alt="">
                    </div>
                    <div class="col-lg-9 research__each__info">
                        <h5>
                            <!-- limit: 8 words -->
                            Title of research / published paper
                        </h5>
                        <p>
                            <!-- limit:40 words -->
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat culpa illo quaerat quis
                            ratione earum pariatur, sunt eaque nihil deleniti porro reiciendis dolorem, voluptatum
                            odit tempore perspiciatis eos reprehenderit deserunt numquam recusandae incidunt
                            nesciunt saepe eius. Adipisci, dolorem provident. Expedita. <a href="research-project-template-me.html">more</a> </p>
                    </div>
                </div>
                <hr>
                <!-- research - 2 -->
                <div class="row no-gutters research__each mt-3" onclick="location.href='research-project-template-me.html';">
                    <div class="col-lg-3 research__each__img">
                        <img src="/images/research-02.jpg" alt="">
                    </div>
                    <div class="col-lg-9 research__each__info">
                        <h5>
                            <!-- limit: 8 words -->
                            Title of research / published paper
                        </h5>
                        <p>
                            <!-- limit:40 -->
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat culpa illo quaerat quis
                            ratione earum pariatur, sunt eaque nihil deleniti porro reiciendis dolorem, voluptatum
                            odit tempore perspiciatis eos reprehenderit deserunt numquam recusandae incidunt
                            nesciunt saepe eius. Adipisci, dolorem provident. Expedita. <a href="research-project-template-me.html">more</a> </p>
                    </div>
                </div>
                <hr>
                <!-- research - 3 -->
                <div class="row no-gutters research__each mt-3" onclick="location.href='research-project-template-me.html';">
                    <div class="col-lg-3 research__each__img">
                        <img src="/images/research-03.jpg" alt="">
                    </div>
                    <div class="col-lg-9 research__each__info">
                        <h5>
                            <!-- limit: 8 words -->
                            Title of research / published paper
                        </h5>
                        <p>
                            <!-- limit:40 -->
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat culpa illo quaerat quis
                            ratione earum pariatur, sunt eaque nihil deleniti porro reiciendis dolorem, voluptatum
                            odit tempore perspiciatis eos reprehenderit deserunt numquam recusandae incidunt
                            nesciunt saepe eius. Adipisci, dolorem provident. Expedita. <a href="research-project-template-me.html">more</a> </p>
                    </div>
                </div>
                <hr> --}}
            </div>
            <div class="projects">
                <a href="/profile/{{Auth::user()->name}}/add/project" class="btn research__btn active float-right " role="button" aria-pressed="true">Add New</a>
                <h4>Projects</h4>



                @forelse ($project as $item)
                    <div class="row no-gutters projects__each mt-3" onclick="location.href='research-project-template-me.html';">
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
                                {{ str_limit($item->excerpt, 300, '...') }} <a href="/profile/{{Auth::user()->name}}/project/{{$item->id}}">more</a> </p>
                        </div>
                    </div>
                    <hr>
                @empty
                    <h5><p>no project found</p></h5>
                @endforelse

                <!-- projeect - 1 -->
                {{-- <div class="row no-gutters projects__each mt-3" onclick="location.href='research-project-template-me.html';">
                    <div class="col-lg-3 projects__each__img">
                        <img src="/images/project-img.jpg" alt="">
                    </div>
                    <div class="col-lg-9 projects__each__info">
                        <h5>
                            <!-- limit: 8 words -->
                            Title of Project
                        </h5>
                        <p>
                            <!-- limit:40 words -->
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat culpa illo quaerat quis
                            ratione earum pariatur, sunt eaque nihil deleniti porro reiciendis dolorem, voluptatum
                            odit tempore perspiciatis eos reprehenderit deserunt numquam recusandae incidunt
                            nesciunt saepe eius. Adipisci, dolorem provident. Expedita. <a href="research-project-template-me.html">more</a> </p>
                    </div>
                </div>
                <hr>
                <!-- projeect - 2 -->
                <div class="row no-gutters projects__each mt-3" onclick="location.href='research-project-template-me.html';">
                    <div class="col-lg-3 projects__each__img">
                        <img src="/images/project-img.jpg" alt="">
                    </div>
                    <div class="col-lg-9 projects__each__info">
                        <h5>
                            <!-- limit: 8 words -->
                            Title of Project
                        </h5>
                        <p>
                            <!-- limit:40 words -->
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat culpa illo quaerat quis
                            ratione earum pariatur, sunt eaque nihil deleniti porro reiciendis dolorem, voluptatum
                            odit tempore perspiciatis eos reprehenderit deserunt numquam recusandae incidunt
                            nesciunt saepe eius. Adipisci, dolorem provident. Expedita. <a href="research-project-template-me.html">more</a> </p>
                    </div>
                </div>
                <hr> --}}
            </div>
        </div>
        <div class="col-sm-4">
            <div class="profileInterests">
                <a href="edit-profile-me-interest.html"><i class="fas fa-edit float-right profileInterests__edit"></i></a>
                <h3>Interests</h3>
                <div class="profileInterests__containLists">
                    <ul class="profileInterests__containLists__lists">
                        <li>Machine Learning</li>
                        <li>Artificial Intelligent</li>
                        <li>Algorithm</li>
                        <li>Data Science</li>
                        <li>Image Processing</li>
                        <li>Internet of things</li>
                        <li>Machine Learning</li>
                        <li>Artificial Intelligent</li>
                        <li>Algorithm</li>
                        <li>Data Science</li>
                        <li>Image Processing</li>
                        <li>Internet of things</li>
                        <li>Machine Learning</li>
                        <li>Artificial Intelligent</li>
                        <li>Algorithm</li>
                        <li>Data Science</li>
                        <li>Image Processing</li>
                        <li>Internet of things</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection