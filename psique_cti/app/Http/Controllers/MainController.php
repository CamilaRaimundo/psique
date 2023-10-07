<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Testing;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Aluno;
use App\Models\Profissional;




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
}
