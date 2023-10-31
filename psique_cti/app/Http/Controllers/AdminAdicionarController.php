<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profissional;
use App\Models\Aluno;
use App\Models\User;

class AdminAdicionarController extends Controller
{
    public function cadastrarProfissional(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'nome_pro' => 'required|string|max:255',
            'email_pro' => 'required|email|unique:profissionais,email',
            'cpf_pro' => 'required|unique:profissionais,cpf',
            'crp_pro' => 'required|string|max:255|unique:profissionais,crp',
            'telefone_pro' => 'required',
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'unique' => 'O campo :attribute já está em uso.',
            //'numeric' => 'O campo :attribute deve conter apenas dígitos numéricos.',
            'max' => 'O campo :attribute deve conter no máximo 20 dígitos',
        ]);    

        //dd($validatedData);

        $profissional = new Profissional();

        $profissional->nome = $validatedData['nome_pro'];
        $profissional->email = $validatedData['email_pro'];
        $profissional->crp = $validatedData['crp_pro'];
        $profissional->cpf = $validatedData['cpf_pro'];
        $profissional->telefone = $validatedData['telefone_pro'];
        $profissional->ativo = true;

        //dd($profissional);

        $profissional->save();

        //dd($profissional);

        return redirect()->route("home_admin");
    }

    public function pegandoDados()
    {
    //    $profissionais = Profissional::all();
        $profissionais = DB::select("select * from profissionais");
      
        return view('pages.admin.homeAdmin', compact('profissionais'));
    }

    public function pegandoDadosAlunos()
    {
        $alunos = DB::select("select * from alunos");
      
        return view('pages.admin.lista_aluno', compact('alunos'));
    }

    public function editarProfissional(Request $request)
    {
        // dd($request);
        // Encontre o profissional com base no CPF
        $profissional = Profissional::where('cpf', $request->cpf)->first();

        // Verifique se o profissional foi encontrado
        if ($profissional) {
            // Atualizar os campos do profissional com os novos dados
            $profissional->nome = $request->nome;
            $profissional->email = $request->email;
            $profissional->crp = $request->crp;
            $profissional->telefone = $request->telefone;

            
            // Salvar as alterações
            $profissional->save();

            return redirect()->route('home_admin');
        }
        else {
            return redirect()->route('home_admin');
        }
    }

    public function excluirAluno($ra, $email)
    {
        $aluno = Aluno::where('ra', $ra)->first();

        if ($aluno) {
            $aluno->delete(); // Exclui o aluno da tabela de alunos
        }

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->delete(); // Exclui o usuário da tabela de usuários
        }

        $alunos = Aluno::all(); // Recarrega a lista de alunos após a exclusão
        return view('listaAluno', compact('alunos'));
    }

    public function inativarAtivarProfissional($cpf)
    {
        $profissional = Profissional::where('cpf', $cpf)->first();
        
        if ($profissional)
        {
            $profissional->ativo = !$profissional->ativo; // Inverte o valor
            $profissional->save();
        }
        
        return redirect()->back(); // Redireciona de volta para a página
    }

}