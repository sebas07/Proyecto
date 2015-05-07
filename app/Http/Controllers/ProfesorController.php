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
        $accion = 'show';
        $profesores = Profesor::all();
        return view('ventanas.profesor', compact('profesores', 'accion', 'profesor'));
    }

	public function nuevo()
    {
        $accion = 'create';
        return view('ventanas.profesor', compact('profesores', 'accion', 'profesor'));
    }

    public function crear()
    {
        $data = Request::all();
        $profesor = new Profesor();
        $profesor->nombre = $data['nombre'];
        $profesor->apellidos = $data['apellidos'];
        $profesor->especialidad = $data['especialidad'];

        $profesor->save();
        return redirect('profesores');
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

        $profesor->save();
        return redirect('profesores');
    }

    public function borrar($id)
    {
        Profesor::destroy($id);
        return redirect('profesores');
    }

    public function existente($id)
    {
        $accion = 'modify';
        $profesor = Profesor::findOrFail($id);
        return view('ventanas.profesor', compact('profesores', 'accion', 'profesor'));
    }

}
