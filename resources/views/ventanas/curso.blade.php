@extends('ventanas.layout')

@section('title')
    Nuevo profesor
@stop

@section('content')
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
                {!! Form::text('id_profesor', null, ['class' => "form-control"]) !!}
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
@stop