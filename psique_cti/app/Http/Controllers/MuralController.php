<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;

class MuralController extends Controller
{
     public function selecionando()
    {
   
         $eventos = DB::select("select * from eventos, murais ");
         $artigos = DB::select("select * from publicacoes_recomendacoes, murais");

         return view('pages.mural', compact('eventos','artigos') );
     }
}
