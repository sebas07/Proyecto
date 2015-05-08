<!doctype html>

<html>
<head>
    <title>Laravel - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/cssGeneral.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div id="wrapper">
            <header>

                @if(Auth::check())
                <div id="usuario">

                    <div>{!!'Bienvenido '. Auth::user()->name!!} <a href="{{ url('/auth/logout') }}">Logout</a></div>


                </div>
                @endif

            <section class="nav">

                <nav>
                    <ul id="mainMenu">
                        <li><a href="{{ url('/', null) }}">Principal</a></li>
                        <li><a href="{{ url('usuarios', null) }}">Administrar usuarios</a></li>
                        <li><a href="{{ url('estudiante', null) }}">Gestion de estudiante</a></li>
                        <li><a href="{{ url('cursos', null) }}">Cursos</a></li>
                        <li><a href="{{ url('profesores', null) }}">Profesores</a></li>
                        <li><a href="{{ url('matricula', null) }}">Matricula</a></li>
                        <li><a href="{{ url('cursos/report', null) }}">Reporte</a></li>
                    </ul>
                </nav>

                </section>


            </header>
        </div>
        <div class="contenido">
            @yield('content')
        </div>
    </div>
</body>
</html>