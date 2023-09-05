@extends('layout.site')

@section('titulo', 'Editar Profissional')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">
            <h2>Editar informações do Profissional</h2>
            <form action="#">
                <div class="input_group">
                    <label for="nome_pro">Nome</label>
                    <input type="text" id="nome_pro" placeholder="Nome do profissional" required>
                </div>

                <div class="input_group">
                    <label for="email_pro">E-mail</label>
                    <input type="text" id="email_pro" placeholder="E-mail profissional" required>
                </div>

                <div class="input_group">
                    <label for="cpf_pro">CPF</label>
                    <input type="number" id="cpf_pro" placeholder="999.999.999-99" required>
                </div>

                <div class="input_group">
                    <label for="crp_pro">CRP</label>
                    <input type="number" id="crp_pro" placeholder="9999999" required>
                </div>

                <div class="input_group">
                    <label for="tel_pro">Telefone</label>
                    <input type="text" id="tel_pro" placeholder="(99) 99999-9999" required>
                </div>

                <div class="input_group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection