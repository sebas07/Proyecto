<?php namespace App\Http\Controllers;

use App\Curso;
use App\CursoXEstudiante;
use App\Estudiante;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class MatriculaController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $accion = 'start';
        return view('ventanas.matricula', compact('accion'));
    }

    public function cargar()
    {
        $data = Request::all();
        $estudiante = Estudiante::where('carnet', '=', $data['carnet'])->first();
        return redirect('matricula/student/'.$estudiante->id);
    }

    public function cargarEstudiante($id) {
        $estudiante = Estudiante::find($id);
        return redirect('matricula/student/'.$estudiante->id);
    }

    public function mostrar($id)
    {
        $accion = 'enrollment';
        $estudiante = Estudiante::find($id);
        $cursos = array();
        $ids = array();
        foreach ($estudiante->cursos as $c) {
            $curso = Curso::find($c->id_curso);
            $cursos[] = $curso;
            $ids[] = $c->id_curso;
        }
        //dd($ids);
        $otros = Curso::whereNotIn('id', $ids)->get();
        $estudiante->cursos_matriculados = $cursos;

        return view('ventanas.matricula', compact('accion', 'estudiante', 'otros'));
    }

    public function matricular($idS, $idC)
    {
        $matricula = new CursoXEstudiante();
        $matricula->id_estudiante = $idS;
        $matricula->id_curso = $idC;

        $matricula->save();
        return redirect('matricula/student/'.$idS);
    }

}
