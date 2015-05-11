@extends('ventanas.layout')

@section('title', 'Agregar Usuario')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrar usuario</div>
                    <div class="panel-body">
                        @if (count($errores) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Hay problemas con los datos ingresados.<br><br>
                                <ul>
                                    @foreach ($errores->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            {!! Form::model($usu,['url' => 'ususarios/addnew']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre:',['class' => "col-md-4 control-label"]) !!}
                                <div class="col-md-6">
                                    {!! Form::text('name', null, ['class' => "form-control", 'required' => "required", 'autofocus'=>'autofocus']) !!}
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="form-group">
                                {!! Form::label('username', 'Nombre Usuario:',['class' => "col-md-4 control-label"]) !!}
                                <div class="col-md-6">
                                    {!! Form::text('username', null, ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="form-group">
                                {!! Form::label('email', 'Correo Electronico:',['class' => "col-md-4 control-label"]) !!}
                                <div class="col-md-6">
                                    {!! Form::email('email', null, ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="form-group">
                                {!! Form::label('password', 'Password:',['class' => "col-md-4 control-label"]) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password', ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Confirmar password:',['class' => "col-md-4 control-label"]) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password_confirmation', ['class' => "form-control", 'required' => "required"]) !!}
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-3 col-md-offset-5">
                            {!! Form::submit('Ingresar', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

