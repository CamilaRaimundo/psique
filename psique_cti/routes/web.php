<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; //--> login
use App\Http\Controllers\TriagemController; //--> Triagem
use App\Http\Controllers\ArtigosController; //--> Artigos
use App\Http\Controllers\CadastroController; //--> Informações adicionais
use App\Http\Controllers\EventosController; // --> Eventos
use App\Http\Controllers\ContatoController; //--> Contato
use App\Http\Controllers\LogOutController; //--> Logout
use App\Http\Controllers\EmocoesController; //--> Emoções
use App\Http\Controllers\AdminAdicionarController; //--> Admin
use App\Http\Controllers\MuralController; //--> Mural
use App\Mail\TestMail;

Route::get('/', [MainController::class,'index'])->name('home');

// LOGIN
//socialite login urls
Route::get('/googleLogin',[MainController::class, 'googleLogin'])->name('login.google.mostrar');
Route::get('/auth/google/callback',[MainController::class, 'googleHandle'])->name('login.google.handle');

Route::get('/login', [MainController::class, 'login'])->name('login.mostrar');

Route::get('/logout', [LogOutController::class, 'logout'])->name('logout');


// CONTATO
Route::get('/contato', [ContatoController::class, 'mostraForm'])->name('contato.mostrar');
Route::post('/contato', [ContatoController::class, 'mandaEmail'])->name('contato.enviar');


// CADASTRO
Route::get('/cadastro', [CadastroController::class,'mostraForm'])->name('cadastro.mostrar');
Route::post('/cadastro', [CadastroController::class,'processaForm'])->name('cadastro.processar');


// TRIAGEM
Route::get('/triagem', [CadastroController::class,'mostraForm'])->name('triagem.mostrar');
Route::post('/triagem',[TriagemController::class,'verifica'])->name('triagem.processar');


// EMOÇÕES
Route::get('/emocoes', [EmocoesController::class,'mostraEmocoes'])->name('emocoes.mostrar');
Route::post('/emocoes', [EmocoesController::class,'registrarEmocao'])->name('emocoes.processar');


//  PSICÓLOGA
Route::get('/homepsico', [MainController::class,'psicoIndex'])->name('home_psico');

Route::get('/detalhesaluno', [MainController::class,'detalhesIndex'])->name('detalhes_aluno.mostrar');

Route::get('/estatisticas', [MainController::class,'estatisticasIndex'])->name('estatisticas.mostrar');

// MURAL
Route::get('/mural', [MuralController::class, 'mostraForm'])->name('mural.mostrar');

Route::get('/adicionartigo', [MainController::class, 'indexArtigo'])->name('artigos_adicionar.mostrar');
Route::post('/adicionartigo',[ArtigosController::class,'verificaForm'])->name('artigos_adicionar.processar');

Route::get('/adicionarevento', [MainController::class, 'indexEvento'])->name('eventos_adicionar.mostrar');
Route::post('/adicionaevento', [EventosController::class,'postarEvento'])->name('eventos_add.processar');

Route::get('/editartigo', [MainController::class,'indexArtigoEdit'])->name('artigos_editar.mostrar');
Route::post('/editartigo', [ArtigosController::class,'editarArtigo'])->name('artigos_editar.processar');

Route::get('/editarevento', [MainController::class,'indexEventoEdit'])->name('eventos_editar.postar');
Route::post('/editarevento', [EventosController::class,'editarEvento'])->name('eventos_editar.processar');

Route::get('/excluir-evento/{id}', 'App\Http\Controllers\EventosController@excluirEvento')->name('eventos.excluir');
Route::get('/excluir-artigo/{id}', 'App\Http\Controllers\ArtigosController@excluirArtigo')->name('artigos.excluir');


// ADMINISTRADOR
Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('home_admin');

Route::get('/listarAlunos', [AdminAdicionarController::class, 'pegandoDadosAlunos'])->name('listarAlunos.mostrar');

Route::get('/EditarPro', [MainController::class, 'indexEditPro'])->name('admin_editar.mostrar');
Route::post('/EditarPro', [AdminAdicionarController::class, 'editarProfissional'])->name('admin_editar.processar');

Route::get('/AdicionarPro', [MainController::class, 'indexAddPro'])->name('admin_adicionar.mostrar');
Route::post('/AdicionarPro', [AdminAdicionarController::class, 'cadastrarProfissional'])->name('admin_adicionar.processar');

Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional'])->name('admin.remover');

// Route::get('/AdicionarPro', function () {
//     return view('pages.admin.adicionarProfissional');
// })->name('admin_adicionar.mostrar');

// Route::get('/Admin', [MainController::class,'AdminIndex'])->name('home_admin');

// Route::get('/editartigo', function () {
//     return view('pages.psico.editartigo');
// })->name('artigos_editar.mostrar');

// Route::get('/adicionaevento', function () {
//     return view('pages.psico.addevento');
// })->name('eventos_adicionar.mostrar');

// Route::get('/editartigo', function () {
//     return view('pages.psico.editartigo');
// })->name('artigos_editar.mostrar');

// Route::get('/editarevento', function () {
//     return view('pages.psico.editevento');
// })->name('eventos_editar.postar');

// Route::get('/estatisticas', function () {
//     return view('pages.psico.graficos');
// })->name('estatisticas.mostrar');

// Route::get('/detalhesaluno', function () {
//     return view('pages.psico.detalhesaluno');
// })->name('detalhes_aluno.mostrar');

// Route::get('/EditarPro', function () {
//     return view('pages.admin.editarPro');
// })->name('admin_editar.mostrar');
// Route::get('/editartigo', [MainController::class,'indexArtigoEdit'])->name('artigos_editar.mostrar');
// Route::post('/editartigo', [ArtigosController::class,'editarArtigo'])->name('artigos_editar.processar');