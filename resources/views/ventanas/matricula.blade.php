@extends('ventanas.layout')

@section('title')
    Matricula
@stop

@section('content')
    @if($accion == 'start')
        <h1>Matricula</h1>
        <hr />
        <div class="col-md-offset-2 col-md-5">
            {!! Form::open(['url' => 'matricula/student']) !!}
                <div class="form-group">
                    {!! Form::label('carnet', 'Carnet del estudiante: ') !!}
                    {!! Form::text('carnet', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Aceptar',['class' => "btn btn-primary form-control"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @elseif($accion == 'enrollment')
        <section class="row">
            <div class="col-md-6">
                <table class="table table-hover" id="estudiante">
                    <caption id="tableTitle">Datos del estudiante</caption>
                    <tr>
                        <td class="tableD" style="overflow: hidden">
                        {{ $estudiante->carnet }}</td>
                    </tr>
                    <tr>
                        <td class="tableD" style="overflow: hidden">
                        {{ $estudiante->nombre }}</td>
                    </tr>
                    <tr>
                        <td class="tableD" style="overflow: hidden">
                        {{ $estudiante->apellidos }}</td>
                    </tr>
                    <tr>
                        <td class="tableD" style="overflow: hidden">
                        {{ $estudiante->fecha_nacimiento }}</td>
                    </tr>
                    @foreach($estudiante->cursos_matriculados as $curso)
                        <tr>
                            <td class="tableD" style="overflow: hidden">
                            {{ $curso->nombre }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-hover" id="estudiante">
                    <caption id="tableTitle">Cursos matriculables</caption>
                    @foreach($otros as $otro)
                        <tr>
                            <td class="tableD" style="max-width: 250px; overflow: hidden">
                                <div class="right">
                                    <a href="{{ action('MatriculaController@matricular', [$estudiante->id, $otro->id]) }}" class="btn btn-success">Matricular</a>
                                </div>
                                <div class="left">
                                    {{ $otro->nombre }}
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
