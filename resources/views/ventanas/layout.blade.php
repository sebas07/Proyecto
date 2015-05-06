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
            <section class="nav">
                <nav>
                    <ul id="mainMenu">
                        <li><a href="{{ url('/', null) }}">Principal</a></li>
                        <li><a href="{{ url('usuarios', null) }}">Administrar usuarios</a></li>
                        <li><a href="{{ url('estudiante/new', null) }}">Agregar Estudiante</a></li>
                        <li><a href="{{ url('cursos/new', null) }}">Agregar Cursos</a></li>
                        <li><a href="{{ url('profesores/new', null) }}">Agregar Profesor</a></li>
                        <li><a href="">Matricular Estudiante</a></li>
                        <li><a href="">Reporte</a></li>
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