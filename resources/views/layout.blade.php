<!doctype html>

<html>
<head>
    <title>Laravel - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/cssGeneral.css')}}">
</head>
<body>
<div id="wrapper">
    <header>
    <section class="nav">
        <nav>
            <ul id="mainMenu">
                <li><a href="">Principal</a></li>
                <li><a href="">Ver contenido</a></li>
                <li><a href="">Agregar Contenido</a></li>
            </ul>
        </nav>
        </section>
    </header>
<div class="container">
    @yield('content')
</div>
</div>
</body>
</html>