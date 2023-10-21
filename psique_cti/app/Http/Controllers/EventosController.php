<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Mural;


class EventosController extends Controller
{
    public function postarEvento(Request $request)
    {
        $validatedData = $request->validate([
            'titulo_evento' => 'required|string|max:255', 
            'responsavel_evento' => 'required|regex:/^[A-Za-z\s\-_,.]+$/|max:255',
            'local_evento' => 'required|string|max:255',
            'dataehora_evento' => 'required|date',
            'limite_pessoas_evento' => 'integer|min:0',
            'link_evento' => 'nullable|url',
            'img_ilustrativa' => 'nullable|image|mimes:jpeg,png,jpg', 
            'descricao_evento' => 'required|string',
        ],
        [
            
            'regex' => 'O campo :attribute não pode conter números.',
            'integer' => 'O campo :attribute deve ser um número inteiro.',
            'url' => 'O campo :attribute deve ser uma URL válida.',
            'image' => 'O campo :attribute deve ser uma imagem.',
            'mimes' => 'O campo :attribute deve ser um arquivo de imagem do tipo: :values.',
        ]);

        $evento = new Evento();

        $evento->titulo = $validatedData['titulo_evento'];
        $evento->descricao = $validatedData['descricao_evento'];
        $evento->local_evento = $validatedData['local_evento'];
        $evento->dataehora_evento = $validatedData['dataehora_evento'];
        $evento->responsavel_evento = $validatedData['responsavel_evento'];
        $evento->limite_pessoas_evento = $validatedData['limite_pessoas_evento'];
        $evento->link_evento = $validatedData['link_evento'];

        if ($request->hasFile('img_ilustrativa')) {
            $path = $request->file('img_ilustrativa')->store('event_images');
            $evento->img_ilustrativa = $path;
        }

        $evento->save();

        return view('pages.mural');

       
    }
    
    public function editarEvento(Request $request, $id_mural)
    {
        $validatedData = $request->validate([
            // Definir regras de validação para o formulário de edição
        ]);

        $evento = Evento::where('id', $id)->first();

        // Verificar se o evento foi encontrado
        if (!$evento) {
            return redirect()->route('mural')->with('error', 'Evento não encontrado');
        }

        // Atualizar os campos do evento com os novos dados
        $evento->local_evento = $validatedData['local_evento'];
        $evento->dataehora_evento = $validatedData['dataehora_evento'];
        $evento->responsavel_evento = $validatedData['responsavel_evento'];
        $evento->limite_pessoas_evento = $validatedData['limite_pessoas_evento'];
        $evento->link_evento = $validatedData['link_evento'];

        $evento->save();

        return view('pages.mural');
    }


    public function selecionando()
     {
        //  $eventos = Evento::with('mural')->get(); return view('pages.mural', compact('eventos'));
        $eventos = Evento::all();
        return view('pages.mural', compact('eventos') );
   
     }

     public function excluirEvento($id) {
        // Adicione instruções de depuração
        \Log::info("Excluindo evento com ID: $id");
    
        // Encontre o evento pelo ID
        $evento = Evento::find($id);
    
        // Verifique se o evento foi encontrado
        if (!$evento) {
            return view('pages.mural');
        }
    
        // Exclua o evento
        $evento->delete();
    
        return response()->json(['success' => true]);
    }

   
}
