<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TriagemController extends Controller
{
    public function verifica(Request $req)
    {
        $regras = [
            'qtd_pessoas' => 'required|numeric|min:1|max:10', // Substitua 10 e 100 pelos valores do intervalo desejado
                ];
        
                // Mensagens de erro personalizadas (opcional)
                $mensagens = [
                    'numero.required' => 'O campo é obrigatório.',
                    'numero.integer' => 'O campo número deve ser um número inteiro.',
                    'numero.numeric' => 'O campo deve ser um valor numérico.',
                    'numero.min' => 'O valor do campo número deve ser maior ou igual a 1.',
                    'numero.max' => 'O valor do campo número deve ser menor ou igual a 10.',
                ];
        
                // Executar a validação
                $validator = Validator::make($request->all(), $regras, $mensagens);
        
                // Verificar se a validação falhou
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
        
                // Se a validação for bem-sucedida, faça algo aqui
                // Por exemplo, $request->input('numero') contém o valor válido entre o intervalo
        
                return redirect()->back()->with('success', ' válido!');
            }

      
        public function validarMed(Request $req)
        {
            // Defina as regras de validação
            $regras = [
                'opcao_medicamento' => 'required|in:1-sim,2-nao',
                'medicamento' => 'required_if:opcao_medicamento,1-sim',
            ];
        
            // Mensagens de erro personalizadas (opcional)
            $mensagens = [
                'opcao_medicamento.required' => 'A resposta é obrigatória.',
                'opcao_medicamento.in' => 'A resposta selecionada é inválida.',
                'medicamento.required_if' => 'O campo medicamento é obrigatório quando a resposta for "Sim".',
            ];
        
            // Executar a validação
            $validator = Validator::make($request->all(), $regras, $mensagens);
        
            // Verificar se a validação falhou
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            // Se a validação for bem-sucedida, faça algo aqui
        
            return redirect()->back()->with('success', 'Campos validados com sucesso!');
        }
    }