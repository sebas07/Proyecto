@extends('ventanas.layout')

@section('title')
    Nuevo profesor
@stop

@section('content')
    @if($accion == 'show')
        <section class="col-md-offset-1 col-md-10" style="height:600px;overflow-y:scroll;">
            <table class="table table-hover" id="cursos">
                <div id="btnAgregar">
                    <a href="{{ action('CursosController@nuevo', null) }}" class="btn btn-primary">Agregar curso</a>
                </div>
                <caption id="tableTitle">Cursos</caption>
                <tr>
                    <th class="tableH" style="max-width: 175px; width: 175px; overflow: hidden">Nombre</th>
                    <th class="tableH" style="max-width: 150px; width: 150px; overflow: hidden">Sigla</th>
                    <th class="tableH" style="max-width: 145px; width: 145px; overflow: hidden">Profesor</th>
                    <th class="tableH" style="max-width: 200px; width: 200px; overflow: hidden">Opciones</th>
                </tr>
                @foreach($cursos as $curso)
                <tr>
                    <td class="tableD" style="max-width: 150px; width:150px; overflow: hidden">
                        {{ $curso->nombre }}</td>
                    <td class="tableD" style="max-width: 175px; width:175px; overflow: hidden">
                        {{ $curso->sigla }}</td>
                    <td class="tableD" style="max-width: 145px; width:145px; overflow: hidden">
                        {{ $curso->profesor->nombre }}</td>
                    <td class="tableD" style="max-width: 200px; overflow: hidden">
                    <div class="right">
                        <a href="{{ action('CursosController@borrar', [$curso->id]) }}" class="btn btn-danger">Borrar</a>
                    </div>
                    <div class="right">
                        <a href="{{ action('CursosController@existente', [$curso->id]) }}" class="btn btn-success">Modificar</a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </section>
    @elseif($accion == 'create')
        <h1>Agregar un curso nuevo</h1>
        <hr />
        <br />
        <div class="col-md-offset-2 col-md-5">
            {!! Form::open(['url' => 'cursos/create']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre del curso: ') !!}
                    {!! Form::text('nombre', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sigla', 'Sigla del curso: ') !!}
                    {!! Form::text('sigla', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_profesor', 'Profesor: ') !!}
                    {!! Form::select('id_profesor', $profesores, null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion del curso: ') !!}
                    {!! Form::text('descripcion', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('semestre', 'Semestre del curso: ') !!}
                    {!! Form::text('semestre', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Agregar al curso',['class' => "btn btn-primary form-control"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @elseif($accion == 'modify')
        <h1>Agregar un curso nuevo</h1>
        <hr />
        <br />
        <div class="col-md-offset-2 col-md-5">
            {!! Form::model($cursoE, ['method' => 'POST', 'action' => ['CursosController@modificar', $cursoE->id]]) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre del curso: ') !!}
                    {!! Form::text('nombre', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sigla', 'Sigla del curso: ') !!}
                    {!! Form::text('sigla', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_profesor', 'Profesor: ') !!}
                    {!! Form::select('id_profesor', $profesores, null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion del curso: ') !!}
                    {!! Form::text('descripcion', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('semestre', 'Semestre del curso: ') !!}
                    {!! Form::text('semestre', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Modificar al curso',['class' => "btn btn-primary form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('id', null, ['style' => 'visibility: hidden']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @endif
@stop

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
.right {
    float:right;
    margin: 5px;
}
</style>