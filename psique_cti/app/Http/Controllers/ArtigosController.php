<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mural;
use App\Models\Publicacao_Recomendacao;

class ArtigosController extends Controller
{
    //addartigo e editartigo
    public function verificaForm(Request $req)
    {
        dd($req->all());
        // Defina as regras de validação para os campos
        $rules = [
            'titulo_publicacao' => 'required',
            'autor_publicacao' => 'required|alpha',
            'link_publicacao' => 'url',
            'img_ilustrativa' => 'image|mimes:jpeg,jpg,png',
            'descricao_publicacao' => 'required',
        ];
    
        // Defina mensagens de erro personalizadas, se necessário
        $messages = [
            'titulo_publicacao.required' => 'O título da publicação é obrigatório.',
            'autor_publicacao.required' => 'O autor é obrigatório.',
            'link_publicacao.url' => 'O link deve ser uma URL válida.',
            'img_ilustrativa.image' => 'A imagem ilustrativa deve ser uma imagem válida.',
            'img_ilustrativa.mimes' => 'A imagem ilustrativa deve ser um arquivo JPEG, JPG ou PNG.',
            'descricao_publicacao.required' => 'A descrição é obrigatória.',
        ];
    
        // Valide os campos
        $validator = Validator::make($req->all(), $rules, $messages);
    
        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        // }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    
        // Process and save data (if validation passes)
        $artigos1 = new Mural();

        $artigos1->descricao = $req->input('descricao_publicacao');
        $artigos1->titulo = $req->input('titulo_publicacao');
    
        if ($req->hasFile('img_ilustrativa')) {
            $path = $req->file('img_ilustrativa')->store('event_images');
            $artigos1->imagem = $path;
        }

        $artigos1->save();
    

        $artigos2 = new Publicacao_Recomendacao();

        $artigos2->link = $req->input('link_publicacao');
        $artigos2->autor = $req->input('autor_publicacao');
    
        $artigos2->save();
    
        return view('pages.mural');
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
}