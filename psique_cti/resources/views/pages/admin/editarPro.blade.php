@extends('layout.site')

@section('titulo', 'Editar Profissional')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">

            <a class="icon-link" href="JavaScript: window.history.back();">
                <i class="fa-solid fa-arrow-left"></i>
                Voltar
            </a>

            <h2>Editar informações do Profissional</h2>
            <form action="{{ route('admin_editar.processar') }}" method="POST">
                @csrf

                <div class="input_group" style = "display:none;">
                    <input type="text" id="cpf" name="cpf" value="{{$profissional->cpf}}" display = "none" readonly>
                </div>

                <div class="input_group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="{{$profissional->nome}}" required>
                </div>

                <div class="input_group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" value="{{$profissional->email}}" required>
                </div>

                <div class="input_group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="{{$profissional->cpf}}" required>
                </div>

                <div class="input_group">
                    <label for="crp">CRP</label>
                    <input type="number" id="crp" name="crp" value="{{$profissional->crp}}" required>
                </div>

                <div class="input_group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="{{$profissional->telefone}}" required>
                </div>

                <div class="input_group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection