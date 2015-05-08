<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {

    protected $table = 'estudiantes';

    protected $fillable = [
        'carnet',
        'nombre',
        'apellidos',
        'fecha_nacimiento'
    ];

    public function cursos()
    {
        return $this->hasMany('App\CursoXEstudiante', 'id_estudiante');
    }

}
