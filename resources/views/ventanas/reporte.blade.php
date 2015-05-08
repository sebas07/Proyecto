@extends('ventanas.layout')

@section('title')
    Nuevo profesor
@stop

@section('content')
    @if($accion == 'start')
        <div class="col-md-offset-2 col-md-5">
            <h1>Reporte</h1>
            <hr />
            {!! Form::open(['url' => 'cursos/report']) !!}
                <div class="form-group">
                    {!! Form::label('sigla', 'Sigla del curso: ') !!}
                    {!! Form::text('sigla', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Aceptar',['class' => "btn btn-primary form-control"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @elseif($accion == 'display')
        <br />
        <div class="col-md-offset-2 col-md-5">
            <table class="table table-hover" id="curso">
                <caption id="tableTitle">Reporte de curso {{ $curso->sigla }}</caption>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                    {{ 'Nombre: '.$curso->nombre }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                    {{ 'Profesor: '.$curso->profesor->nombre.' '.$curso->profesor->apellidos }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                    {{ 'Semestre: '.$curso->semestre }}</td>
                </tr>
                @foreach($curso->alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->carnet }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
@stop