<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;
use App\Models\Aluno_Mood;
use App\Models\Historico_aluno;
use App\Models\Encontro;
use DateTime;


class DetalhesController extends Controller
{
    public function pesquisaRA(Request $request) {
        $ra = $request->input('ra'); // Obtém o valor do RA do formulário
    
        // Busque os dados do aluno com base no RA
        $aluno = Aluno::where('ra', $ra)->first();
    
        if ($aluno) {
            // Se o aluno foi encontrado, busque os dados relacionados de outras tabelas
            $historico = Historico_aluno::where('aluno', $aluno->ra)->first();
            $alunoMood = Aluno_Mood::where('aluno', $aluno->ra)->get();
            $encontros = Encontro::where('aluno', $aluno->ra)->get();

            $hoje = new DateTime();
    
            // Formata a data atual para o formato 'Y-m-d' para comparar com o banco de dados
            $dataAtual = $hoje->format('Y-m-d');
        
            // Consulta o banco de dados para obter todos os registros do dia
            $emocoesDia = DB::table('aluno_mood')
            ->select('mood', DB::raw('count(*) as count'))
            ->where('aluno', $aluno->ra)
            ->whereDate('data', '=', $dataAtual)
            ->groupBy('mood')
            ->get();

            $mesAtual = $hoje->format('Y-m');

            $emocoesMes = DB::table('aluno_mood')
            ->select('mood', DB::raw('count(*) as count'))
            ->where('aluno', $aluno->ra)
            ->whereYear('data', '=', $hoje->format('Y'))
            ->whereMonth('data', '=', $hoje->format('m'))
            ->groupBy('mood')
            ->get();
            // $emocoesDia = DB::table('aluno_mood')
            //     ->select('mood', DB::raw('count(*) as count'))
            //     ->whereDate('data', '=', $dataAtual)
            //     ->groupBy('mood')
            //     ->get();
        
            // // Consulta o banco de dados para contar quantas vezes cada emoção foi registrada no mês atual
            // $mesAtual = $hoje->format('Y-m');
            // $emocoesMes = DB::table('aluno_mood')
            //     ->select('mood', DB::raw('count(*) as count'))
            //     ->whereYear('data', '=', $hoje->format('Y'))
            //     ->whereMonth('data', '=', $hoje->format('m'))
            //     ->groupBy('mood')
            //     ->get();
    

            return view('pages.psico.home', compact('aluno', 'historico', 'alunoMood', 'encontros', 'ra', 'emocoesDia', 'emocoesMes'));
    
        } else {
            // Aluno não encontrado; lide com isso apropriadamente
            return view('pages.psico.home');
        }
    }
    
    
    
}
