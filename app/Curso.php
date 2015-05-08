<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {

    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
        'sigla',
        'id_profesor',
        'descripcion',
        'semestre'
    ];

    public function profesor()
    {
        return $this->belongsTo('App\Profesor', 'id_profesor');
    }

    public function estudiantes()
    {
        return $this->hasMany('App\CursoXEstudiante', 'id_curso');
    }

}
