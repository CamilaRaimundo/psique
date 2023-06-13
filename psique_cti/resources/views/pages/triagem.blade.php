@extends('layout.site')

@section('titulo', 'Triagem')
    
@section('conteudo')
{{-- <div class="box"> --}}
    <div class="form-box">
        <h2>Triagem</h2>
        <div class="linha"></div>
        <p>Me ajude a te conhecer melhor!</p>
        <form action="#">
            <div class="input-group">
                <label for="qtd_pessoas">Com quantas pessoas você mora?</label>
                <input type="text" id="qtd_pessoas" required>
            </div>

            <div class="input-group">
                <label for="medicamento">Você consome algum medicamento?</label>

                <input type="radio" id="sim" name="medicamento" value="s" />
                <label for="sim">Sim</label>
          
                <input type="radio" id="nao" name="medicamento" value="n" />
                <label for="nao">Não</label>
          
            </div>

            <div class="input-group">
                <label for="dataNasc">Data de Nascimento</label>
                <input type="date" style="color:#ced4da" id="dataNasc" required>
            </div>

            <div class="input-group">
                <label for="turma">Turma</label>
                <input type="text" id="turma" placeholder="Digite sua turma" required>
            </div>

            <div class="input-group">
                <button>Cadastrar</button>
            </div>
        </form>
    </div>
{{-- </div> --}}
@endsection