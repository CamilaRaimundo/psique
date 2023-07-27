<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContatoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function mostraForm()
    {
        return view('contact.contato');
    }

    public function mandaEmail(ContactRequest $request)
    {
        Mail::to('my@mail.com'->send(new ContatoMail($request->name, $request->email, $request->content)));

        return to_route('welcome');
    }
}
