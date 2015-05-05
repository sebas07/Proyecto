<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model {

    protected $table = 'profesor';

    protected $fillable = [
        'nombre',
        'apellidos',
        'especialidad'
    ];

}
