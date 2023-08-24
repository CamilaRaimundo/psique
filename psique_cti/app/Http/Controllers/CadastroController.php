<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function processarFormulario(Request $request)
    {
        $validatedData = $request->validate([
            'data_nascimento' => 'required|date',
            'opcao_serie' => 'required|in:1,2,3',
            'opcao_curso' => 'required|in:1,2,3,4',
        ]);

        return view('pages.triagem');
    }
}
