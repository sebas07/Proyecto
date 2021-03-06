@extends('ventanas.layout')

@section('title')
    Estudiantes
@stop

@section('content')
    <section class="col-md-12" style="height:600px;overflow-y:scroll;">
        <div id="btnAgregar">
            <a href="{{ action('EstudianteController@nuevo', null) }}" class="btn btn-primary">Agregar estudiante</a>
        </div>
        <table class="table table-hover" id="estudiantes">

            <caption id="tableTitle">Estudiantes</caption>
            <tr style="background-color: #2175bc">
                <th class="tableH" style="max-width: 150px; width: 150px; overflow: hidden">Carnet</th>
                <th class="tableH" style="max-width: 175px; width: 175px; overflow: hidden">Nombre</th>
                <th class="tableH" style="max-width: 145px; width: 145px; overflow: hidden">Apellidos</th>
                <th class="tableH" style="max-width: 180px; width: 180px; overflow: hidden">Fecha de nacimiento</th>
                <th class="tableH" style=" width: 340px; overflow: hidden; text-align: center">Opciones</th>
            </tr>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td class="tableD" style="max-width: 150px; width:150px; overflow: hidden">
                    {{ $estudiante->carnet }}</td>
                <td class="tableD" style="max-width: 175px; width:175px; overflow: hidden">
                    {{ $estudiante->nombre }}</td>
                <td class="tableD" style="max-width: 145px; width:145px; overflow: hidden">
                    {{ $estudiante->apellidos }}</td>
                <td class="tableD" style="max-width: 180px; width:180px; overflow: hidden">
                    {{ $estudiante->fecha_nacimiento }}</td>
                <td class="tableD" style="width: 340px;overflow: hidden">
                    <div class="right">
                        <a href="{{ action('MatriculaController@cargarEstudiante', [$estudiante->id]) }}" class="btn btn-primary" style=" ">Matricula</a>
                    </div>
                    <div class="right">
                        <a href="{{ action('EstudianteController@modificarForm', [$estudiante->id]) }}" class="btn btn-success">Modificar</a>
                    </div>
                <div class="right">
                    <a href="{{ action('EstudianteController@eliminar', [$estudiante->id]) }}"
                    onclick="return confirm('¿Realmente desea eliminar al estudiante {{ $estudiante->nombre.' '.$estudiante->apellidos }}?')"
                    class="btn btn-danger">Borrar</a>
                </div>

                </td>
            </tr>
            @endforeach
        </table>
    </section>
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
th {
    color: #ffffff;
}
.right {
    float:left;
    margin: 5px;
}
</style>