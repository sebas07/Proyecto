@extends('ventanas.layout')

@section('title')
    Nuevo profesor
@stop

@section('content')
    @if($accion == 'start')
        <div class="col-md-offset-2 col-md-5">
            <h1>Reporte</h1>
            <hr />
            @if (count($errores) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ha ocurrido un problema con los datos ingresados.<br><br>
                    <ul>
                        @foreach ($errores->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
        <div class="col-md-offset-2 col-md-6">
            <table class="table table-hover" id="curso">
                <caption id="tableTitle"><strong> Datos del curso {{ $curso->sigla }}</strong></caption>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                    <strong>Nombre del curso: </strong>{{ $curso->nombre }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                        <strong>Profesor: </strong>{{ $curso->profesor->nombre.' '.$curso->profesor->apellidos }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                        <strong>Semestre: </strong>{{ $curso->semestre }}</td>
                </tr>

            </table>
        </div>
        <section class="col-md-offset-2 col-md-6" style="overflow-y:scroll;">

            <table class="table table-hover" id="estudiantes">

                <caption id="tableTitle"><strong>Estudiantes inscritos</strong></caption>
                <tr style="background-color: #2175bc">
                    <th class="tableH" style="overflow: hidden">Carnet</th>
                    <th class="tableH" style=" overflow: hidden">Nombre</th>
                    <th class="tableH" style=" overflow: hidden">Apellidos</th>


                </tr>
                @foreach( $curso->alumnos as $estudiante)
                    <tr>
                        <td class="tableD" style=" overflow: hidden">
                            {{ $estudiante->carnet }}</td>
                        <td class="tableD" style=" overflow: hidden">
                            {{ $estudiante->nombre }}</td>
                        <td class="tableD" style="overflow: hidden">
                            {{ $estudiante->apellidos }}</td>

                    </tr>
                @endforeach
            </table>
        </section>
    @endif
@stop