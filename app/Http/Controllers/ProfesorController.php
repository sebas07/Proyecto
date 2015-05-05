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

	public function nuevo()
    {
        return view('ventanas.profesor');
    }

    public function crear()
    {
        $data = Request::all();
        $profesor = new Profesor();
        $profesor->nombre = $data['nombre'];
        $profesor->apellidos = $data['apellidos'];
        $profesor->especialidad = $data['especialidad'];

        $profesor->save();
        return view('ventanas.principal');
    }

}
