<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProblemesTable extends Migration {

	public function up()
	{
		Schema::create('problemes', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('probleme')->default(0);
			$table->string('designation');
			$table->integer('inventaire_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('problemes');
	}
}