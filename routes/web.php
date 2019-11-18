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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['register'=>false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
Route::resource('/equipamentos', 'EquipamentosController');
Route::post('/equipamentos/busca', 'EquipamentosController@busca');
Route::resource('/reservas', 'ReservasController');
Route::get('/home', 'HomeController@index');
Route::get('user/password', 'UserController@password');
Route::post('user/updatepassword', 'UserController@updatePassword');
Route::resource('/user','UserController');
Route::resource('/devolucao', 'DevolucaoController');
Route::resource('/novousuario', 'UserController');
Route::get('eq-pdf','EquipamentosController@generatePDF');
Route::get('re-pdf','ReservasController@generatePDF');
Route::get('de-pdf','DevolucaoController@generatePDF');

});



