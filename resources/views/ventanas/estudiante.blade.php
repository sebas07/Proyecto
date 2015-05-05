@extends('ventanas.layout')

@section('title')
    Nuevo estudiante
@stop

@section('content')
    <h1>Agregar un Estudiante nuevo</h1>
    <hr />
    <br />
    <div class="col-md-offset-2 col-md-7">
        {!! Form:open(['url' => 'contenidos/new']) !!}
            <div class="form-group">
                {!! Form::label('', '') !!}
                {!! Form::text('', null, ['class' => ""]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', '') !!}
                {!! Form::text('', null, ['class' => ""]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', '') !!}
                {!! Form::text('', null, ['class' => ""]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', '') !!}
                {!! Form::text('', null, ['class' => ""]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('', '') !!}
                {!! Form::text('', null, ['class' => ""]) !!}
            </div>
        {!! Form:close()
    </div>
@stop