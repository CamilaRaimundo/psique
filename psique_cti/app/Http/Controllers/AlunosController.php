<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alunos;

class AlunosController extends Controller
{
    //
    public function index() {
        $alunos = alunos::all();
        return view ("alunos",compact("alunos"));
    }
}
