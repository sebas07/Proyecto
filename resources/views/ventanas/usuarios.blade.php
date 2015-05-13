@extends('ventanas.layout')

@section('title', 'Usuarios')

@section('content')
    <section class="col-md-12" style="height:600px;overflow-y:scroll;">
        <a id="btnAgregar" class="btn btn-info" href="ususarios/add">Agregar un nuevo usuario</a>
        <table id="usaurios" class="table table-hover">
            <caption id="tableTitle">Lista de usuarios</caption>
            <tr style="background-color: #2175bc">
                <th class="tableH" style="max-width: 155px; width: 155px; overflow: hidden">Nombre</th>
                <th class="tableH" style="max-width: 155px; width: 155px; overflow: hidden">Nombre usuario</th>
                <th class="tableH" style="max-width: 215px; width: 215px; overflow: hidden">Correo</th>
                <th class="tableH" style="max-width: 310px; width: 310px; overflow: hidden">Opciones</th>
            </tr>
            <tr>
                <td class="tableD" style="max-width: 155px; width:155px; overflow: hidden">
                    <p style="color: #2175bc"> {!! Auth::user()->name!!}</p></td>
                <td class="tableD" style="max-width: 155px; width:155px; overflow: hidden">
                    <p style="color: #2175bc">{!! Auth::user()->username!!}</p></td>
                <td class="tableD" style="max-width: 215px; width:215px; overflow: hidden">
                    <p style="color: #2175bc"> {!! Auth::user()->email!!}</p></td>
                <td class="tableD" style="max-width: 310px; overflow: hidden">
                    <div class="right">
                        <a href="{{ action('UsuarioController@openUpdtForm', [Auth::user()->id]) }}" class="btn btn-success">Modificar</a>
                    </div>
                </td>
            </tr>
            @foreach($usuarios as $usuario)
                <tr>
                    <td class="tableD" style="max-width: 190px; width:190px; overflow: hidden">
                        {{ $usuario->name }}</td>
                    <td class="tableD" style="max-width: 275px; width:275px; overflow: hidden">
                        {{ $usuario->username }}</td>
                    <td class="tableD" style="max-width: 145px; width:145px; overflow: hidden">
                        {{ $usuario->email }}</td>
                    <td class="tableD" style="max-width: 310px; overflow: hidden">
                        <div class="right">
                            <a href="{{ action('UsuarioController@openUpdtForm', [$usuario->id]) }}" class="btn btn-success">Modificar</a>
                        </div>
                        <div class="right">
                            <a href="{{ action('UsuarioController@eliminar', [$usuario->id]) }}"
                            onclick="return confirm('¿Realmente desea eliminar al usuario {{ $usuario->name }}?')"
                            class="btn btn-danger">Eliminar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
    <style>
        #tableTitle {
            font-size: 180%;
            font-weight: bold;
            padding: 10px 0px;
            margin-bottom: 20px;
        }
        #btnAgregar {
            margin: 10px 0px;
        }
        th {
             color: #ffffff;
        }
        .right {
            float:left;
            margin: 5px;
        }
    </style>

@stop