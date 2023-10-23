<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno_Mood;
use App\Models\Aluno;
use App\Models\Mood;
use DateTime;

class EmocoesController extends Controller
{
    public function registrarEmocao(Request $request)
    {
        // $validatedData = $request->validate([
        //     'emocao' => 'required',
        // ], [
        //     'emocao.required' => 'Selecione uma emoção.',
        // ]);

        $emocoes = [
        'felicidade' => 'Felicidade',
        'tristeza' => 'Tristeza',
        'raiva' => 'Raiva',
        'confusao' => 'Confusão',
        'medo' => 'Medo',
        'estresse' => 'Estresse',
        'apaixonado' => 'Apaixonado',
        'animacao' => 'Animação',
        ];
        
        $emocaoSelecionada = $request->input('mood'); 
        // $ra = $request->input('ra');


        $emocao = new Aluno_Mood();
        $emocao->mood = $emocoes[$emocaoSelecionada];
        $emocao->data = (new DateTime())->format('Y-m-d H:i:s');;
        $emocao->aluno = "2157016";
            
        $emocao->save();

        return view('index');
    }

    public function mostraEmocoes()
    {
        return view('pages.emocoes');
    }
}
