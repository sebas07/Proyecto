<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Estudiante;
use Request;
use Validator;
use Redirect;

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
        $errores=[];
        $estudiante = new Estudiante();
        return view('ventanas.agregarEstudiante',compact('errores','estudiante'));
    }

    public function modificarForm($id){
        $errores=[];
        $estudiante = Estudiante::find($id);
        return view('ventanas.modificarEstudiante',compact('errores','estudiante'));
    }

    public function validar($input){
        $msjs = array(
            'unique'=>'El carnet ingresado ya existe.',
            'max'=>'El carnet debe ser de 6 digitos',
            'min'=>'El carnet debe ser de 6 digitos',
            'date_format'=>'el formato de las fechas debe ser "año-mes-dia". E.j: 2015-02-25'
            );
        return Validator::make($input, [
            'carnet' => 'required|max:6|min:6|unique:estudiantes',
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'fecha_nacimiento' => 'required|date_format:"Y-m-d"',
        ],$msjs);
    }

    public function validarUpdt($input){
        $msjs = array(
            'unique'=>'El carnet ingresado ya existe.',
            'max'=>'El carnet debe ser de 6 digitos',
            'min'=>'El carnet debe ser de 6 digitos',
            'date_format'=>'el formato de las fechas debe ser "año-mes-dia". E.j: 2015-02-25'
        );
        return Validator::make($input, [
            'carnet' => 'required|max:6|min:6',
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'fecha_nacimiento' => 'required|date_format:"Y-m-d"',
        ],$msjs);
    }

    public function crear(){
        $input = Request::all();
        $estudiante = new Estudiante();
        $estudiante->carnet = $input['carnet'];
        $estudiante->nombre = $input['nombre'];
        $estudiante->apellidos = $input['apellidos'];
        $estudiante->fecha_nacimiento = $input['fecha_nacimiento'];
        $validator = $this->validar($input);
        if ($validator->fails())
        {
            $errores= $validator->messages();
            return view('ventanas.agregarEstudiante',compact('errores','estudiante'));
        } else {


            $estudiante->save();
            $estudiantes = Estudiante::all();
            return view('ventanas.estudiante', compact('estudiantes'));
        }
    }

    public function modificar(){
        $input = Request::all();
        $id = $input['id'];
        $estudiante = Estudiante::find($id);
        $estudiante->carnet = $input['carnet'];
        $estudiante->nombre = $input['nombre'];
        $estudiante->apellidos = $input['apellidos'];
        $estudiante->fecha_nacimiento = $input['fecha_nacimiento'];
        $validator = $this->validarUpdt($input);
        if ($validator->fails())
        {
            $errores= $validator->messages();
            return view('ventanas.modificarEstudiante',compact('errores','estudiante'));
        } else {
            $estudiante->save();
            $estudiantes = Estudiante::all();
            return view('ventanas.estudiante', compact('estudiantes'));
        }
    }


    public function eliminar($id) {
        Estudiante::destroy($id);
        $estudiantes = Estudiante::all();
        return view('ventanas.estudiante', compact('estudiantes'));

    }

}