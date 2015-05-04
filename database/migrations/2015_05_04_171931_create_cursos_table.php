<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cursos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre');
            $table->string('sigla')->unique();
            $table->integer('id_profesor')->unsigned();
            $table->string('descripcion');
            $table->string('semestre');
			$table->timestamps();

            $table->foreign('id_profesor')
                ->references('id')
                ->on('profesor')
                ->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cursos');
	}

}
