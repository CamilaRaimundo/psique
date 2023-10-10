<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Testing;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    
    public function googleLogin(){
        return Socialite::driver('google')->redirect();

    }

    public function googleHandle(){
        try{
            $user=Socialite::driver('google')->user();
            $findUser=User::where('email',$user->email)->first();
            if(!$findUser)
            {
                return redirect('/cadastro');
            }
            session()->put('id',$findUser->id);
            session()->put('type',$findUser->type);
            return redirect('/');

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
