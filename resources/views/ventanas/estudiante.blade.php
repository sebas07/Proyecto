@extends('ventanas.layout')

@section('title')
    Nuevo estudiante
@stop

@section('contentt')
    <h1>Agregar un estudiante nuevo</h1>
    <hr />
    <br />
    <div class="col-md-offset-2 col-md-5">
        {!! Form::open(['url' => 'estudiante/create']) !!}
            <div class="form-group">
                {!! Form::label('carnet', 'Carnet del estudiante: ') !!}
                {!! Form::text('carnet', null, ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del estudiante: ') !!}
                {!! Form::text('nombre', null, ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos del estudiante: ') !!}
                {!! Form::text('apellidos', null, ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento: ') !!}
                {!! Form::input('date', 'fecha_nacimiento', date('Y-m-d'), ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Agregar al estudiante',['class' => "btn btn-primary form-control"]) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('content')
    <section class="col-md-12 seccion" style="height:600px;overflow-y:scroll;">
        <table class="table table-hover" id="estudiantes">
            <caption id="tableTitle">Estudiantes</caption>
            <tr>
                <th class="tableH" style="max-width: 190px; width: 190px; overflow: hidden">Carnet</th>
                <th class="tableH" style="max-width: 275px; width: 275px; overflow: hidden">Nombre</th>
                <th class="tableH" style="max-width: 145px; width: 145px; overflow: hidden">Apellidos</th>
                <th class="tableH" style="max-width: 160px; width: 160px; overflow: hidden">Fecha de nacimiento</th>
                <th class="tableH" style="max-width: 310px; width: 310px; overflow: hidden">Opciones</th>
            </tr>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td class="tableD" style="max-width: 190px; width:190px; overflow: hidden">
                    {{ $estudiante->carnet }}</td>
                <td class="tableD" style="max-width: 275px; width:275px; overflow: hidden">
                    {{ $estudiante->nombre }}</td>
                <td class="tableD" style="max-width: 145px; width:145px; overflow: hidden">
                    {{ $estudiante->apellidos }}</td>
                <td class="tableD" style="max-width: 160px; width:160px; overflow: hidden">
                    {{ $estudiante->fecha_nacimiento }}</td>
                <td class="tableD" style="max-width: 310px; overflow: hidden">
                <div class="right">
                    <a href="{{ action('EstudianteController@index', [$estudiante->id]) }}" class="btn btn-danger">Borrar</a>
                </div>
                <div class="right">
                    <a href="{{ action('EstudianteController@index', [$estudiante->id]) }}" class="btn btn-success">Modificar</a>
                </div>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
@stop