<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; //--> login
use App\Http\Controllers\TriagemController; //--> Triagem
use App\Http\Controllers\ArtigosController; //--> Artigos
use App\Http\Controllers\CadastroController; //--> Informações adicionais
use App\Http\Controllers\EventosController; // --> Eventos
use App\Mail\TestMail;


Route::get('/', [MainController::class, 'index'])->name('home');


Route::get('/mural', [EventosController::class, 'mostraForm'])->name('mural.mostrar');


Route::get('/contato', [ContatoController::class, 'mostraForm'])->name('contato.mostrar');
Route::post('/contato', [ContatoController::class, 'mandaEmail'])->name('contato.enviar');

//socialite login urls
Route::get('/googleLogin',[MainController::class, 'googleLogin']);
Route::get('/auth/google/callback',[MainController::class, 'googleHandle']);

Route::get('/login', function () {
    return view('pages.login');
})->name('login.mostrar');

Route::get('/cadastro', 'App\Http\Controllers\CadastroController@processarFormulario')->name('cadastro.mostrar');
Route::post('/cadastro', 'App\Http\Controllers\CadastroController@processarFormulario')->name('cadastro.processar');

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
})->name('home_psico');

Route::get('/adicionartigo', function () {
    return view('pages.psico.addartigo');
   })->name('artigos.adicionar');

Route::post('/adicionartigo',
['as'  =>'controller.artigo',
 'uses'=>'App\Http\Controllers\ArtigosController@verificaForm']);


Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
})->name('artigos.editar');


Route::get('/adicionaevento', function () {
    return view('pages.psico.addevento');
});

Route::post('/adicionaevento', 'App\Http\Controllers\EventosController@postarEvento')->name('eventos.adicionar');

Route::get('/editartigo', function () {
    return view('pages.psico.editartigo');
});

Route::get('/editarevento', function () {
    return view('pages.psico.editevento');
});

Route::post('/editarevento', 'App\Http\Controllers\EventosController@editarEvento')->name('eventos.editar');

Route::get('/detalhesaluno', function () {
    return view('pages.psico.detalhesaluno');
});

// Admin
Route::get('/Admin', function () {
    return view('pages.admin.homeAdmin');
})->name('home_admin');

Route::get('/EditarPro', function () {
    return view('pages.admin.editarPro');
});



Route::get('/AdicionarPro', function () {
    return view('pages.admin.adicionarProfissional');
});

Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@cadastrarProfissional')->name('addpro');
Route::post('/AdicionarPro', 'App\Http\Controllers\AdminAdicionarController@pegandoDados')->name('addpro');

Route::post('/inativar-ativar-profissional/{cpf}', [AdminAdicionarController::class, 'inativarAtivarProfissional']);



Route::get('/Admin', [AdminAdicionarController::class, 'pegandoDados'])->name('Admin');

Route::get('/estatisticas', function () {
    return view('pages.psico.graficos');
})->name('estatistica.mostrar');



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