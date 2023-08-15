<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\TriagemController;
use app\Http\Controllers\ArtigosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testejoao',['as'=>'alunos','uses'=>'App\Http\Controllers\AlunosController@index']);

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

Route::get('/triagem', function () {
    return view('pages.triagem');
});

Route::post('/triagem',
['as'  =>'controller.triagem',
 'uses'=>'App\Http\Controllers\TriagemController@verifica']);

 //Route::post('/triagem',
//['as'  =>'controller.triagem',
 //'uses'=>'App\Http\Controllers\TriagemController@verificaMed']);

Route::get('/homepsico', function () {
    return view('pages.psico.home');
});

Route::get('/adicionartigo', function () {
    return view('pages.psico.addartigo');
   });

Route::post('/adicionartigo',
['as'  =>'controller.artigo',
 'uses'=>'App\Http\Controllers\ArtigosController@verificaForm']);


Route::get('/adicionaevento', function () {
    return view('pages.psico.addevento');
});

Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
});

Route::post('/editartigo',
['as'  =>'controller.artigo',
 'uses'=>'App\Http\Controllers\ArtigosController@verificaForm']);

Route::get('/editarevento', function () {
    return view('pages.psico.editevento');
});

Route::get('/detalhesaluno', function () {
    return view('pages.psico.detalhesaluno');
});