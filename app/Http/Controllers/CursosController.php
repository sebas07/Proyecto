<?php namespace App\Http\Controllers;

use App\Curso;
use App\Estudiante;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
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
        //$profesores = Profesor::lists('nombre', 'id');
        $accion = 'create';
        $curso = new Curso();
        $errores = [];
        $profesores = Profesor::select(\DB::raw('concat(nombre, " ", apellidos) as fullname, id'))->lists('fullname', 'id');
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'curso','errores'));
    }

    public function validar($input){
        $msjs = array(
            'unique'=>'La sigla ingresada ya existe.',
            'max'=>'La sigla debe contener un máximo de 9 digitos',
            'min'=>'La sigla debe ser minimo de 7 digitos',
            'required' => 'Verifique que el campo :attribute tenga algun valor'
        );
        return Validator::make($input, [
            'nombre' => 'required|max:255',
            'sigla' => 'required|max:9|min:7|unique:cursos',
            'id_profesor' => 'required',
            'descripcion' => 'required',
            'semestre' => 'required'
        ],$msjs);
    }

    public function crear()
    {
        $data = Request::all();
        $curso = new Curso();
        $curso->nombre = $data['nombre'];
        $curso->sigla = strtoupper($data['sigla']);
        $data['sigla'] = $curso->sigla;
        $curso->id_profesor = $data['id_profesor'];
        $curso->descripcion = $data['descripcion'];
        $curso->semestre = $data['semestre'];
        $validador = $this->validar($data);
        if ($validador->fails()) {
            $errores = $validador->messages();
            $accion = 'create';
            $profesores = Profesor::select(\DB::raw('concat(nombre, " ", apellidos) as fullname, id'))->lists('fullname', 'id');
            return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'curso','errores'));
        } else {
            $curso->save();
            return redirect('cursos');
        }



    }

    public function validarUpd($input){
        $msjs = array(
            'unique'=>'La sigla ingresada ya existe.',
            'max'=>'La sigla debe contener un máximo de 9 digitos',
            'min'=>'La sigla debe ser minimo de 7 digitos',
            'required' => 'Verifique que el campo :attribute tenga algun valor'
        );
        return Validator::make($input, [
            'nombre' => 'required|max:255',
            'sigla' => 'required|max:9|min:7',
            'id_profesor' => 'required',
            'descripcion' => 'required',
            'semestre' => 'required'
        ],$msjs);
    }

    public function modificar()
    {
        $data = Request::all();
        $curso = Curso::findOrFail($data['id']);
        $curso->nombre = $data['nombre'];
        $curso->sigla = strtoupper($data['sigla']);
        $data['sigla'] = $curso->sigla;
        $curso->id_profesor = $data['id_profesor'];
        $curso->descripcion = $data['descripcion'];
        $curso->semestre = $data['semestre'];

        $validador = $this->validarUpd($data);
        if ($validador->fails()) {
            $accion = 'modify';
            $cursoE = Curso::findOrFail($data['id']);
            $profesores = Profesor::select(\DB::raw('concat(nombre, " ", apellidos) as fullname, id'))->lists('fullname', 'id');
            $errores = $validador->messages();
            return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'cursoE', 'errores'));
        } else {
            $curso->save();
            return redirect('cursos');
        }
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
        $profesores = Profesor::select(\DB::raw('concat(nombre, " ", apellidos) as fullname, id'))->lists('fullname', 'id');
        $errores = [];
        return view('ventanas.curso', compact('cursos', 'accion', 'profesores', 'cursoE','errores'));
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
