<?php

namespace App\Session;

class User{
    private static function init(){
        return session_status() !== PHP_SESSION_ACTIVE ? session_start(): true;
    }

    public static function login($name, $email){
        self::init();
        
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
    }
}