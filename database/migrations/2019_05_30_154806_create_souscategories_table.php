<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSouscategoriesTable extends Migration {

	public function up()
	{
		Schema::create('souscategories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('sousCategorieName');
			$table->integer('categorie_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('souscategories');
	}
}