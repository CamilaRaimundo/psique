@extends('layout.site')

@section('titulo', 'Informações adicionais')
    
@section('conteudo')
    <div class="box centralizado">
        <div class="img-box">
            <img src="{{ asset('img/cad_img.png') }}" alt="">
        </div>

        <div class="form-box">
            <h2>Informações adicionais</h2>
            <form onsubmit="validaOpcoes(event)" action="{{ route('cadastro.mostrar') }}" method="POST" id="myForm">
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
                    <label for="ra">RA</label>
                    <input type="text" id="ra" placeholder="XXXXXXX" name="ra" required value="{{ old('ra') }}">
                    @error('ra')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="dataNasc">Data de Nascimento</label>
                    <input type="date" id="dataNasc" name="data_nascimento" required value="{{ old('data_nascimento') }}">
                    @error('data_nascimento')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input_group">
                    <label for="turma">Série/Ano</label>
                    
                </div>

                <div class="input-group mb-3">
                    <select class="form-select" id="ano" name="opcao_serie" required value="{{ old('opcao_serie') }}">
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
                  <select class="form-select" id="curso" name="opcao_curso" required value="{{ old('opcao_curso') }}">
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
    
    <script>
    function validaOpcoes(event) {
      var opano = document.getElementById("ano");
      var opcurso = document.getElementById("curso");

      if (opano.value === "0" || opcurso.value === "0") {
        event.preventDefault(); // Impede o envio do formulário
        alert("Selecione uma opção válida para ano e curso.");
      }
    }

    function validaIdade(event) {
      const birthdateInput = document.getElementById("dataNasc");
      const birthdate = birthdateInput.value;
      const minAge = 13;
      const maxAge = 100;

      if (calculateAge(birthdate) < minAge) {
        event.preventDefault(); // Impede o envio do formulário
        alert("Você deve ter pelo menos 13 anos para enviar o formulário.");
      } else if (calculateAge(birthdate) > maxAge) {
        event.preventDefault(); // Impede o envio do formulário
        alert("Você deve ter menos de 100 anos para enviar o formulário.");
      }
    }

    function calculateAge(data_nascimento) {
      const today = new Date();
      const birthDate = new Date(data_nascimento);
      let age = today.getFullYear() - birthDate.getFullYear();
      const month = today.getMonth() - birthDate.getMonth();
      if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }
      return age;
    }

    document.getElementById("myForm").addEventListener("submit", function(event) {
      validaOpcoes(event);
      validaIdade(event);
    });
  </script>

@endsection