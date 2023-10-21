<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Historico_aluno;

class TriagemController extends Controller
{
    public function verifica(Request $req)
    {
        $regras = [
            'qtd_pessoas' => 'required|numeric|min:1|max:10', // Substitua 10 e 100 pelos valores do intervalo desejado
            'opcao_acomp' => 'required',
            'opcao_medicamento' => 'required',
            'medicamento' => 'nullable',
            'sentimentos' => 'required', 
            'comentarios' => 'nullable',
        ];
        
                // Mensagens de erro personalizadas (opcional)
                $mensagens = [
                    'qtd_pessoas.required' => 'O campo é obrigatório.',
                    'qtd_pessoas.integer' => 'O campo número deve ser um número inteiro.',
                    'qtd_pessoas.numeric' => 'O campo deve ser um valor numérico.',
                    'qtd_pessoas.min' => 'O valor do campo número deve ser maior ou igual a 1.',
                    'qtd_pessoas.max' => 'O valor do campo número deve ser menor ou igual a 10.',
                ];
        
                // Executar a validação
                $validator = Validator::make($req->all(), $regras, $mensagens);
        
                // Verificar se a validação falhou
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
        
                // Se a validação for bem-sucedida, faça algo aqui
                //$req->input('qtd_pessoas') //contém o valor válido entre o intervalo

                $acompanhamento = [
                    1 => 'true',
                    2 => 'false',
                ];
        
                $medicamentos = [
                    1 => 'true',
                    2 => 'false',
                ];

                $triagem = new Historico_aluno();

                $triagem->qtde_moradores = $req->input('qtd_pessoas');
                $triagem->tempo_sentimentos = $req->input('sentimentos');
                $triagem->queixas = $req->input('comentarios');
                $triagem->acompanhamento = $acompanhamento[$req->input('opcao_acomp')];
                $triagem->medicamentos = $medicamentos[$req->input('opcao_medicamento')];
                $triagem->nome_medicamentos = $req->input('medicamento');
                
                
                
                $triagem->save();
                
                return view('index');
    }

    public function mostraForm() 
    {
        return view('pages.triagem');
    }
}