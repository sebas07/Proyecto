<?php namespace App\Http\Controllers;

use App\Estudiante;

use App\Http\Controllers\Controller;

use Request;

class EstudianteController extends Controller
{
    public function index(){
        return view('ventanas.estudiante');
    }

    public function crear(){
        $input = Request::all();
        $estudiante = new Estudiante();
        $estudiante->carnet = $input['carnet'];
        $estudiante->nombre = $input['nombre'];
        $estudiante->apellidos = $input['apellidos'];
        $estudiante->fecha_nacimiento = $input['fecha_nacimiento'];

        $estudiante->save();

        return redirect('home');
    }
}