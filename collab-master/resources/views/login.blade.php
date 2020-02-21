<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="scss/style.css">

    <title>Collab | Home</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">Collab.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar__menu" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link navbar__menu--login" href="{{ route('welcome') }}">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="loginCover">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 loginCover__left">
                    <div class="loginCover__left__block container">
                        <div class="row">
                            <div class="col-sm-6 loginCover__left__block__holder__left">
                                <h2>For Professors</h2>
                                <p>share knowledge, create portfolio, connect with brilliant minds</p>
                                <a href="{{ route('professor_login') }}" class="btn landingCover__left--registerTeacher" role="button" aria-pressed="true">Sign in as professor</a>
                            </div>
                            <div class="col-sm-6 loginCover__left__block__holder__right">
                                <h2>For Students</h2>
                                <p>share knowledge, create portfolio, connect with brilliant minds</p>
                                <a href="{{ route('student_login') }}" class="btn landingCover__left--registerStudent" role="button" aria-pressed="true">Sign in as student</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 landingCover__right">
                    <img class="d-none d-md-block" src="images/index-cover-img.png" alt="">
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
    <script src="js/index.js"></script>
</body>

</html>