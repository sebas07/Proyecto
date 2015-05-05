@extends('layout')

@section('title', 'Nuevo estudiante')

@section('content')
    <h1>Agregar un Estudiante nuevo</h1>
    <hr />
    <br />
    <div class="col-md-offset-2 col-md-7">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('') }}">
        <div class="form-group">
            <div class="col-md-2">
            <label class="control-label">Carnet:</label><br>
            </div>
            <div class="col-md-3">
            <input id="carnet" class="form-control" name="carnet" type="text" required/>
            </div>
        </div>
            <div class="form-group">
                <div class="col-md-2">
                    <label class="control-label">Nombre:</label>
                </div>
                <div class="col-md-4">
                    <input id="nombre" class="form-control" name="nombre" type="text" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <label class="control-label">Apellidos:</label>
                </div>
                <div class="col-md-4">
                    <input id="apellido" class="form-control" name="apellidos" type="text" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <label class="control-label text-left">Fecha nacimiento:</label>
                </div>
                <div class="col-md-4">
                    <input id="fecha" class="form-control" name="fecha_nacimiento" type="date" required/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </form>




    </div>
@stop