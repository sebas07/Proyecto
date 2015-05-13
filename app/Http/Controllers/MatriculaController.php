<?php namespace App\Http\Controllers;

use App\Curso;
use App\CursoXEstudiante;
use App\Estudiante;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Validator;
use Request;

class MatriculaController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $errores = [];
        $accion = 'start';
        return view('ventanas.matricula', compact('accion','errores'));
    }

    public function validar($input){
        $msjs = array(
            'exists'=>'El estudiante con dicho carnet no se encuentra en nuestros registros'
        );
        return Validator::make($input, [
            'carnet' => 'exists:estudiantes,carnet'
        ],$msjs);
    }

    public function cargar()
    {
        $data = Request::all();
        $carne = strtoupper($data['carnet']);
        $data['carnet'] = $carne;
        $validador = $this->validar($data);

        if ($validador->fails()) {
            $accion = 'start';
            $errores = $validador->messages();
            return view('ventanas.matricula', compact('accion','errores'));
        } else {
            $estudiante = Estudiante::where('carnet', '=', $data['carnet'])->first();
            return redirect('matricula/student/' . $estudiante->id);
        }
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

    public function desMatricular($idS,$isC) {
       $matriculas = CursoXEstudiante::all();
        foreach($matriculas as $matricula) {
            if (($matricula->id_estudiante == $idS)&&($matricula->id_curso==$isC)){
                CursoXEstudiante::destroy($matricula->id);
            }
        }
        return redirect('matricula/student/'.$idS);
    }

    public function autocompletar()
    {
        $term = Input::get('term');
        $results = array();
        $queries = \DB::table('estudiantes')->where('carnet', 'LIKE', '%'.$term.'%')->get();
        foreach ($queries as $query) {
            $results[] = ['label' => $query->carnet.' / '.$query->nombre.' '.$query->apellidos, 'value' => $query->carnet];
        }
        return \Illuminate\Support\Facades\Response::json($results);
    }
}
