<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;



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

// Route::get('/contato', function() {
//     Mail::to('test@email.com')->send(new TestMail());
// });

Route::get('/contato', [ContatoController::class, 'mostraForm'])->name('contato.mostrar');
Route::post('/contato', [ContatoController::class, 'mandaEmail'])->name('contato.enviar');

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