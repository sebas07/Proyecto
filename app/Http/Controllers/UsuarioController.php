<?php namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Hash;
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
        $errores=[];
        $usu = new User();
        $usu->name = '';
        $usu->username = '';
        $usu->email = '';
        $usu->password = '';
        return view('ventanas.addUser',compact('errores','usu'));
    }

    public function validar($input){
        $msjs = array(
            'unique'=>'El nombre de usuario ingresado ya existe.',
            'max'=>'El corre y el nombre deben tener maximo 255 digitos, el nombre de usuario debe tener un maximo de 60 digitos',
            'min'=>'La contraseña debe ser minimo de 3 digitos',
            'confirmed'=>'Las contraseñas ingresadas no coinciden.'
        );
        return Validator::make($input, [
            'name' => 'required|max:255',
            'username' => 'required|max:60|unique:users',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:3',
        ],$msjs);
    }

    public function validarUpd($input){
        $msjs = array(
            'unique'=>'El nombre de usuario ingresado ya existe.',
            'max'=>'El corre y el nombre deben tener maximo 255 digitos',
            'min'=>'La contraseña debe ser minimo de 3 digitos'
        );
        return Validator::make($input, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:3',
        ],$msjs);
    }
    public function crear(){
        $input = Request::all();
        $usu = new User();
        $usu->name = $input['name'];
        $usu->username = $input['username'];
        $usu->email = $input['email'];
        $usu->password = '';
        $validalor = $this->validar($input);
        if ($validalor->fails()){
            $errores= $validalor->messages();
            return view('ventanas.addUser', compact('errores','usu'));
        } else{
            $usu->password = Hash::make($input['password']);
            $usu->save();
            return redirect('usuarios');
        }
    }

    public function openUpdtForm($id){
        $errores=[];
        $usuario = User::find($id);
        return view('ventanas.updtUser',compact('errores','usuario'));
    }

    public function update(){
        $input = Request::all();
        $usu = User::find($input['id']);
        $usuario = $usu;
        $validalor = $this->validarUpd($input);
        if ($validalor->fails()){
            $errores= $validalor->messages();
            return view('ventanas.updtUser', compact('errores','usuario'));
        } else{

            $usu->name = $input['name'];
            $usu->username = $input['username'];
            $usu->email = $input['email'];
            $usu->password = Hash::make($input['password']);
            $usu->save();
            return redirect('usuarios');
        }
    }

        public function eliminar($id) {
            User::destroy($id);
            return redirect('usuarios');
        }



}