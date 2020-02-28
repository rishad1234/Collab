<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- link css -->
        <link rel="stylesheet" href="/css/style.css">
    
        <title>Collab | Home</title>
    </head>
    
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{route('signup')}}">Collab.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar__menu" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link navbar__menu--login" href="{{route('login_home')}}">Log in</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
        <div class="landingCover">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 landingCover__left">
                        <div class="landingCover__left__block">
                            <p>A platform that helps to create collaborations between professors and students according to their field of interests by helping them to create an individual profile, an organised news feed and communication methods.</p>
                        </div>
                        <form action="{{route('signup_valid')}}" method="post">
                            @csrf
                            <input type="hidden" name="signup_check" value="professor">
                            <button type="submit" class="btn btn-lg landingCover__left--registerTeacher" role="button" aria-pressed="true">Sign up as professor</button>
                        </form>
                        <form action="{{route('signup_valid')}}" method="post">
                            @csrf
                            <input type="hidden" name="signup_check" value="student">
                            <button type="submit" class="btn btn-lg landingCover__left--registerStudent" role="button" aria-pressed="true">Sign up as student</button>
                        </form>
                    </div>
                    <div class="col-sm-6 landingCover__right">
                        <img class="d-none d-md-block" src="/images/index-cover-img.png" alt="">
                    </div>
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
        <script src="/js/index.js"></script>
    </body>
</html>
