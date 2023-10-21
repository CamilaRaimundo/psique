<?php

use App\Http\Controllers\ContatoController; //--> contato
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; //--> login
use App\Http\Controllers\TriagemController; //--> Triagem
use App\Http\Controllers\ArtigosController; //--> Artigos
use App\Http\Controllers\CadastroController; //--> Informações adicionais
use App\Http\Controllers\EventosController; // --> Eventos
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\EmocoesController;
use App\Mail\TestMail;


Route::get('/', [MainController::class,'index'])->name('home');

Route::get('/mural', [EventosController::class, 'selecionando'])->name('mural.mostrar');

    Route::get('/adicionartigo', [ArtigosController::class, 'mostraFormAdicionar'])->name('artigos_add.mostrar');

    Route::post('/adicionartigo', [ArtigosController::class, 'adicionaForm'])->name('artigo.adicionar');

//socialite login urls
Route::get('/googleLogin',[MainController::class, 'googleLogin'])->name('login.google.mostrar');
Route::get('/auth/google/callback',[MainController::class, 'googleHandle'])->name('login.google.handle');

Route::get('/login', [MainController::class, 'login'])->name('login.mostrar');

    Route::post('/adicionaevento', [EventosController::class, 'postarEvento'])->name('eventos.postar');

Route::get('/cadastro', [CadastroController::class,'mostraForm'])->name('cadastro.mostrar');

Route::post('/cadastro', [CadastroController::class,'processaForm'])->name('cadastro.processar');

Route::get('/triagem', [CadastroController::class,'mostraForm'])->name('triagem.mostrar');

Route::post('/triagem',[TriagemController::class,'verifica'])->name('triagem.processar');

Route::get('/emocoes', [EmocoesController::class,'mostraEmocoes'])->name('emocoes.mostrar');

Route::post('/emocoes', [EmocoesController::class,'registrarEmocao'])->name('emocoes.processar');

//  Psico
Route::get('/homepsico', [MainController::class,'adminIndex'])->name('home_admin');

Route::get('/adicionartigo', [ArtigosController::class, 'index'])->name('artigos_adicionar.mostrar');

Route::post('/adicionartigo',[ArtigosController::class,'verificaForm'])->name('artigos_adicionar.processar');

Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
})->name('artigos_editar.mostrar');

Route::get('/adicionaevento', function () {
    return view('pages.psico.addevento');
})->name('eventos_adicionar.mostrar');

Route::post('/adicionaevento', [EventosController::class,'postarEvento'])->name('eventos_add.processar');

Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
})->name('artigos_editar.mostrar');

Route::get('/editarevento', function () {
    return view('pages.psico.editevento');
})->name('eventos_editar.postar');

Route::post('/editarevento', [EventosController::class,'editarEvento'])->name('eventos_editar_processar');

Route::get('/detalhesaluno', function () {
    return view('pages.psico.detalhesaluno');
})->name('detalhes_aluno.mostrar');

// Admin
Route::get('/Admin', function () {
    return view('pages.admin.homeAdmin');
})->name('home_admin');

Route::get('/EditarPro', function () {
    return view('pages.admin.editarPro');
})->name('admin_editar.mostrar');

Route::get('/AdicionarPro', function () {
    return view('pages.admin.adicionarProfissional');
})->name('admin_adicionar.mostrar');

Route::post('/AdicionarPro', [AdminAdicionarController::class, 'cadastrarProfissional'])->name('admin_adicionar.processar');

Route::post('/AdicionarPro', [AdminAdicionarController::class, 'pegandoDados'])->name('admin_adicionar_lista.mostrar');

Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional'])->name('admin.remover');

Route::get('/estatisticas', function () {
    return view('pages.psico.graficos');
})->name('estatisticas.mostrar');
