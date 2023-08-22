<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;



class CadastroController extends Controller
{
    public function processarFormulario(Request $request)
    {
        $validatedData = $request->validate([
            'data_nascimento' => 'required|date',
            'opcao_serie' => 'required|in:1,2,3',
            'opcao_curso' => 'required|in:1,2,3,4',
        ]);

        $cursos = [
            1 => 'Informática A',
            2 => 'Informática B',
            3 => 'Eletrônica',
            4 => 'Mecânica',
        ];

        $series = [
            1 => 'Primeiro',
            2 => 'Segundo',
            3 => 'Terceiro',
        ];

        $aluno = new Aluno();

        $aluno->data_nascimento = $validatedData['data_nascimento'];
        $aluno->serie = $series[$validatedData['opcao_serie']];
        $aluno->curso = $cursos[$validatedData['opcao_curso']];
        $aluno->nome = 'a';
        $aluno->email = 'abc@teste';

        $aluno->save();

        return view('pages.triagem');
        
    }
}
