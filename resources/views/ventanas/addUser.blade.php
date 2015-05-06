@extends('ventanas.layout')

@section('title', 'Agregar Usuario')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        @if (count($errores) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errores->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            {!! Form::open(['url' => 'ususarios/addnew'])!!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre:',['class' => "col-md-4 control-label") !!}
                                <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => "form-control", 'required' => "required", 'autofocus'=>'autofocus']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('username', 'Nombre:',['class' => "col-md-4 control-label") !!}
                                <div class="col-md-6">
                                    {!! Form::text('username', null, ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Correo Electronico:',['class' => "col-md-4 control-label") !!}
                                <div class="col-md-6">
                                    {!! Form::email('email', null, ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password:',['class' => "col-md-4 control-label") !!}
                                <div class="col-md-6">
                                    {!! Form::password('password', null, ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Confirmar password:',['class' => "col-md-4 control-label") !!}
                                <div class="col-md-6">
                                    {!! Form::password('password_confirmation', null, ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

