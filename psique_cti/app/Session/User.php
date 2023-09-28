<?php

namespace App\Session;
use App\Http\Controllers\MainController;

class User{
    private static function init(){
        return session_status() !== PHP_SESSION_ACTIVE ? session_start(): true;
        
    }

    public static function Alogin($name, $email){
        self::init();
         
        
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
        return view('/');
        //$user=User::find(session()->get('id'));
    }
}