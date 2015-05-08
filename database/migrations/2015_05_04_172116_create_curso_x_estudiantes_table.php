<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoXEstudiantesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curso_x_estudiantes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_estudiante')
                ->references('id')
                ->on('estudiantes')
                ->onDelete('cascade');
            $table->foreign('id_curso')
                ->references('id')
                ->on('cursos')
                ->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('curso_x_estudiantes');
	}

}
