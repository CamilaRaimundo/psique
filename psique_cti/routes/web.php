<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriagemController; //--> Triagem
use App\Http\Controllers\ArtigosController; //--> Artigos
use App\Http\Controllers\CadastroController; //--> Informações adicionais
use App\Http\Controllers\EventosController; // --> Eventos
use App\Http\Controllers\AdminAdicionarController; // --> Admin add Pro
use App\Mail\TestMail;


Route::get('/', function () {
    return view('index');
});

// Route::get('/mural', function () {
//     return view('pages.mural');
// });

Route::get('/mural', [EventosController::class, 'selecionando'])->name('evento.mostrar');

// Route::get('/Admin', function () {
//     return view('pages.admin.homeAdmin');
// });

// Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('Admin');


Route::get('/contato', [ContatoController::class, 'mostraForm'])->name('contato.mostrar');
Route::post('/contato', [ContatoController::class, 'mandaEmail'])->name('contato.enviar');

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

Route::post('/emocoes', 'App\Http\Controllers\EmocoesController@registrarEmocao')->name('cademocao');

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

Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
});

// Route::get('/editarevento', function () {
//     return view('pages.psico.editevento');
// });

Route::get('/pages/psico/editevento/{id_mural}', 'App\Http\Controllers\EventosController@editarEvento')->name('editeven');

Route::put('/pages/psico/editevento/{id_mural}', 'App\Http\Controllers\EventosController@atualizarEvento')->name('atualizaeven');

Route::get('/detalhesaluno', function () {
    return view('pages.psico.detalhesaluno');
});

// Admin
Route::get('/Admin', function () {
    return view('pages.admin.homeAdmin');
});

Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('Admin');

Route::get('/EditarPro', function () {
    return view('pages.admin.editarPro');
});

Route::get('/AdicionarPro', function () {
    return view('pages.admin.adicionarProfissional');
});

Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@cadastrarProfissional')->name('addpro');

Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional']);


Route::get('/estatisticas', function () {
    return view('pages.psico.graficos');
});

