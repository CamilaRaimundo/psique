<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContatoMail;
use Mail;

class ContatoController extends Controller
{
    public function mostraForm()
    {
        return view('pages.contato');
    }

    public function mandaEmail(Request $request)
    {
        Mail::to('psique@projetoscti.com.br')->send(new ContatoMail($request));

        return redirect()->route('contato.mostrar');
    }
}
