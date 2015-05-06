<?php namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;

use Request;

class UsuarioController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('ventanas');
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


    public function openFormCreate(){
        return view('ventanas.addUser');
    }

    public function validar($input){

        return Validator::make($input, [
            'name' => 'required|max:255',
            'username' => 'required|max:60',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    public function crear(){
        $input = Request::all();

        $validalor = validar($input);
        if ($validalor->fails){
            $errores= $validalor->messages();
            return view('ventanas.usuarios', compact('errores'));
        } else{
            $usu = new User();
            $usu->name = $input['name'];
            $usu->username = $input['username'];
            $usu->email = $input['email'];
            $usu->password = $input['password'];
            //crear usu aqui
            $this->imprimirUsuarios();
        }


    }
}