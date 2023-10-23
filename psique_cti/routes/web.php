<?php

use App\Http\Controllers\ContatoController; //--> contato
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; //--> login
use App\Http\Controllers\TriagemController; //--> Triagem
use App\Http\Controllers\ArtigosController; //--> Artigos
use App\Http\Controllers\CadastroController; //--> Informações adicionais
use App\Http\Controllers\EventosController; // --> Eventos
use App\Http\Controllers\AdminAdicionarController; // --> Admin
use App\Http\Controllers\MuralController; // --> Mural
use App\Http\Controllers\GraficosController; // --> graficos
use App\Http\Controllers\EncontrosController; // --> Encontros
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

    Route::get('/contato', [ContatoController::class, 'mostraForm'])->name('contato.mostrar');
    Route::post('/contato', [ContatoController::class, 'mandaEmail'])->name('contato.enviar');

    Route::get('/login', function () {return view('pages.login');})->name('login.mostrar');

    //socialite login urls
    Route::get('/googleLogin',[MainController::class, 'googleLogin']);
    Route::get('/auth/google/callback',[MainController::class, 'googleHandle']);

    Route::get('/cadastro', [CadastroController::class, 'mostraForm'])->name('cadastro.mostrar');
    Route::post('/cadastro', [CadastroController::class, 'processaForm'])->name('cadastro.processar');
    
Route::get('/triagem', function () {return view('pages.triagem');})->name('triagem.mostrar');
Route::post('/triagem', [TriagemController::class, 'verifica'])->name('triagem.processa');


Route::get('/emocoes', function () { return view('pages.emocoes'); });

Route::post('/emocoes', 'App\Http\Controllers\EmocoesController@registrarEmocao')->name('cademocao');

//  Psico
Route::get('/homepsico', function () { return view('pages.psico.home'); })->name('home_psico');

Route::get('/estatisticas', [GraficosController::class, 'pegaEmocoes'])->name('pegaEmo');


Route::get('/encontros', [EncontrosController::class, 'mostrar'])->name('encontros.mostrar');

Route::POST('/encontros', [EncontrosController::class, 'store'])->name('encontros.store');


Route::get('/detalhesaluno', function () { return view('pages.psico.detalhesaluno'); });

// Admin
Route::get('/Admin', function () { return view('pages.admin.homeAdmin');})->name('home_admin');

Route::get('/EditarPro', function () { return view('pages.admin.editarPro');});



Route::get('/AdicionarPro', function () { return view('pages.admin.adicionarProfissional');});

Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@cadastrarProfissional')->name('addpro');
Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@pegandoDados')->name('addpro');

Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional']);

Route::get('/Admin', function () {
    return view('pages.admin.homeAdmin');
});

Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('Admin');

Route::get('/estatisticas', function () { return view('pages.psico.graficos');})->name('estatistica.mostrar');

Route::get('/estatisticas', [GraficosController::class, 'pegaEmocoes'])->name('pegaEmo');

Route::get('/listaAluno', [AdminAdicionarController::class, 'pegandoDadosAlunos'])->name('listaAluno');
Route::delete('/excluir-aluno/{ra}/{email}', [AdminAdicionarController::class, 'excluirAluno'])->name('excluirAluno');



// Route::get('/listaAluno', function () {
//     return view('pages.admin.lista_aluno');
// });

Route::get('/EditarPro', function () {
    return view('pages.admin.editarPro');
});

Route::get('/AdicionarPro', function () {
    return view('pages.admin.adicionarProfissional');
});

Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@cadastrarProfissional')->name('addpro');
//Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@pegandoDados')->name('addpro');


Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional']);

//Route::post('/inativar-ativar-profissional/{cpf}', 'AdminAdicionarController@inativarAtivarProfissional');

Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('Admin');


//Route::post('/estatisticas', 'App\Http\Controllers\GraficosController@pegaEmocoes')->name('pegaEmo');


// Route::get('/testejoao',['as'=>'alunos','uses'=>'App\Http\Controllers\AlunosController@index']);
// Route::get('/encontros', function () {
//     return view('pages.psico.encontros');
// });
