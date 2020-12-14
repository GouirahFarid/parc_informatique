<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReferencesTable extends Migration {

	public function up()
	{
		Schema::create('references', function(Blueprint $table) {
			$table->increments('id');
			$table->string('reference')->unique();
		});
	}

	public function down()
	{
		Schema::drop('references');
	}
}