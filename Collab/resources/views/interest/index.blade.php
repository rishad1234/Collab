
@extends('layouts.app')




@section('content')
        <div class="container">
            <button class="navbar-toggler d-none" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar__menu" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="profile.html">Robert C. Merton</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <p style = "display:none" class="get_usr_id">{{Auth::user()->id}}</p>
    <div class="container interestContainer mt-5 mb-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Choose your field of interests</h2>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-outline-dark send_my_interest" role="button" href="/newsfeed">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card newInterestCard" style="width: 100%;">
                    <img class="card-img-top shadow" src="images/cs.jpg" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h3 class="pt-4 pl-0 ml-0">Computer Engineering</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="newInterestChildWrappers">
                    <li>Machine Learning</li>
                    <li>Artificial Intelligence</li>
                    <li>Computer Vision</li>
                    <li>Image Processing</li>
                    <li>Neural Engine</li>
                    <li>Generative Adverserial Network</li>
                    <li>Recurrent Neural Network</li>
                    <li>Pose Detection</li>
                    <li>Shape Analysis</li>
                    <li>3D Image Reconstruction</li>
                    <li>Medical Image Analysis</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card newInterestCard" style="width: 100%;">
                    <img class="card-img-top shadow" src="images/ee2.jpg" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h3 class="pt-4 pl-0 ml-0">Electrical and Electronic Engineering</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="newInterestChildWrappers">
                    <li>Bio battery</li>
                    <li>Beamed power transmission</li>
                    <li>clean electicity</li>
                    <li>5g</li>
                    <li>Motors</li>
                    <li>automation</li>
                    <li>LED</li>
                    <li>Green power storage</li>
                    <li>Nano fuel cell</li>
                    <li>Condenser bushing</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card newInterestCard" style="width: 100%;">
                    <img class="card-img-top shadow" src="images/ee.jpg" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h3 class="pt-4 pl-0 ml-0">Literature</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="newInterestChildWrappers">
                    <li>Politics</li>
                    <li>Religion</li>
                    <li>Historical background</li>
                    <li>Novels</li>
                    <li>Critisism</li>
                    <li>Symbolism</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card newInterestCard" style="width: 100%;">
                    <img class="card-img-top shadow" src="images/cs.jpg" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h3 class="pt-4 pl-0 ml-0">Mechanical Engineering</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="newInterestChildWrappers">
                    <li>Automobile</li>
                    <li>Cad</li>
                    <li>Themodynamics</li>
                    <li>Elasticity</li>
                    <li>Equilibrium</li>
                    <li>Heat transfer</li>
                    <li>Inertia</li>
                    <li>Fluid dynamics</li>
                    <li>Compressor</li>
                    <li>Aerodynamics</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card newInterestCard" style="width: 100%;">
                    <img class="card-img-top shadow" src="images/cs.jpg" alt="Card image cap">
                    <div class="card-img-overlay text-white">
                        <h3 class="pt-4 pl-0 ml-0">Architecture Engineering</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <ul class="newInterestChildWrappers">
                    <li>Design integration</li>
                    <li>Lightweight architecture</li>
                    <li>Parametric design</li>
                    <li>Egyptian pyramids</li>
                    <li>Design principles</li>
                    <li>Urban development</li>
                    <li>Structural safety</li>
                    <li>Rural development</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-5"></div>




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
    <script src="js/handle-interest.js"></script>
    <!-- additional design js -->


@endsection