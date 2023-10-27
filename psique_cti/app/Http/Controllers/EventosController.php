<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Profissional;
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

        dd($validatedData);

        $evento = new Evento();

        $evento->titulo = $validatedData['titulo_evento'];
        $evento->descricao = $validatedData['descricao_evento'];
        $evento->local_evento = $validatedData['local_evento'];
        $evento->dataehora_evento = $validatedData['dataehora_evento'];
        $evento->responsavel_evento = $validatedData['responsavel_evento'];
        $evento->limite_pessoas_evento = $validatedData['limite_pessoas_evento'];
        $evento->link_evento = $validatedData['link_evento'];

// ema
        $profissional = Auth::user();
        if ($profissional) {
            $email = $profissional->email;
            $result = DB::table('profissionais')
                        ->where('email', $email)
                        ->select('cpf')
                        ->first(); 
            if ($result) {
                $cpf = $result->cpf;    
            }
        }
        $evento->profissional = $cpf;
// ema
        
        if ($request->hasFile('img_ilustrativa')) {
            $path = $request->file('img_ilustrativa')->store('event_images');
            $evento->imagem= $path;  //ema
        }

        $evento->save();

        return redirect()->route('mural.mostrar');
    }
    
    public function editarEvento(Request $request)
    {
        
        // $validatedData = $request->validate([
        //     // Definir regras de validação para o formulário de edição
        // ]);

        $evento = Evento::where('id', $request->id)->first();

        // Atualizar os campos do evento com os novos dados
        $evento->titulo = $request->titulo;
        $evento->descricao= $request->descricao;
        $evento->local_evento = $request->local_evento;
        $evento->dataehora_evento = $request->dataehora_evento;
        $evento->limite_pessoas_evento = $request->limite_pessoas_evento;
        $evento->link_evento = $request->link_evento;
        $evento->responsavel_evento = $request->responsavel_evento;

        $evento->save();

        return redirect()->route('mural.mostrar');
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
