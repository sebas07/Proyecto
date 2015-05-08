@extends('ventanas.layout')

@section('title')
    Nuevo profesor
@stop

@section('content')
    @if($accion == 'show')
        <section class="col-md-12" style="height:600px;overflow-y:scroll;">
            <table class="table table-hover" id="cursos">
                <div id="btnAgregar">
                    <a href="{{ action('CursosController@nuevo', null) }}" class="btn btn-primary">Agregar curso</a>
                </div>
                <caption id="tableTitle">Cursos</caption>
                <tr style="background-color: #2175bc">
                    <th class="tableH" style="max-width: 175px; width: 175px; overflow: hidden">Nombre</th>
                    <th class="tableH" style="max-width: 150px; width: 150px; overflow: hidden">Sigla</th>
                    <th class="tableH" style="max-width: 145px; width: 145px; overflow: hidden">Profesor</th>
                    <th class="tableH" style="max-width: 250px; width: 250px; overflow: hidden">Opciones</th>
                </tr>
                @foreach($cursos as $curso)
                <tr>
                    <td class="tableD" style="max-width: 150px; width:150px; overflow: hidden">
                        {{ $curso->nombre }}</td>
                    <td class="tableD" style="max-width: 175px; width:175px; overflow: hidden">
                        {{ $curso->sigla }}</td>
                    <td class="tableD" style="max-width: 145px; width:145px; overflow: hidden">
                        {{ $curso->profesor->nombre.' '.$curso->profesor->apellidos }}</td>
                    <td class="tableD" style="max-width: 250px; overflow: hidden">
                        <div class="right">
                            <a href="{{ action('CursosController@verDatos', [$curso->id]) }}" class="btn btn-success">Ver datos</a>
                        </div>
                        <div class="right">
                            <a href="{{ action('CursosController@existente', [$curso->id]) }}" class="btn btn-success">Modificar</a>
                        </div>
                        <div class="right">
                            <a href="{{ action('CursosController@borrar', [$curso->id]) }}" class="btn btn-danger">Borrar</a>
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
                    {!! Form::textarea('descripcion', null, ['class' => "form-control", 'id' => 'textA']) !!}
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
                    {!! Form::textarea('descripcion', null, ['class' => "form-control", 'id' => 'textA']) !!}
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
    @elseif($accion == 'display')
        <br />
        <div class="col-md-offset-2 col-md-5">
            <table class="table table-hover" id="curso">
                <caption id="tableTitle">Datos del curso</caption>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                    <strong>Nombre del curso:</strong>{{ ' '.$curso->nombre }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                        <strong>Sigla:</strong>{{ ' '.$curso->sigla }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                        <strong>Profesor:</strong>{{ ' '.$curso->profesor->nombre.' '.$curso->profesor->apellidos }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                        <strong>Descripcion del curso:</strong>{{ ' '.$curso->descripcion }}</td>
                </tr>
                <tr>
                    <td class="tableD" style="overflow: hidden">
                        <strong>Semestre:</strong>{{ ' '.$curso->semestre }}</td>
                </tr>
            </table>
            <a href="{{ action('CursosController@imprimirReporte', [$curso->id]) }}" class="btn btn-primary">Ver reporte</a>
        </div>
    @endif
@stop

{{--<script>--}}
{{--jQuery(document).ready(function(){--}}
{{--$('#searchC').autocomplete({--}}
{{--source: 'autocompletar3.php',--}}
{{--minLength: 2--}}
{{--});--}}
{{--$('#search').autocomplete({--}}
{{--source: 'autocompletar2.php',--}}
{{--minLength: 2--}}
{{--});--}}
{{--});--}}
{{--</script>--}}

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
    float:left;
    margin: 5px;
}
 #textA {
     height: 90px;
 }
</style>