<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

//socialite login urls
Route::get('/googleLogin',[MainController::class, 'googleLogin']);
Route::get('/auth/google/callback',[MainController::class, 'googleHandle']);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/testejoao',['as'=>'alunos','uses'=>'App\Http\Controllers\AlunosController@index']);


// Route::post('/login', [ GoogleLoginController::class, 'handleGoogleCallback']);

Route::get('/index', function () {
    return view('index');
});

Route::get('/frases', function () {
    return view('frases');
});

Route::get('/autenticacao', function () {
    return view('autenticacao');
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

Route::get('/adicionartigo', function () {
    return view('pages.psico.addartigo');
});

Route::get('/adicionaevento', function () {
    return view('pages.psico.addevento');
});

Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
});

Route::get('/editarevento', function () {
    return view('pages.psico.editevento');
});

Route::get('/detalhesaluno', function () {
    return view('pages.psico.detalhesaluno');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
