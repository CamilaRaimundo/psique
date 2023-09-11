<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Mural;
use Illuminate\Support\Facades\DB;


class EventosController extends Controller
{
    public function postarEvento(Request $request)
    {
        $validatedData = $request->validate([
            'titulo_evento' => 'required|string|max:255', 
            'responsavel_evento' => 'required|max:255',
            'local_evento' => 'required|string|max:255',
            'dataehora_evento' => 'required|date',
            'limite_pessoas_evento' => 'integer|min:0',
            'link_evento' => 'nullable|url',
            'img_ilustrativa' => 'nullable|image|mimes:jpeg,png,jpg', 
            'descricao_evento' => 'required|string',
        ],
        [
            'required' => 'O campo :attribute deve ser preenchido.',
            'integer' => 'O campo :attribute deve ser um número inteiro.',
            'url' => 'O campo :attribute deve ser uma URL válida.',
            'image' => 'O campo :attribute deve ser uma imagem.',
            'mimes' => 'O campo :attribute deve ser um arquivo de imagem do tipo: :values.',
        ]);

        $evento1 = new Mural();

        $evento1->titulo = $validatedData['titulo_evento'];
        $evento1->descricao = $validatedData['descricao_evento'];

        $evento1->save();

        $evento2 = new Evento();

        $evento2->local_evento = $validatedData['local_evento'];
        $evento2->dataehora_evento = $validatedData['dataehora_evento'];
        $evento2->responsavel_evento = $validatedData['responsavel_evento'];
        $evento2->limite_pessoas_evento = $validatedData['limite_pessoas_evento'];
        $evento2->link_evento = $validatedData['link_evento'];
        $evento2->id_mural = $evento1->id;

        if ($request->hasFile('img_ilustrativa')) {
            $path = $request->file('img_ilustrativa')->store('event_images');
            $evento2->img_ilustrativa = $path;
        }

        $evento2->save();

        //return view('pages.mural');
        return redirect()->route("mural");
       
    }
    
     public function editarEvento($id_mural) {
        // repare que ele recebe o id da ROTA
        $linha = Evento::find($id_mural);
        // carrega o registro (realiza um select e um fetch internamente)
        return view('pages.psico.editevento',compact('linha'));
        // manda o registro encontrado para ser editado na visão
    }


    public function atualizarEvento(Request $req, $id_mural)
    {
        $dados = $req->all();

        // if ($req->hasFile('foto')) { // o upload chegou ?
        //     $foto = $req->file('foto'); // pega arquivo de foto
        //     $num = rand(1111,9999); // escolhe numero pra não repetir
        //     $dir = "img/alunos/"; // pasta de imagens
        //     $ex = $foto->guessClientExtension(); // pega extensão, jpg, png ...
        //     $nomeFoto = "foto_".$num.".".$ex; // monta novo nome
        //     $foto->move($dir,$nomeFoto); // move pro lugar correto e novo nome
        //     $dados['foto'] = $dir."/".$nomeFoto; // salva no campo imagem
        // }

        Evento::find($id_mural)->update($dados);
        return redirect()->route('evento.mostrar');
    }

   
}
