<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Testing;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Profissional;
use App\Models\Evento;
use App\Models\Publicacao_Recomendacao;

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
                    return view('pages.emocoes', compact("googl"));
                }
                
                return view('index', compact("googl"));
               
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
        return view('pages.psico.home');
    }
 
    public function adminIndex() 
    {
        return view('pages.admin.homeAdmin');
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
   
    public function indexArtigoEdit($id)
    {
        $publi = Publicacao_Recomendacao::find($id);
        return view('pages.psico.editartigo', compact('publi'));
    } 
 
    public function detalhesIndex()
    {
        return view('pages.psico.detalhesaluno');
    } 
   
    public function estatisticasIndex()
    {
        return view('pages.psico.graficos');
    } 
  
    public function indexAddPro()
    {
        return view('pages.admin.adicionarProfissional');
    } 
 
    public function indexEditPro()
    {
        return view('pages.admin.editarPro');
    } 
}