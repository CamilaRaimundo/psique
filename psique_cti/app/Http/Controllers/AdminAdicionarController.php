<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profissional;
use Illuminate\Support\Facades\DB;

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
            //'telefone_pro' => 'required|numeric',
        ], [
            'required' => 'O campo :attribute é obrigatório.',
            'unique' => 'O campo :attribute já está em uso.',
            //'numeric' => 'O campo :attribute deve conter apenas dígitos numéricos.',
            'max' => 'O campo :attribute deve conter no máximo 20 dígitos',
        ]);    

        $profissional = new Profissional();

        $profissional->nome = $validatedData['nome_pro'];
        $profissional->email = $validatedData['email_pro'];
        $profissional->crp = $validatedData['crp_pro'];
        $profissional->cpf = $validatedData['cpf_pro'];
        $profissional->telefone = $validatedData['telefone_pro'];
        $profissional->ativo = true;
        
        $profissional->save();

        //dd($profissional);

        return redirect()->route("Admin");
    }

    public function pegandoDados()
    {
     //   $profissionais = Profissional::all();
        $profissionais = DB::select("select * from profissionais");
      
        return view('pages.admin.homeAdmin', compact('profissionais'));
    }

    public function inativarAtivarProfissional($cpf)
    {
        $profissional = Profissional::where('cpf', $cpf)->first();
        
        if ($profissional)
        {
            $profissional->ativo = !$profissional->ativo; // Inverte o valor
            $profissional->save();
        }
        return view('pages.admin.homeAdmin');
        //return redirect()->back(); // Redireciona de volta para a página
    }
    }