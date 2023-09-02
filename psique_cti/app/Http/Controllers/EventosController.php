<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        $evento = new Mural();

        $evento->titulo_evento = $validatedData['titulo_evento'];
        $evento->responsavel_evento = $validatedData['responsavel_evento'];
        $evento->local_evento = $validatedData['local_evento'];
        $evento->dataehora_evento = $validatedData['dataehora_evento'];
        $evento->limite_pessoas_evento = $validatedData['limite_pessoas_evento'];
        $evento->link_evento = $validatedData['link_evento'];
        $evento->descricao_evento = $validatedData['descricao_evento'];

        if ($request->hasFile('img_ilustrativa')) {
            $path = $request->file('img_ilustrativa')->store('event_images');
            $evento->img_ilustrativa = $path;
        }

        $evento->save();

        return view('pages.mural');
       
    }
}
