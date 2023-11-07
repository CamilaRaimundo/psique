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
use App\Http\Controllers\ContatoController; //--> Contato
use App\Http\Controllers\LogOutController; //--> Logout
use App\Http\Controllers\EmocoesController; //--> Emoções
use App\Http\Controllers\AdminAdicionarController; //--> Admin
use App\Http\Controllers\MuralController; //--> Mural
use App\Http\Controllers\GraficosController; //--> estatísticas
use App\Http\Controllers\EncontrosController; //--> estatísticas
use App\Mail\TestMail;


Route::get('/', [MainController::class, 'index'])->name('home');

// Mural e publicações
    Route::get('/mural', [MuralController::class, 'mostraForm'])->name('mural.mostrar');

    Route::get('/adicionartigo', [ArtigosController::class, 'mostraFormAdicionar'])->name('artigos_add.mostrar');

    Route::post('/adicionartigo', [ArtigosController::class, 'adicionaForm'])->name('artigo.adicionar');

    Route::get('/editartigo',[MainController::class, 'indexArtigoEdit'])->name('artigos_edit.mostrar');

    // Route::get('/editartigo', function () { return view('pages.psico.editartigo'); })->name('artigos_edit.mostrar');

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
    Route::get('/homepsico',[MainController::class, 'psicoIndex'])->name('home_psico');

// Admin

Route::get('/Admin',[MainController::class, 'adminIndex'])->name('home_admin');
Route::get('/EditarPro',[MainController::class, 'indexEditPro']);
Route::get('/AdicionarPro',[MainController::class, 'indexAddPro']);


// Route::middleware(['verificarNivelAcesso'])->group(function () {
//     Route::get('/Admin', function () { return view('pages.admin.homeAdmin');})->name('home_admin');

    Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@cadastrarProfissional')->name('addpro');
    Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@pegandoDados')->name('addpro');
   Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional']);
     Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('Admin');
// });



Route::get('/estatisticas',[MainController::class, 'estatisticasIndex'])->name('estatistica.mostrar');

Route::get('/encontros', [MainController::class, 'indexEncontros'])->name('encontros.mostrar');
Route::POST('/encontros', [EncontrosController::class, 'store'])->name('encontros.store');


//Route::post('/inativar-ativar-profissional/{cpf}', 'AdminAdicionarController@inativarAtivarProfissional');

Route::get('/adicionartigo', [MainController::class, 'indexArtigo'])->name('artigos_adicionar.mostrar');
Route::post('/adicionartigo',[ArtigosController::class,'adicionaForm'])->name('artigos_adicionar.processar');

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
Route::delete('/excluir-aluno/{ra}/{email}', [AdminAdicionarController::class, 'excluirAluno'])->name('excluirAluno');

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
   
// Route::get('/listaAluno', [AdminAdicionarController::class, 'pegandoDadosAlunos'])->name('listaAluno');
