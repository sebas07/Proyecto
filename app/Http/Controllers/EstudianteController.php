<?php namespace App\Http\Controllers;

use App\Categorias;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contenidos;
use App\Categorias as Cate;
use App\Palabras;
use Request;

class EstudianteController extends Controller
{
    public function index(){
        return view('ventanas.estudiante');
    }

    public function crear(){
        $input = Request::all();

    }
}