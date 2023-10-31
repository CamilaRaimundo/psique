<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; //--> login
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\MuralController;
use App\Http\Controllers\TriagemController; //--> Triagem
use App\Http\Controllers\ArtigosController; //--> Artigos
use App\Http\Controllers\CadastroController; //--> Informações adicionais
use App\Http\Controllers\EventosController; // --> Eventos
use App\Mail\TestMail;


Route::get('/', [MainController::class, 'index'])->name('home');

// Mural e publicações
    Route::get('/mural', [MuralController::class, 'mostraForm'])->name('mural.mostrar');

    Route::get('/adicionartigo', [ArtigosController::class, 'mostraFormAdicionar'])->name('artigos_add.mostrar');

    Route::post('/adicionartigo', [ArtigosController::class, 'adicionaForm'])->name('artigo.adicionar');

    Route::get('/editartigo', function () { return view('pages.psico.editartigo'); })->name('artigos_edit.mostrar');

    Route::get('/adicionaevento', [EventosController::class, 'mostraFormAdicionar'])->name('eventos_add.mostrar');

    Route::post('/adicionaevento', [EventosController::class, 'postarEvento'])->name('eventos.postar');

    Route::get('/editarevento', [EventosController::class, 'mostraFormEditar'])->name('eventos_edit.mostrar');

    Route::post('/editarevento', [EventosController::class, 'editarEvento'])->name('eventos.editar');

    Route::get('/excluirevento/{id}', [EventosController::class, 'excluirEvento'])->name('eventos.excluir');
    Route::get('/excluirartigo/{id}', [ArtigosController::class, 'excluirArtigo'])->name('artigos.excluir');

    Route::middleware(['auth'])->group(function () {
        Route::get('/contato', [ContatoController::class, 'mostraForm'])->name('contato.mostrar');
        Route::post('/contato', [ContatoController::class, 'mandaEmail'])->name('contato.enviar');
    });


    Route::get('/login', function () {return view('pages.login');})->name('login.mostrar');
    Route::get('/logout', [LogOutController::class, 'logout']);

    //socialite login urls
    Route::get('/googleLogin',[MainController::class, 'googleLogin']);
    Route::get('/auth/google/callback',[MainController::class, 'googleHandle']);

    Route::get('/cadastro', [CadastroController::class, 'mostraForm'])->name('cadastro.mostrar');
    Route::post('/cadastro', [CadastroController::class, 'processaForm'])->name('cadastro.processar');
    
    // Route::post('/cadastro', 'App\Http\Controllers\CadastroController@processarFormulario')->name('cad');

Route::get('/triagem', function () {return view('pages.triagem');});

Route::post('/triagem', ['as'  =>'controller.triagem', 'uses'=>'App\Http\Controllers\TriagemController@verifica'])->name('controller.triagem');

Route::get('/emocoes', function () { return view('pages.emocoes'); });

Route::post('/emocoes', 'App\Http\Controllers\EmocoesController@registrarEmocao')->name('cademocao');

//  Psico
Route::get('/homepsico', function () { return view('pages.psico.home'); })->name('home_psico');

Route::get('/detalhesaluno', function () { return view('pages.psico.detalhesaluno'); });

// Admin
Route::middleware([''])->group(function () {
Route::get('/Admin', function () { return view('pages.admin.homeAdmin');})->name('home_admin');

Route::get('/EditarPro', function () { return view('pages.admin.editarPro');});



Route::get('/AdicionarPro', function () { return view('pages.admin.adicionarProfissional');});

Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@cadastrarProfissional')->name('addpro');
Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@pegandoDados')->name('addpro');

Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional']);



Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('Admin');
});

Route::get('/estatisticas', function () { return view('pages.psico.graficos');})->name('estatistica.mostrar');



// Route::get('/testejoao',['as'=>'alunos','uses'=>'App\Http\Controllers\AlunosController@index']);

// Route::post('/editartigo',
//     ['as'  =>'controller.artigo',
//         'uses'=>'App\Http\Controllers\ArtigosController@verificaForm']);

// Route::post('/editartigo',
// ['as'  =>'controller.artigo',
//  'uses'=>'App\Http\Controllers\ArtigosController@editarArtigo']);

// Route::get('/mural', function () {
//     return view('pages.mural');
// });

//Route::post('/inativar-ativar-profissional/{cpf}', 'AdminAdicionarController@inativarAtivarProfissional');

