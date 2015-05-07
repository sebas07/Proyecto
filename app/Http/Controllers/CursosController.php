<?php namespace App\Http\Controllers;

use App\Curso;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor;
use Request;

class CursosController extends Controller {

    public function index()
    {
        $accion = 'show';
        $cursos = Curso::all();
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'curso'));
    }

	public function nuevo()
    {
        $accion = 'create';
        $profesores = Profesor::lists('nombre', 'id');
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'curso'));
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
        return redirect('cursos');
    }

    public function modificar()
    {
        $data = Request::all();
        $curso = Curso::findOrFail($data['id']);
        $curso->nombre = $data['nombre'];
        $curso->sigla = $data['sigla'];
        $curso->id_profesor = $data['id_profesor'];
        $curso->descripcion = $data['descripcion'];
        $curso->semestre = $data['semestre'];

        $curso->save();
        return redirect('cursos');
    }

    public function borrar($id)
    {
        Curso::destroy($id);
        return redirect('cursos');
    }

    public function existente($id)
    {
        $accion = 'modify';
        $cursoE = Curso::findOrFail($id);
        $profesores = Profesor::lists('nombre', 'id');
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'cursoE'));
    }

}
