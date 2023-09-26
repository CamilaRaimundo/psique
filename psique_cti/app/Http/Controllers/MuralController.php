<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Publicacao_Recomendacao;

class MuralController extends Controller
{
    public function mostraForm()
        {
            $eventos = Evento::all();
            $artigos = Publicacao_Recomendacao::all();
            return view('pages.mural', compact('eventos', 'artigos'));
        }
}
