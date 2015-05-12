@extends('ventanas.layout')

@section('title')
    Matricula
@stop

@section('content')
    @if($accion == 'start')

        {{--<div class="col-md-offset-2 col-md-7">--}}
                {{--<h1>Matricula</h1>--}}
                {{--<hr />--}}
            {{--</div>--}}
            {{--<div class="col-md-offset-3 col-md-5">--}}
                <div class="col-md-offset-2 col-md-5">
                    <h1>Matricula</h1>
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
            {!! Form::open(['url' => 'matricula/student']) !!}
                <div class="form-group">
                    {!! Form::label('carnet', 'Carnet del estudiante: ') !!}
                    {!! Form::text('carnet', null, ['class' => "form-control", 'required' => "required"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Aceptar',['class' => "btn btn-primary form-control"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @elseif($accion == 'enrollment')
        <section class="row" style="margin-left: 13%">
            <div class="col-md-5">
                <div class="col-md-10">
                <table class="table table-hover" id="estudiante">
                    <caption id="tableTitle"><strong>Datos del estudiante</strong></caption>
                    <tr>
                        <td class="tableD" style="overflow: hidden">
                            <strong>Nombre:</strong>{{ ' '.$estudiante->nombre. ' '.$estudiante->apellidos}}</td>
                    </tr>
                    <tr>
                        <td class="tableD" style="overflow: hidden">
                            <strong>Carnet:</strong>{{ ' '.$estudiante->carnet }}</td>
                    </tr>
                    <tr>
                        <td class="tableD" style="overflow: hidden">
                            <strong>Fecha de nacimiento:</strong>{{ ' '.$estudiante->fecha_nacimiento }}</td>
                    </tr>
                </table>
            </div>
            </div>
            <div class=" col-md-7">
                <table class="table table-hover" id="estudiante">
                    <caption id="tableTitle"><strong>Cursos matriculados</strong></caption>
                    @foreach($estudiante->cursos_matriculados as $curso)
                        <tr>
                            <td class="tableD" style="overflow: hidden">
                                {{ $curso->sigla.'    '.$curso->nombre }}
                            </td>
                            <td class="tableD" style="overflow: hidden">
                                <a href="{{ action('MatriculaController@desMatricular', [$estudiante->id, $curso->id]) }}" class="btn btn-danger">Quitar</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <br />
        </section>
            <section class="row">
                <div class="col-md-offset-3 col-md-6">
                    <table class="table table-hover" id="estudiante">
                        <caption id="tableTitle"><strong>Cursos matriculables</strong></caption>
                        @foreach($otros as $otro)
                            <tr>
                                <td class="tableD" style="max-width: 250px; overflow: hidden">
                                    <div class="right">
                                        <a href="{{ action('MatriculaController@matricular', [$estudiante->id, $otro->id]) }}" class="btn btn-success">Matricular</a>
                                    </div>
                                    <div class="left">
                                        {{ $otro->sigla.'  '.$otro->nombre }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

        </section>

    @endif
@stop

<style>
.right {
    float:right;
    margin: 5px;
}
</style>
