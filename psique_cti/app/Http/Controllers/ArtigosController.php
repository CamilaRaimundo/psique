<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mural;
use App\Models\Publicacao_Recomendacao;
use Illuminate\Support\Facades\DB;

class ArtigosController extends Controller
{
    public function mostraFormAdicionar()
    {
        return view('pages.psico.addartigo');
    } 

    //addartigo e editartigo
    public function adicionaForm(Request $req)
    {
        $rules = [
            'titulo_publicacao' => 'required',
            'autor_publicacao' => 'required|alpha',
            'link_publicacao' => 'url',
            'img_ilustrativa' => 'image|mimes:jpeg,jpg,png',
            'descricao_publicacao' => 'required',
        ];
    
        $messages = [
            'titulo_publicacao.required' => 'O título da publicação é obrigatório.',
            'autor_publicacao.required' => 'O autor é obrigatório.',
            'link_publicacao.url' => 'O link deve ser uma URL válida.',
            'img_ilustrativa.image' => 'A imagem ilustrativa deve ser uma imagem válida.',
            'img_ilustrativa.mimes' => 'A imagem ilustrativa deve ser um arquivo JPEG, JPG ou PNG.',
            'descricao_publicacao.required' => 'A descrição é obrigatória.',
        ];
        //dd($req->all());
    

        $validator = Validator::make($req->all(), $rules, $messages);
        //dd($req->all());

       // if ($validator->fails()) {
         //   return redirect()->back()->withErrors($validator)->withInput();
        //}

        //dd($req->all()); -- parou
        // Process and save data (if validation passes)
        $artigos = new Publicacao_Recomendacao();


        $artigos->descricao = $req->input('descricao_publicacao');
        $artigos->titulo = $req->input('titulo_publicacao');
    
        if ($req->hasFile('img_ilustrativa')) {
            $path = $req->file('img_ilustrativa')->store('event_images');
            $artigos->imagem = $path;
        }

        $artigos->save();
    

        $artigos2 = new Publicacao_Recomendacao();

        $artigos2->link = $req->input('link_publicacao');
        $artigos2->autor = $req->input('autor_publicacao');
        $artigos2->id_mural = $artigos->id;
    
        $artigos2->save();

        //dd($artigos2);
    
       // return view('pages.mural');
       return redirect()->route('artigo.ver');
    }
    

  
}

    // public function editarArtigo(Request $req, $id_mural)
    // {
    //     dd($id_mural);
    //     $validatedData = $req->validate([
    //         // Definir regras de validação para o formulário de edição
    //     ]);

    //     $artigos = Publicacao_Recomendacao::where('id_mural', $id_mural)->first();

    //     // Verificar se o evento foi encontrado
    //     if (!$artigos) {
    //         return redirect()->route('mural')->with('error', 'Artigo não encontrado');
    //     }

    //     // Atualizar os campos do evento com os novos dados
    //     $artigos->descricao = $req->input('descricao_publicacao');
    //     $artigos->titulo = $req->input('titulo_publicacao');
    //     $artigos->link = $req->input('link_publicacao');
    //     $artigos->autor = $req->input('autor_publicacao');
    //     $artigos->save();

    //     return view('pages.mural');
    // }
