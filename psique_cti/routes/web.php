<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; //--> login
use App\Http\Controllers\TriagemController; //--> Triagem
use App\Http\Controllers\ArtigosController; //--> Artigos
use App\Http\Controllers\CadastroController; //--> Informações adicionais
use App\Http\Controllers\EventosController; // --> Eventos
use App\Http\Controllers\AdminAdicionarController; // --> Admin
use App\Http\Controllers\MuralController; // --> Mural
use App\Http\Controllers\GraficosController; // --> graficos
use App\Mail\TestMail;


Route::get('/', function () {
    return view('index');
});

// Route::post('/mural', function () {
//     return view('pages.mural');
// });
Route::get('/mural', [MuralController::class, 'selecionando' ])->name('evento.mostrar', 'artigo.ver');


Route::delete('/excluir-evento/{id}', 'EventosController@excluirEvento')->name('excluir-evento');



//Route::post('/excluir-evento/{id}', 'App\Http\Controllers\EventosController@excluir');


//Route::post('/pages/psico/mural/{id_mural}', 'App\Http\Controllers\EventosController@excluir')->name('mural');



Route::get('/contato', [ContatoController::class, 'mostraForm'])->name('contato.mostrar');
Route::post('/contato', [ContatoController::class, 'mandaEmail'])->name('contato.enviar');

//socialite login urls
Route::get('/googleLogin',[MainController::class, 'googleLogin']);
Route::get('/auth/google/callback',[MainController::class, 'googleHandle']);

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

Route::get('/encontros', function () {
    return view('pages.psico.encontros');
});

//  Psico
Route::get('/homepsico', function () {
    return view('pages.psico.home');
});

Route::get('/estatisticas', function () {
    return view('pages.psico.graficos');
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

// Route::post('/editartigo',
//     ['as'  =>'controller.artigo',
//         'uses'=>'App\Http\Controllers\ArtigosController@verificaForm']);

// Route::post('/editartigo',
// ['as'  =>'controller.artigo',
//  'uses'=>'App\Http\Controllers\ArtigosController@editarArtigo']);

Route::get('/adicionaevento', function () {
    return view('pages.psico.addevento');
});

Route::post('/adicionaevento', 'App\Http\Controllers\EventosController@postarEvento')->name('addeven');

Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
});

Route::get('/editarevento/id_mural', 'App\Http\Controllers\EventosController@editarEvento')->name('editeven');

#Route::post('/editarevento', 'App\Http\Controllers\EventosController@editarEvento')->name('editeven');

Route::get('/detalhesaluno', function () {
    return view('pages.psico.detalhesaluno');
});

// Admin
Route::get('/Admin', function () {
    return view('pages.admin.homeAdmin');
});

Route::get('/listaAluno', function () {
    return view('pages.admin.lista_aluno');
});

Route::get('/EditarPro', function () {
    return view('pages.admin.editarPro');
});

Route::get('/AdicionarPro', function () {
    return view('pages.admin.adicionarProfissional');
});

Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@cadastrarProfissional')->name('addpro');
//Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@pegandoDados')->name('addpro');


Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional']);



//Route::post('/estatisticas', 'App\Http\Controllers\GraficosController@pegaEmocoes')->name('pegaEmo');

Route::get('/estatisticas', [GraficosController::class, 'pegaEmocoes'])->name('pegaEmo');

// Route::get('/testejoao',['as'=>'alunos','uses'=>'App\Http\Controllers\AlunosController@index']);
