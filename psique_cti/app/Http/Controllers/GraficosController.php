<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno_Mood;
use App\Models\Aluno;
use App\Models\Mood;
use DateTime;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    public function pegaEmocoes()
    {
        // Obtém a data atual como um objeto DateTime
        $hoje = new DateTime();
    
        // Formata a data atual para o formato 'Y-m-d' para comparar com o banco de dados
        $dataAtual = $hoje->format('Y-m-d');
    
        // Consulta o banco de dados para obter todos os registros do dia
        $emocoesDia = DB::table('aluno_mood')
            ->select('mood', DB::raw('count(*) as count'))
            ->whereDate('data', '=', $dataAtual)
            ->groupBy('mood')
            ->get();
    
        // Consulta o banco de dados para contar quantas vezes cada emoção foi registrada no mês atual
        $mesAtual = $hoje->format('Y-m');
        $emocoesMes = DB::table('aluno_mood')
            ->select('mood', DB::raw('count(*) as count'))
            ->whereYear('data', '=', $hoje->format('Y'))
            ->whereMonth('data', '=', $hoje->format('m'))
            ->groupBy('mood')
            ->get();
    
        // Retorna a view com os dados das emoções do dia e do mês
        return view('pages.psico.graficos', compact('emocoesDia', 'emocoesMes'));
    }
}
