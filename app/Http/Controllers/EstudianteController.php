<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Estudiante;
use Request;
use Validator;

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
        return view('ventanas.agregarEstudiante');
    }

    public function validar($input){

        return Validator::make($input, [
            'carnet' => 'required|max:7|min:6|unique:estudiantes',
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'fecha_nacimiento' => 'required|date_format:"Y/m/d"',
        ]);
    }

    public function crear(){
        $input = Request::all();
        $validator = $this->validar($input);
        if ($validator->fails())
        {
            return Redirect::to('ventanas.principal')->withErrors($validator);
        } else {

            $estudiante = new Estudiante();
            $estudiante->carnet = $input['carnet'];
            $estudiante->nombre = $input['nombre'];
            $estudiante->apellidos = $input['apellidos'];
            $estudiante->fecha_nacimiento = $input['fecha_nacimiento'];
            $estudiante->save();
            return view('ventanas.principal');
        }
    }



}