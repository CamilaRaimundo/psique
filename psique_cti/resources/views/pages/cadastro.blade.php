@extends('layout.site')

@section('titulo', 'Cadastro de aluno')
    
@section('conteudo')
    <div class="box centralizado">
        <div class="img-box">
            <img src="{{ asset('img/cad_img.png') }}" alt="">
        </div>

        <div class="form-box">
            <h2>Informações adicionais</h2>
            {{-- <p>Já se cadastrou? <a href="/login">Login</a> </p> --}}
            <form action="#">
                <div class="input_group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" class="cursor_blocked" placeholder="Fulaninho da Silva" required readonly>
                </div>

                <div class="input_group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" class="cursor_blocked" placeholder="usuario@gmail.com" required readonly>
                </div>

                <div class="input_group">
                    <label for="dataNasc">Data de Nascimento</label>
                    <input type="date" id="dataNasc" required>
                </div>

                <div class="input_group">
                    <label for="turma">Série/Ano</label>
                    {{-- <input type="text" id="turma" placeholder="Digite sua turma" required> --}}
                </div>

                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect01" required>
                      {{-- <option selected>Opções</option> --}}
                      <option value="1">Primeiro &#040;1º ano&#041;</option>
                      <option value="2">Segundo &#040;2º ano&#041;</option>
                      <option value="3" selected>Terceiro &#040;3º ano&#041;</option>
                    </select>
                </div>
                
                <div class="input_group">
                    <label for="turma">Curso</label>
                </div>

                <div class="input-group mb-3">
                    {{-- <label class="input-group-text" for="inputGroupSelect01">Options</label> --}}
                    <select class="form-select" id="inputGroupSelect01" required>
                      {{-- <option selected></option> --}}
                      <option value="1" selected>Informática A</option>
                      <option value="2">Informática B</option>
                      <option value="3">Eletrônica</option>
                      <option value="4">Mâcanica</option>
                    </select>
                </div>

                <div class="input_group">
                    <button>Continuar</button>
                </div>
            </form>
        </div>
    </div>
@endsection