<?php namespace App\Http\Controllers;

use App\Curso;
use App\Estudiante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor;
use Request;

class CursosController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $accion = 'show';
        $cursos = Curso::all();
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'curso'));
    }

	public function nuevo()
    {
        $accion = 'create';
        //$profesores = Profesor::lists('nombre', 'id');
        $profesores = Profesor::select(\DB::raw('concat(nombre, " ", apellidos) as fullname, id'))->lists('fullname', 'id');
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

    public function verDatos($id)
    {
        $accion = 'display';
        $curso = Curso::findOrFail($id);
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'curso'));
    }

    public function existente($id)
    {
        $accion = 'modify';
        $cursoE = Curso::findOrFail($id);
        $profesores = Profesor::lists('nombre', 'id');
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'cursoE'));
    }

    public function reportIndex()
    {
        $accion = 'start';
        return view('ventanas.reporte', compact('accion', 'curso'));
    }

    public function cargarReporte()
    {
        $data = Request::all();
        $curso = Curso::where('sigla', '=', $data['sigla'])->first();
        return redirect('cursos/report/'.$curso->id);
    }

    public function imprimirReporte($id)
    {
        $accion = 'display';
        $curso = Curso::findOrFail($id);

        $idsE = $curso->estudiantes;
        $estudiantes = array();
        foreach ($idsE as $idE) {
            $estudiantes[] = Estudiante::find($idE->id_estudiante);
        }
        $curso->alumnos = $estudiantes;
        //dd($curso);
        return view('ventanas.reporte', compact('accion', 'curso'));
    }

}
