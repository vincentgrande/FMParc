<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ParcController@index')->name('parc');
Route::get('/utilisateurs', 'UserController@index')->name('gestion');
Route::get('/{id}', 'ParcController@index')->name('modif');
Route::get('/utilisateurs/{userid}', 'UserController@index')->name('util');
Route::get('/ok', function(){
   echo phpinfo();
});
Route::post('/enregistrer', 'ParcController@enregistrer')->name('enregistrer');
Route::post('/fiche', 'ParcController@fiche')->name('fiche');
Route::post('/nouveaumodele', 'ParcController@nouveaumodele')->name('nouveaumodele');
Route::post('/desactivermodele', 'ParcController@desactivermodele')->name('desactivermodele');
Route::post('/activermodele', 'ParcController@activermodele')->name('activermodele');
Route::post('/supprimer', 'ParcController@supprimer')->name('supprimer');
Route::post('/modifuser', 'UserController@modif')->name('modifuser');
Route::post('/createuser', 'UserController@creation')->name('createuser');
Route::post('/deleteuser', 'UserController@supprimer')->name('deleteuser');





