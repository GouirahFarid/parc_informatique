<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('categories', function(Blueprint $table) {
			$table->foreign('department_id')->references('id')->on('departments')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('souscategories', function(Blueprint $table) {
			$table->foreign('categorie_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->foreign('souscategorie_id')->references('id')->on('souscategories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->foreign('salle_id')->references('id')->on('salles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->foreign('reference_id')->references('id')->on('references')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->foreign('fournisseur_id')->references('id')->on('fournisseurs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->foreign('marche_id')->references('id')->on('marches')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('problemes', function(Blueprint $table) {
			$table->foreign('inventaire_id')->references('id')->on('inventaires')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('categories', function(Blueprint $table) {
			$table->dropForeign('categories_department_id_foreign');
		});
		Schema::table('souscategories', function(Blueprint $table) {
			$table->dropForeign('souscategories_categorie_id_foreign');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->dropForeign('inventaires_souscategorie_id_foreign');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->dropForeign('inventaires_salle_id_foreign');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->dropForeign('inventaires_reference_id_foreign');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->dropForeign('inventaires_fournisseur_id_foreign');
		});
		Schema::table('inventaires', function(Blueprint $table) {
			$table->dropForeign('inventaires_marche_id_foreign');
		});
		Schema::table('problemes', function(Blueprint $table) {
			$table->dropForeign('problemes_inventaire_id_foreign');
		});
	}
}