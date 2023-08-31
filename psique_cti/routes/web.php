<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\TriagemController; //--> Triagem
use app\Http\Controllers\ArtigosController; //--> Artigos
use app\Http\Controllers\CadastroController; //--> Informações adicionais
use app\Http\Controllers\EventosController; // --> Eventos

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/mural', function () {
    return view('pages.mural');
});

Route::get('/contato', function () {
    return view('pages.contato');
});

Route::get('/login', function () {
    return view('pages.login');
});

Route::get('/cadastro', function () {
    return view('pages.cadastro');
});

Route::post('/cadastro', 'App\Http\Controllers\CadastroController@processarFormulario')->name('cad');

Route::get('/triagem', function () {
    return view('pages.triagem');
});

Route::post('/triagem',
['as'  =>'controller.triagem',
 'uses'=>'App\Http\Controllers\TriagemController@verifica']);

Route::get('/emocoes', function () {
    return view('pages.emocoes');
});


//  Psico
Route::get('/homepsico', function () {
    return view('pages.psico.home');
});

Route::get('/adicionartigo', function () {
    return view('pages.psico.addartigo');
   });

Route::post('/adicionartigo',
['as'  =>'controller.artigo',
 'uses'=>'App\Http\Controllers\ArtigosController@verificaForm']);


Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
});

Route::post('/editartigo',
['as'  =>'controller.artigo',
 'uses'=>'App\Http\Controllers\ArtigosController@verificaForm']);

Route::get('/adicionaevento', function () {
    return view('pages.psico.addevento');
});

Route::post('/adicionaevento', 'App\Http\Controllers\EventosController@postarEvento')->name('addeven');

Route::get('/editarevento', function () {
    return view('pages.psico.editevento');
});

Route::get('/detalhesaluno', function () {
    return view('pages.psico.detalhesaluno');
});

// Admin
Route::get('/Admin', function () {
    return view('pages.admin.homeAdmin');
});

Route::get('/EditarPro', function () {
    return view('pages.admin.editarPro');
});




Route::get('/estatisticas', function () {
    return view('pages.psico.graficos');
});



// Route::get('/testejoao',['as'=>'alunos','uses'=>'App\Http\Controllers\AlunosController@index']);