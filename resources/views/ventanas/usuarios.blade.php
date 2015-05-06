@extends('ventanas.layout')

@section('title', 'Usuarios')

@section('content')
    <section class="col-md-3">
        <a class="btn btn-primary" href="ususarios/add">Crear nuevo usuario</a>
    </section>
    <section class="col-md-12 seccion" style="height:600px;overflow-y:scroll;">
        <table id="usaurios">
            <caption id="tableTitle">Lista de usuarios</caption>
            <tr>
                <th class="tableH" style="max-width: 155px; width: 155px; overflow: hidden">Nombre</th>
                <th class="tableH" style="max-width: 155px; width: 155px; overflow: hidden">Nombre usuario</th>
                <th class="tableH" style="max-width: 215px; width: 215px; overflow: hidden">Correo</th>
                <th class="tableH" style="max-width: 310px; width: 310px; overflow: hidden">Opciones</th>

            </tr>
            <tr>
                <td class="tableD" style="max-width: 155px; width:155px; overflow: hidden">
                    {!! Auth::user()->name!!}</td>
                <td class="tableD" style="max-width: 155px; width:155px; overflow: hidden">
                    {!! Auth::user()->username!!}</td>
                <td class="tableD" style="max-width: 215px; width:215px; overflow: hidden">
                    {!! Auth::user()->email!!}</td>
                <td class="tableD" style="max-width: 310px; overflow: hidden">

                    <div class="right">
                        <a href="" class="btn btn-success">Modificar</a>
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
                            <a href="" class="btn btn-success">Modificar</a>
                        </div>
                        <div class="right">
                            <a href="" class="btn btn-danger">Borrar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>


@stop