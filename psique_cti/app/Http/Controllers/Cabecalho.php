<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Cabecalho extends BaseController
{
    public function cabecalho(){
        if(session()->has(key:'user')){
            var_dump(value:session()->get(key:'user'));
        } 
    }
}