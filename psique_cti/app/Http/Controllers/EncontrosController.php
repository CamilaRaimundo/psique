<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encontro;
use Illuminate\Support\Facades\DB;


class EncontrosController extends Controller
{
    public function mostrar()
    {
        return view ('pages.encontros');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'data' => 'required|date|after_or_equal:2023-01-01',
            'ra_pesquisa' => 'required|numeric',
        ]);
    
        // Cria um novo registro de encontro com os dados do formulário
        Encontro::create([
            'data' => $request->input('data'),
            'aluno' => $request->input('ra_pesquisa'), // Certifique-se de que o nome do campo corresponde ao campo no formulário
            'observacoes' => $request->input('comentario'), // Certifique-se de que o nome do campo corresponde ao campo no formulário
        ]);
    
        // Redirecionar para a página de encontros com uma mensagem de sucesso
        return view ('pages.psico.home');
    
}
}