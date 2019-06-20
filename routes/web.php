<?php

use App\Http\Controllers\RefeicaoController;

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
    //$refeicoes = RefeicaoController::retorna(date('Y-m-d')); , compact('refeicoes')
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('cardapio', 'RefeicaoController');
    Route::resource('votacao', 'VotacaoController');
    Route::get('vote', 'VotacaoController@start');
    Route::get('analise', function(){
        $analise = true;
        return view('analise.analise-index', compact('analise'));
    });
});

Route::get('cardapio_dia', 'RefeicaoController@retorna');
Route::get('refeicao_dia', 'VotacaoController@retorna');