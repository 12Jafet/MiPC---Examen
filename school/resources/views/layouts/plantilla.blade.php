<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>@yield('section')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/plantilla.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color:#eee;">

<nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
                <li class="nav-item">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="/img/libro.svg" height="30" class="d-inline-block align-top" alt="">
                    Inicio
                </a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="{{route('alumno-show')}}">Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('materia-show')}}">Materias</a>
                </li>
			</ul>
		</div>
	</nav>

    <div class='container'>
        @yield('seccion')
    </div>

    <div class='container'>
        @yield('modal')
    </div>
    

    <br><br><br><br><br><br>

<footer class="page-footer text-center font-small mt-4 wow fadeIn" style="background-color: #343a40;width:100%">
		<br><br>
    <div class="container">
        <div class="row text-center text-xs-center text-sm-left text-md-left">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5 style="color:white">Contacto</h5>
                <ul class="list-unstyled quick-links">
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5 style="color:white">Acerca de</h5>
                <ul class="list-unstyled quick-links">
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <h5 style="color:white">Información</h5>
                <ul class="list-unstyled quick-links">
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a style="text-decoration: none;color:gray" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
        </div>	
    </div>
    <!--Copyright-->
    <div class="footer-copyright py-3" style="color:white">
        © 2020 Copyright Jafet Cruz
    </div>
</footer>    
   <script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="/js/js.js"></script>
</body>
</html>

