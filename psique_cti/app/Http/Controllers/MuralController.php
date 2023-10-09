<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuralController extends Controller
{
    public function selecionando()
    {
   
         $eventos = DB::select("select * from eventos ");
         $artigos = DB::select("select * from publicacoes_recomendacoes");

         return view('pages.mural', compact('eventos','artigos') );
     }
}
