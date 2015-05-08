<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoXEstudiante extends Model {

	protected $table = 'curso_x_estudiantes';

    protected $fillable = [
        'id_estudiante',
        'id_curso'
    ];

}
