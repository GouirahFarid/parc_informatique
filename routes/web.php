<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/departments','ControllerConfiguration@getDepartments');
Route::get('/categories','ControllerConfiguration@getCategories');
Route::get('/sousCategories','ControllerConfiguration@getSousCategories');
Route::get('/salles','ControllerConfiguration@getSalles');
/*-----------------------------ADD----------------------------------*/
Route::get('/addDepartment','ControllerConfiguration@addDepartment');
Route::post('/addDepartment','ControllerConfiguration@addDepartments');
Route::get('/addCategorie/{id}','ControllerConfiguration@addCategorie');
Route::post('/addCategorie','ControllerConfiguration@addCategories');
Route::get('/addSousCategorie/{id}','ControllerConfiguration@addSousCategorie');
Route::post('/addSousCategorie','ControllerConfiguration@addSousCategories');
Route::get('/addSalle','ControllerConfiguration@addSalle');
Route::post('/addSalle','ControllerConfiguration@addSalles');
/*---------------------------DELETE-------------------------------------*/
Route::get('/deleteDepartment/{id}','ControllerConfiguration@deleteDepartment');
Route::get('/deleteCategorie/{id}','ControllerConfiguration@deleteCategorie');
Route::get('/deleteSousCategorie/{id}','ControllerConfiguration@deleteSousCategorie');
Route::get('/deleteSalle/{id}','ControllerConfiguration@deleteSalle');
/*---------------------------------commande--------------------------*/

Route::get('/commande','Commande@commande');
Route::post('/commandeOne','Commande@commandeOne');
Route::post('/commandeTwo','CommaneTwo@commandeTwo');
/*-----------------------------Inventaires----------------------------*/
Route::get('/inventaire','controllerInventaire@inventaires');
Route::get('/inventaireDepartment/{id}','controllerInventaire@inventairesDepartment');
Route::get('/inventaireCategorie/{id1}/{id2}','controllerInventaire@inventaireCategorie');
Route::get('/inventaireSouscategorie/{id1}/{id2}/{id3}','controllerInventaire@inventaireSouscategorie');
Route::get('/addInventaire/{id1}/{id2}/{id3}','CreateInventaire@createInventaire');
Route::post('/addInventaire','CreateInventaire@createInventaires');
Route::get('/updateInventaire/{id1}','CreateInventaire@updateInventaire');
Route::get('/supprimerInventaire/{id1}/{id2}/{id3}/{id4}','CreateInventaire@supprimerInventaire');
Route::post('/updateInventaire/{id}','CreateInventaire@updateInventaires');
/*--------------------------------Excel----------------------------------------------*/
Route::get('/exportAll','ExportRapport@exportAll');
Route::get('/exportDepartment/{id}','ExportRapport@exportDepartment');
Route::get('/exportCategorie/{id1}/{id2}','ExportRapport@exportCategorie');
Route::get('/exportSousCategorie/{id1}/{id2}/{id3}','ExportRapport@exportSousCategorie');
/*------------------------------------Search-----------------------------------------------*/
Route::post('/searchDepartment','Search@searchDepartment');
Route::post('/searchCategorie','Search@searchCategorie');
Route::post('/searchSousCategorie','Search@searchSousCategorie');
Route::post('/searchAll','Search@searchAll');
/*------------------------------Export-----------------------------------*/
Route::get('/salle','ExportPar@salle');
Route::post('/salles','ExportPar@salles');
Route::get('/fournisseur','ExportPar@fournisseur');
Route::post('/fournisseurs','ExportPar@fournisseurs');
Route::get('/marche','ExportPar@marche');
Route::post('/marches','ExportPar@marches');
Route::get('/exportSalle/{id}','ExportRapport@exportSalle');
Route::get('/exportFournisseur/{id}','ExportRapport@exportFournisseur');
Route::get('/exportMarche/{id}','ExportRapport@exportMarche');
/*---------------------------------Problemes------------------------*/
Route::post('/ajouterProbleme','CreateInventaire@ajouterProbleme');
Route::get('/supprimerProbleme/{id1}/{id2}','CreateInventaire@supprimerProbleme');
/*--------------------------------------Home-------------------------*/
Route::get('/','Home@home');
/*--------------------------------------Home-------------------------*/
/*--------------------------------------Login-------------------------*/
Route::get('/login','Login@login');
Route::get('/sign','Login@sign');
Route::post('/sign','Login@signup');
Route::get('/updateUser/{id}','Login@updateUser');
Route::post('/updateUser','Login@updateUsers');
Route::post('/login','Login@signin');
Route::get('/logout','Login@logout');
/*--------------------------------------Login-------------------------*/
Route::get('/users','ControllerConfiguration@getUsers');
Route::get('/deleteUser/{id}','Login@deleteUser');

