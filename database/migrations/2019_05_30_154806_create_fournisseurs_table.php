<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFournisseursTable extends Migration {

	public function up()
	{
		Schema::create('fournisseurs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fournisseur');
		});
	}

	public function down()
	{
		Schema::drop('fournisseurs');
	}
}