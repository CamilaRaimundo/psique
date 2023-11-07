<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Testing;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Aluno_Mood;
use App\Models\Profissional;
use App\Models\Evento;
use App\Models\Publicacao_Recomendacao;
use Exception;
use DateTime;


// include{{asset('/../../../variavel.php')}}; //variavel global

class MainController extends Controller
{
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }
    
    public function googleHandle(){
        try{
            
            $user=Socialite::driver('google')->user();
            $findUser=User::where('email',$user->email)->first();
            if(!$findUser)
            {
                
                $googl = [
                    'googleName' => $user->getName(),
                    'googleEmail' => $user->getEmail(),
                    'googlePicture' =>$user->getAvatar(),
        
                ];
                
                 $googleName = $user->getName();
                 $googleEmail = $user->getEmail();
                return view('pages.cadastro', compact("googl"));
              
            }
            else
            {
                Auth::login($findUser);
                session()->put('name',$findUser->name);
                session()->put('email',$findUser->email);
                   

                $googl = [
                    'googleName' => $user->getName(),
                    'googleEmail' => $user->getEmail(),
                    'googlePicture' =>$user->getAvatar(),
                ];

                if(Profissional::where('email',$user->email)->first())
                {
                    return view('pages.psico.home', compact("googl"));
                }

                if($findUser->email=="psique.cti@gmail.com")
                {
                    return view('pages.admin.homeAdmin', compact("googl"));
                }

                $dataatual = (new DateTime())->format('Y-m-d H:i:s');
                $alunoAutenticado = Auth::user(); // Obtém o usuário autenticado
                if ($alunoAutenticado) {
                    $email = $alunoAutenticado->email;
                    $result = DB::table('alunos')
                                ->where('email', $email)
                                ->select('ra')
                                ->first(); 

                    if ($result) {
                        $ra = $result->ra;
                    }
                }
                    $tememocaohoje = DB::table('aluno_mood')
                    ->where('data', $dataatual)
                    ->where('aluno', $ra)
                    ->select('data')
                    ->first(); 
                    if ($tememocaohoje) {
                        return view('index', compact("googl"));
                    }
                    else{
                        return view('pages.emocoes', compact("googl"));
                    }
                
            }
            
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function index() 
    {
        return view('index');
    }

    public function login() 
    {
        return view('pages.login');
    }

    public function psicoIndex() 
    {
        if(Auth::check()) 
        {
            if(Auth::user()->nivel_de_acesso==2)
                return view('pages.psico.home');
        }
            else
                return view('index');
            
    }
 
    public function adminIndex() 
    {
        if(Auth::check()) 
        {
            if(Auth::user()->nivel_de_acesso==-1)
                return view('pages.admin.homeAdmin');
        }
        else
            return view('index');
    }

    public function indexEditPro() 
    {
        if(Auth::check()) 
        {
            if(Auth::user()->nivel_de_acesso==-1)
                return view('pages.admin.editarPro');
        }
        else
            return view('index');
    }
    public function indexAddPro() 
    {
        if(Auth::check()) 
        {
            if(Auth::user()->nivel_de_acesso==-1)
                return view('pages.admin.adicionarProfissional');
        }
        else
            return view('index');
    }

    public function estatisticasIndex()
    {
        if(Auth::check()) 
        {
            if(Auth::user()->nivel_de_acesso==2)
                return view('pages.psico.graficos');
        }
          else
             return view('index');
    } 


    public function indexArtigoEdit()
    {
        if(Auth::check()) 
        {
            if(Auth::user()->nivel_de_acesso==2)
            return view('pages.psico.editartigo');
        } 
        
        else
        return view('index');
    }
           

    public function indexArtigo()
    {
        return view('pages.psico.addartigo');
    } 
  
    public function indexEvento()
    {
        return view('pages.psico.addevento');
    } 

    public function indexEventoEdit($id)
    {
        $evento = Evento::find($id);
        return view('pages.psico.editevento', compact('evento'));
    } 

    public function indexEncontros()
    {
        return view ('pages.psico.encontros');
    }
 
    public function detalhesIndex()
    {
        return view('pages.psico.detalhesaluno');
    } 
}