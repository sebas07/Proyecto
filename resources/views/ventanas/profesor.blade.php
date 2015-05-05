@extends('ventanas.layout')

@section('title')
    Nuevo profesor
@stop

@section('content')
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
@stop