<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
// use App\Http\Controllers\MainController;
use Resources\Views\Pages;

use App\Http\Controllers\Users;
use App\Models\User;

class CadastroController extends Controller
{
    public function mostraForm()
    {
        return view('pages.cadastro');
    }
    public function processaForm(Request $request)
    {
        $nome=$request->input('nome');
        $email=$request->input('email');
            $validatedData = $request->validate([
            'data_nascimento' => 'required|date',
            'opcao_serie' => 'required|in:1,2,3',
            'opcao_curso' => 'required|in:1,2,3,4',
            'ra' => 'required|numeric|digits:7',
        ], [
            'ra.required' => 'O campo RA é obrigatório.',
            'ra.numeric' => 'O RA deve conter apenas dígitos numéricos.',
            'ra.digits' => 'O RA deve ter exatamente 7 dígitos.',
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
        $aluno->ra = $validatedData['ra'];
        $aluno->serie = $series[$validatedData['opcao_serie']];
        $aluno->curso = $cursos[$validatedData['opcao_curso']];
        $aluno->nome = $nome;
        $aluno->email = $email;
  
        $aluno->save();

        $algumacoisa=$aluno->ra;
        $user = new User();

        $user->name =$nome;
        $user->email =$email;
        $user->nivel_de_acesso ='1';
       

        $user->save();

        return view('pages.triagem', compact('algumacoisa') );
    }
}