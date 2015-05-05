@extends('ventanas.layout')

@section('title')
    Nuevo estudiante
@stop

@section('content')
    <h1>Agregar un estudiante nuevo</h1>
    <hr />
    <br />
    <div class="col-md-offset-2 col-md-5">
        {!! Form::open(['url' => 'estudiante/create']) !!}
            <div class="form-group">
                {!! Form::label('carnet', 'Carnet del estudiante: ') !!}
                {!! Form::text('carnet', null, ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del estudiante: ') !!}
                {!! Form::text('nombre', null, ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos del estudiante: ') !!}
                {!! Form::text('apellidos', null, ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento: ') !!}
                {!! Form::input('date', 'fecha_nacimiento', date('Y-m-d'), ['class' => "form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Agregar al estudiante',['class' => "btn btn-primary form-control"]) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop