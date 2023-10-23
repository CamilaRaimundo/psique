<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $alunoAutenticado = Auth::user();
        // $ra = $request->input('ra');

        
        $emocao = new Aluno_Mood();
        $emocao->mood = $emocoes[$emocaoSelecionada];
        $emocao->data = (new DateTime())->format('Y-m-d H:i:s');
        if ($alunoAutenticado) {
            $email = $alunoAutenticado->email;
            $result = DB::table('alunos')
                        ->where('email', $email)
                        ->select('ra')
                        ->first(); 
            if ($result) {
                $ra = $result->ra;
            }
            $emocao->aluno = $ra;
        }
        // $emocao->aluno = Auth::aluno()->ra;
            
        $emocao->save();

        return view('index');
    }

    public function mostraEmocoes()
    {
        return view('pages.emocoes');
    }
}
