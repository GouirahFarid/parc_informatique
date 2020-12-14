<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarchesTable extends Migration {

	public function up()
	{
		Schema::create('marches', function(Blueprint $table) {
			$table->increments('id');
			$table->string('marche')->unique();
		});
	}

	public function down()
	{
		Schema::drop('marches');
	}
}