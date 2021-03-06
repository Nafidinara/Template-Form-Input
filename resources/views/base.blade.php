<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
    <script src="{{asset('resources/bootstrap-4.3.1-dist/js/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/bootstrap-4.3.1-dist/css/bootstrap.css')}}">
    <script src="{{url('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
</head>
<body>
@include('sweet::alert')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('form')}}">Form</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('table')}}">Table</a>
            </li>
        </ul>
    </div>
</nav>

<div class="">
    @yield('content')
</div>

</body>
</html>
