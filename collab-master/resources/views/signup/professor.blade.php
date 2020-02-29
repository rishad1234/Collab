<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="{{asset('scss/style.css')}}">

    <title>Collab | Sign Up - professor</title>
</head>

<body style="background-color: #f1f1f1;">

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
                        <a class="nav-link navbar__menu--login" href="{{ route('login') }}">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container registerFormContainer">
        <div class="row h-100">
            <div class="col-sm-12 registerFormContainer__block">
                <div class="registerFormContainer__block__holdBlock">
                    <form method="POST" action="{{route('professor_signup_post')}}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="InputName">Name</label>
                            <input type="text" class="form-control" id="InputName"
                                placeholder="Enter full name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="InputInstitutionName">Institution Name</label>
                            <input type="text" class="form-control" id="InputInstitutionName"
                                placeholder="Institution Name" name="institution_name">
                        </div>
                        <div class="form-group">
                            <label for="InputDesignation">Designation</label>
                            <input type="text" class="form-control" id="InputDesignation"
                                placeholder="Designation" name="designation">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Institutional Email address</label>
                            <input type="email" class="form-control" id="InputEmail"
                                aria-describedby="emailHelp" placeholder="Enter Institutional email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" class="form-control" id="InputPassword"
                                placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn registerFormContainer__block__holdBlock--submit" role="button" aria-pressed="true">Register as professor</button>
                    </form>
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
    <script src="{{asset('js/sign-up-prof.js')}}"></script>
</body>

</html>