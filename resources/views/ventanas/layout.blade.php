<!doctype html>

<html>
<head>
    <title>Laravel - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/cssGeneral.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div id="wrapper" >
            <header>
                @if(Auth::check())
                <div id="usuario">

                    <div>
                        <strong>{!!'Bienvenido '. Auth::user()->name!!}</strong>
                        <a href="{{ url('/auth/logout') }}" class="text-danger"><strong>Logout</strong></a>
                    </div>
                </div>
                @endif
                <section class="nav">
                    <nav>
                        <ul id="mainMenu">
                            <li><a href="{{ url('/', null) }}"><strong>Principal</strong></a></li>
                            <li><a href="{{ url('usuarios', null) }}"><strong>Gestión de usuarios</strong></a></li>
                            <li><a href="{{ url('estudiante', null) }}"><strong>Estudiantes</strong></a></li>
                            <li><a href="{{ url('cursos', null) }}"><strong>Cursos</strong></a></li>
                            <li><a href="{{ url('profesores', null) }}"><strong>Profesores</strong></a></li>
                            <li><a href="{{ url('matricula', null) }}"><strong>Matricula</strong></a></li>
                            <li><a href="{{ url('cursos/report', null) }}"><strong>Reporte de curso</strong></a></li>
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