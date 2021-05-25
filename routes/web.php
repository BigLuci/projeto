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

Route::get('/series','SeriesController@index')
    ->name('listar_series');
Route::get('/series/criar','SeriesController@create')
    ->name('form_criar_serie'); 
Route::post('/series/criar', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');

Route::get('/series/{seriesId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporadaId}/episodios', 'EpisodiosController@index');

#Route::get('produtos', 'MeuControlador@produtos');
#Route::get('nome', 'MeuControlador@getNome');
#Route::get('idade', 'MeuControlador@getIdade');
#Route::get('multiplicar/{n1}/{n2}','MeuControlador@multiplicar');
#Route::resource('clientes', 'clienteControlador');