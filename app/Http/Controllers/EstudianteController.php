<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Estudiante;
use Request;

class EstudianteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('ventanas.estudiante', compact('estudiantes'));
    }

    public function nuevo()
    {
        return view('ventanas.estudiante', compact('estudiantes'));
    }

    public function crear(){
        $input = Request::all();
        $estudiante = new Estudiante();
        $estudiante->carnet = $input['carnet'];
        $estudiante->nombre = $input['nombre'];
        $estudiante->apellidos = $input['apellidos'];
        $estudiante->fecha_nacimiento = $input['fecha_nacimiento'];

        $estudiante->save();

        return view('ventanas.principal');
    }



}