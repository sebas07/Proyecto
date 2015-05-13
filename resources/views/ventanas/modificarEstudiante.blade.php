@extends('ventanas.layout')

@section('title')
    Nuevo estudiante
@stop

@section('content')
    <h1>Modificar un estudiante</h1>
    <hr />
    <br />
    <div class="col-md-offset-2 col-md-5">
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
        {!! Form::model($estudiante,['url' => 'estudiante/makeupdate']) !!}
            <div class="form-group">
                {!! Form::label('carnet', 'Carnet del estudiante: ') !!}
                {!! Form::text('carnet', null, ['class' => "form-control",'readonly']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del estudiante: ') !!}
                {!! Form::text('nombre', null, ['class' => "form-control", 'required' => "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos del estudiante: ') !!}
                {!! Form::text('apellidos', null, ['class' => "form-control", 'required' => "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento: ') !!}
                {!! Form::input('date', 'fecha_nacimiento', $estudiante->fecha_nacimiento, ['class' => "form-control", 'required' => "required"]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Modificar estudiante',['class' => "btn btn-primary form-control"]) !!}
            </div>
            {!! Form::text('id', null, ['class' => "form-control", 'required' => "required",'style' => 'visibility: hidden']) !!}
        {!! Form::close() !!}
    </div>
@stop