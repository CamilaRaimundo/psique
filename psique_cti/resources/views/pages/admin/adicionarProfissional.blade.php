@extends('layout.site')

@section('titulo', 'Adicionar Profissional')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">
            <h2>Adicionar profissional</h2>

            <form action="{{ route('addpro') }}" method="POST" >
            {{ csrf_field() }}
                <div class="input_group">
                    <label for="nome_pro">Nome</label>
                    <input type="text" id="nome_pro" name="nome_pro" placeholder="Digite o nome do profissional" required value="{{ old('nome_pro') }}">
                    @error('nome_pro')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="email_pro">E-mail</label>
                    <input type="email" id="email_pro" name="email_pro" placeholder="Digite o e-mail do profissional" required value="{{ old('email_pro') }}">
                    @error('email_pro')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="cpf_pro">CPF</label>
                    <input type="text" id="cpf_pro" name="cpf_pro" placeholder="Digite o CPF do profissional" required value="{{ old('cpf_pro') }}">
                    @error('cpf_pro')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="crp_pro">CRP</label>
                    <input type="text" id="crp_pro" name="crp_pro" placeholder="Digite o crp do profissional" required value="{{ old('crp_pro') }}">
                    @error('crp_pro')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="telefone_pro">Telefone</label>
                    <input type="text" id="telefone_pro" name="telefone_pro" placeholder="Digite o telefone do profissional" required value="{{ old('telefone_pro') }}">
                    @error('telefone_pro')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection