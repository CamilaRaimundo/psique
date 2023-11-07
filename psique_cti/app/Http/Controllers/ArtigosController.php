<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publicacao_Recomendacao;
use Illuminate\Support\Facades\DB;

class ArtigosController extends Controller
{
    //addartigo e editartigo
    public function adicionaForm(Request $req)
    {
        //dd($req->all());
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
        //dd($req->all());
    
        // Valide os campos
        $validator = Validator::make($req->all(), $rules, $messages);
        //dd($req->all());

       // if ($validator->fails()) {
         //   return redirect()->back()->withErrors($validator)->withInput();
        //}

        //dd($req->all()); -- parou
        // Process and save data (if validation passes)
        $artigo = new Publicacao_Recomendacao();


        $artigo->descricao = $req->input('descricao_publicacao');
        $artigo->titulo = $req->input('titulo_publicacao');
    
        if ($req->hasFile('img_ilustrativa')) {
            $path = $req->file('img_ilustrativa')->store('artigo_images');
            $artigo->imagem = $path;
        }

        $artigo->link = $req->input('link_publicacao');
        $artigo->autor = $req->input('autor_publicacao');
       
        $artigo->save();

       return redirect()->route('mural.mostrar');
    }
    
    public function editarArtigo(Request $request)
    {
        // $validatedData = $request->validate([
        //     // Definir regras de validação para o formulário de edição
        // ]);

        $artigo = Publicacao_Recomendacao::where('id', $request->id)->first();

        // Atualizar os campos do evento com os novos dados
        $artigo->descricao = $request->descricao;
        $artigo->titulo = $request->titulo;
        $artigo->link = $request->link;
        $artigo->autor = $request->autor;

        $artigo->save();

        return redirect()->route('mural.mostrar');
    }


    public function selecionandoArt()
     {
        //  $eventos = Evento::with('mural')->get(); return view('pages.mural', compact('eventos'));
        $artigo = Publicacao_Recomendacao::all();
        return view('pages.mural', compact('artigo') );
   
     }
}

   
