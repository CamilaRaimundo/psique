<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Testing;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Aluno;

class LogOutController extends Controller
{
    public function logout()
    {
        // Limpe todos os dados da sessão
       
            Auth::logout();
        
            return redirect('/');
        
        // Faça o logout do usuário e redirecione para a página de login
       

    }
}
