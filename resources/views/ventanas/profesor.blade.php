@extends('ventanas.layout')

@section('title')
    Profesores
@stop

@section('content')
    @if($accion == 'show')
        <section class="col-md-offset-1 col-md-10" style="height:600px;overflow-y:scroll;">
            <table class="table table-hover" id="profesores">
                <div id="btnAgregar">
                    <a href="{{ action('ProfesorController@nuevo', null) }}" class="btn btn-primary">Agregar profesor</a>
                </div>
                <caption id="tableTitle">Profesores</caption>
                <tr>
                    <th class="tableH" style="max-width: 175px; width: 175px; overflow: hidden">Nombre</th>
                    <th class="tableH" style="max-width: 150px; width: 150px; overflow: hidden">Apellidos</th>
                    <th class="tableH" style="max-width: 145px; width: 145px; overflow: hidden">Especialidades</th>
                    <th class="tableH" style="max-width: 200px; width: 200px; overflow: hidden">Opciones</th>
                </tr>
                @foreach($profesores as $profesor)
                <tr>
                    <td class="tableD" style="max-width: 150px; width:150px; overflow: hidden">
                        {{ $profesor->nombre }}</td>
                    <td class="tableD" style="max-width: 175px; width:175px; overflow: hidden">
                        {{ $profesor->apellidos }}</td>
                    <td class="tableD" style="max-width: 145px; width:145px; overflow: hidden">
                        {{ $profesor->especialidad }}</td>
                    <td class="tableD" style="max-width: 200px; overflow: hidden">
                    <div class="right">
                        <a href="{{ action('ProfesorController@borrar', [$profesor->id]) }}" class="btn btn-danger">Borrar</a>
                    </div>
                    <div class="right">
                        <a href="{{ action('ProfesorController@existente', [$profesor->id]) }}" class="btn btn-success">Modificar</a>
                    </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </section>
    @elseif($accion == 'create')
        <h1>Agregar un profesor nuevo</h1>
        <hr />
        <br />
        <div class="col-md-offset-2 col-md-5">
            {!! Form::open(['url' => 'profesores/create']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre del profesor: ') !!}
                    {!! Form::text('nombre', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('apellidos', 'Apellidos del profesor: ') !!}
                    {!! Form::text('apellidos', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('especialidad', 'Especialidad: ') !!}
                    {!! Form::text('especialidad', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Agregar al profesor',['class' => "btn btn-primary form-control"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    @elseif($accion == 'modify')
        <h1>Agregar un profesor nuevo</h1>
        <hr />
        <br />
        <div class="col-md-offset-2 col-md-5">
            {!! Form::model($profesor, ['method' => 'POST', 'action' => ['ProfesorController@modificar', $profesor->id]]) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre del profesor: ') !!}
                    {!! Form::text('nombre', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('apellidos', 'Apellidos del profesor: ') !!}
                    {!! Form::text('apellidos', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('especialidad', 'Especialidad: ') !!}
                    {!! Form::text('especialidad', null, ['class' => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Modificar al profesor',['class' => "btn btn-primary form-control"]) !!}
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