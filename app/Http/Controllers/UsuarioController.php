<?php namespace App\Http\Controllers;

use App\User;

use App\Http\Controllers\Controller;

use Request;

class UsuarioController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('ventanas.estudiante');
    }

    public function cargarUsuarios() {
        $idLogued = \Auth::user()->id;
        $result = \DB::table('users')->where('id', '!=',$idLogued )->get();
        return $result;
    }

    public function imprimirUsuarios(){
        $usuarios = $this->cargarUsuarios();
        return view('ventanas.usuarios', compact('usuarios'));

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