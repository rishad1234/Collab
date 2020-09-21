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
        <script src="https://kit.fontawesome.com/19b1b96522.js" crossorigin="anonymous"></script>
    
        <title>Collab | Home</title>
    </head>
    
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{route('signup')}}">Collab.</a>

                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link navbar__menu--login" href="{{route('login_home')}}">Login</a>
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

                        <a href="/registerpage/1" class="btn btn-lg landingCover__left--registerTeacher">Sign up as professor</a>
                        <a href="/registerpage/2" class="btn btn-lg landingCover__left--registerStudent ">Sign up as Student</a>
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
