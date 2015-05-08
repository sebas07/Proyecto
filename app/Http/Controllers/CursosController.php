<?php namespace App\Http\Controllers;

use App\Curso;
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

    /*public function autocompletar()
    {
        if(!isset($_REQUEST['term'])) {
            exit();
        }
        require('connection.php');
        $resultado = mysql_query("select * from persona where cedula like '".($_REQUEST['term'])."%' order by idpersona asc", $link);
        $data = array();
        while ($row = mysql_fetch_assoc($resultado, MYSQL_ASSOC)) {
            $label = $row['cedula'].' / '.$row['nombre'].' '.$row['apellido'];
            $data[] = array(
                'label' => $label,
                'value' => $row['cedula']
            );
        }
        echo json_encode($data);
        flush();
    }*/

}
