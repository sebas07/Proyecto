<?php namespace App\Http\Controllers;

use App\Curso;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class CursosController extends Controller {

	public function nuevo()
    {
        return view('ventanas.curso');
    }

    public function crear()
    {
        $data = Request::all();
        $curso = new Curso();
        $curso->nombre = $data['nombre'];
        $curso->sigla = $data['sigla'];
        $curso->id_profesor = $data['id_profesor'];
        $curso->descripcion = $data['descripcion'];
        $curso->semestre = $data['semestre'];

        $curso->save();
        return view('ventanas.principal');
    }

}
