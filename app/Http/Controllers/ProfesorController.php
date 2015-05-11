<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor;
use Request;

class ProfesorController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $errores = [];
        $accion = 'show';
        $profesores = Profesor::all();
        return view('ventanas.profesor', compact('profesores', 'accion', 'profesor','errores'));
    }

	public function nuevo()
    {
        $errores = [];
        $accion = 'create';
        return view('ventanas.profesor', compact('profesores', 'accion', 'profesor','errores'));
    }

    public function validar($input){
        $msjs = array(
            'required'=>'Todos los campos son requeridos.',
            'max'=>'Nombre y apellidos puden tener como maximo 255 digitos, las especialidades pueden tener un maximo de 255 digitos'
        );
        return Validator::make($input, [
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'especialidad' => 'required|max:255'
        ],$msjs);
    }

    public function crear()
    {
        $data = Request::all();
        $profesor = new Profesor();
        $profesor->nombre = $data['nombre'];
        $profesor->apellidos = $data['apellidos'];
        $profesor->especialidad = $data['especialidad'];
        $validalor = $this->validar($data);
        if ($validalor->fails()) {
            $errores= $validalor->messages();
            $accion = 'create';
            return view('ventanas.profesor', compact('profesores', 'accion', 'profesor','errores'));
        } else {

            $profesor->save();
            return redirect('profesores');
        }


    }

    public function verDatos($id)
    {

        $accion = 'display';
        $profesor = Profesor::findOrFail($id);
        return view('ventanas.profesor', compact('profesores', 'accion', 'profesor'));
    }

    public function modificar()
    {

        $data = Request::all();
        $profesor = Profesor::findOrFail($data['id']);
        $profesor->nombre = $data['nombre'];
        $profesor->apellidos = $data['apellidos'];
        $profesor->especialidad = $data['especialidad'];
        $validador = $this->validar($data);
        if ($validador->fails()) {
            $errores= $validador->messages();
            $accion = 'modify';
            return view('ventanas.profesor', compact('profesores', 'accion', 'profesor','errores'));
        } else {
            $profesor->save();
            return redirect('profesores');
        }
    }

    public function borrar($id)
    {
        Profesor::destroy($id);
        return redirect('profesores');
    }

    public function existente($id)
    {
        $errores = [];
        $accion = 'modify';
        $profesor = Profesor::findOrFail($id);
        return view('ventanas.profesor', compact('profesores', 'accion', 'profesor','errores'));
    }

}
