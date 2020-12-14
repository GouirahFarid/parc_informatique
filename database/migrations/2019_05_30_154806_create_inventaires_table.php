<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventairesTable extends Migration {

	public function up()
	{
		Schema::create('inventaires', function(Blueprint $table) {
			$table->increments('id');
			$table->string('numeroInventaire')->unique();
			$table->string('numeroSerie')->unique();
			$table->string('designation');
			$table->double('prix');
			$table->string('dateAcquisition');
			$table->integer('souscategorie_id')->unsigned();
			$table->integer('salle_id')->unsigned();
			$table->integer('reference_id')->unsigned();
			$table->integer('fournisseur_id')->unsigned();
			$table->integer('marche_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('inventaires');
	}
}