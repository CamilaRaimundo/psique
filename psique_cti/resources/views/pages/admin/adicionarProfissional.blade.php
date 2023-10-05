@extends('layout.site')

@section('titulo', 'Adicionar Profissional')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">
            <h2>Adicionar profissional</h2>

            <form action="{{ route('addpro') }}" method="POST">
                
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
                    <input type="text" id="cpf_pro" name="cpf_pro" onkeyup="formatarEValidarCPF(this)" placeholder="Digite o CPF do profissional" required value="{{ old('cpf_pro') }}">
                    @error('cpf_pro')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="crp_pro">CRP</label>
                    <input type="text" id="crp_pro" name="crp_pro" placeholder="Digite o crp do profissional" onkeyup="formatarEValidarCRP(this)" required value="{{ old('crp_pro') }}">
                    @error('crp_pro')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="telefone_pro">Telefone</label>
                    <input type="text" id="telefone_pro" name="telefone_pro" onkeyup="formatarEValidarTelefone(this)" placeholder="Digite o telefone do profissional" required value="{{ old('telefone_pro') }}">
                    @error('telefone_pro')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <a href="{{ url('/Admin') }}" class="btn btn-primary">Voltar</a>

                <div class="input_group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- formatar e validar cpf - js --}}
   <script> 
      
function formatarEValidarCPF(input) {
    let cpf = input.value.replace(/\D/g, '');

    if (cpf.length === 11) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    }

    input.value = cpf;
    
    // Validar a quantidade de dígitos
    if (cpf.length !== 14) {
        input.setCustomValidity("CPF deve conter 11 dígitos");
    } else {
        input.setCustomValidity("");
    }
}

function formatarEValidarCRP(input) {
    let crp = input.value.replace(/\D/g, '');

    // Verificar se o CRP tem pelo menos 6 dígitos
    if (crp.length >= 6) {
        // Separar os últimos 6 dígitos e a parte antes deles
        const parte1 = crp.slice(0, -6);
        const parte2 = crp.slice(-6);

        // Formatar no estilo "06/000470-IS"
        crp = `${parte1.padStart(2, '0')}/${parte2}-IS`;
    }

    input.value = crp;

    // Validar a presença da sigla -IS
    if (!crp.includes('-IS')) {
        input.setCustomValidity("O CRP deve conter a sigla -IS após os 6 dígitos");
    } else {
        input.setCustomValidity("");
    }
}

function formatarEValidarTelefone(input) {
    let telefone = input.value.replace(/\D/g, '');

    if (telefone.length === 11) {
        telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    } else if (telefone.length === 10) {
        telefone = telefone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
    }

    input.value = telefone;
    
    // Validar a quantidade de dígitos
    if (telefone.length !== 14 && telefone.length !== 15) {
        input.setCustomValidity("Telefone deve conter 10 ou 11 dígitos");
    } else {
        input.setCustomValidity("");
    }
}
        </script>

@endsection


