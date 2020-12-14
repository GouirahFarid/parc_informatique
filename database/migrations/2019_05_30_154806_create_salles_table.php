<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSallesTable extends Migration {

	public function up()
	{
		Schema::create('salles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('salle')->unique();
		});
	}

	public function down()
	{
		Schema::drop('salles');
	}
}