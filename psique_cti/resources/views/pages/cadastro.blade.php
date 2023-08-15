@extends('layout.site')

@section('titulo', 'Informações adicionais')
    
@section('conteudo')
    <div class="box centralizado">
        <div class="img-box">
            <img src="{{ asset('img/cad_img.png') }}" alt="">
        </div>

        <div class="form-box">
            <h2>Informações adicionais</h2>
            <form onsubmit="validaEnvio(event)" action="{{ route('cad') }}" method="POST" id="myForm">
            {{ csrf_field() }}
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
                    <input type="date" id="dataNasc" name="data_nascimento" required>
                    @error('data_nascimento')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="turma">Série/Ano</label>
                    
                </div>

                <div class="input-group mb-3">
                    <select class="form-select" id="ano" name="opcao_serie" required>
                      <option disabled selected value="0">Escolha...</option>
                      <option value="1">Primeiro &#040;1º ano&#041;</option>
                      <option value="2">Segundo &#040;2º ano&#041;</option>
                      <option value="3">Terceiro &#040;3º ano&#041;</option>
                    </select>     
                    @error('opcao_serie')
                        <span class="error">{{ $message }}</span>
                    @enderror             
                    </div>
                
                <div class="input_group">
                    <label for="turma">Curso</label>
                </div>

                <div class="input-group mb-3">
                  <select class="form-select" id="curso" name="opcao_curso" required>
                      <option disabled selected value="0">Escolha...</option>
                      <option value="1" >Informática A</option>
                      <option value="2">Informática B</option>
                      <option value="3">Eletrônica</option>
                      <option value="4">Mecânica</option>
                    </select>
                    @error('opcao_curso')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <button>Continuar</button>
                </div>
            </form>
        </div>
    </div>
@endsection