<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/homepsico', function () {
    return view('pages.psico.home');
});