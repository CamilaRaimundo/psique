@extends('layout.site')

@section('titulo', 'Cadastro de aluno')
    
@section('conteudo')
    <div class="box">
        <div class="img-box">
            <img src="{{ asset('img/logo_completa_sf.png') }}" alt="">
        </div>

        <div class="form-box">
            <h2>Criar Conta</h2>
            <p>Já é um membro? <a href="/login">Login</a> </p>
            <form action="#">
                <div class="input-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" placeholder="Nome Completo" required>
                </div>

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" placeholder="usuario@gmail.com" required>
                </div>

                <div class="input-group">
                    <label for="dataNasc">Data de Nascimento</label>
                    <input type="date" style="color:#ced4da" id="dataNasc" placeholder="Nome Completo" required>
                </div>

                <div class="input-group">
                    <label for="turma">Turma</label>
                    <input type="text" id="turma" placeholder="Nome Completo" required>
                </div>

                <div class="input-group">
                    <button>Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection