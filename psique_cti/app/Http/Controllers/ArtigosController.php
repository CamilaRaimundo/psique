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
        $artigos2->id_mural = $artigos1->id;
    
        $artigos2->save();

        //dd($artigos2);
    
       // return view('pages.mural');
       return redirect()->route('artigo.ver');
    }
    
    public function editarArtigo(Request $request, $id_mural)
    {
        $validatedData = $request->validate([
            // Definir regras de validação para o formulário de edição
        ]);

        $artigo = Publicacao_Recomendacao::where('id_mural', $id_mural)->first();

        // Verificar se o evento foi encontrado
        if (!$artigo) {
            return redirect()->route('artigo.ver')->with('error', 'Artigo não encontrado');
        }

        // Atualizar os campos do evento com os novos dados
        $artigo->descricao = $req->input('descricao_publicacao');
        $artigo->titulo = $req->input('titulo_publicacao');
        $artigo->link = $req->input('link_publicacao');
        $artigo->autor = $req->input('autor_publicacao');
       

        $artigo->save();

        return view('pages.mural');
    }


    public function selecionandoArt()
     {
        //  $eventos = Evento::with('mural')->get(); return view('pages.mural', compact('eventos'));
        $artigo = Publicacao_Recomendacao::all();
        return view('pages.mural', compact('artigos') );
   
     }

     public function excluirArtigo($id) {
        // Adicione instruções de depuração
        \Log::info("Excluindo artigo com ID: $id");
    
        // Encontre o evento pelo ID
        $artigo = Publicacao_Recomendacao::find($id);
    
        // Verifique se o evento foi encontrado
        if (!$artigo) {
            return redirect()->route('artigo.ver');
        }
    
        // Exclua o evento
        $artigo->delete();
    
        return response()->json(['success' => true]);
    }
    
}

   
