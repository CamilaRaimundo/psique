<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">

  <!-- Import Google Icon Font -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  <!-- Import materialize.css -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}

  <!-- Import bootstrap.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">  

  <!-- icones -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/58fe79a519.js" crossorigin="anonymous"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('img/icone_cf.png') }}">

</head>

<body>

    {{-- if(sem nenhuma notificação clicada) --}}
    {{-- <div class="pagina_vazia">
        <h1>Detalhes dos alunos</h1>
        <p>Pesquise o nome do aluno abaixo ou selecione o icone de vizualização para ver o aluno específico de cada notificação </p>

        <form action="">
            <div class="input-group">
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option selected disabled>Escolha um aluno</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
                <button class="btn btn-secondary" type="submit">Procurar</button>
            </div>
        </form>

        <img src="{{ asset('img/notificacao-img.png') }}" width="60%" alt="">
    </div> --}}

    {{-- else --}}
    <div class="container-padrao">
        <div class="form-box">
            <h2>Detalhes do aluno</h2>
            <form action="#">
                <div class="input_group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" placeholder="Nome do indivíduo" readonly>
                </div>

                <div class="input_group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" placeholder="usuario@gmail.com" readonly>
                </div>

                <div class="input_group">
                    <label for="dataNasc">Data de Nascimento</label>
                    <input type="date" placeholder="27/05/2023" id="dataNasc" readonly>
                </div>

                <div class="input_group">
                    <label for="turma">Série/Ano</label>
                </div>

                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect01" readonly>
                    <option value="1">Primeiro &#040;1º ano&#041;</option>
                    <option value="2">Segundo &#040;2º ano&#041;</option>
                    <option value="3" selected>Terceiro &#040;3º ano&#041;</option>
                    </select>
                </div>
                
                <div class="input_group">
                    <label for="turma">Curso</label>
                </div>

                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect01" readonly>
                    <option value="1" selected>Informática A</option>
                    <option value="2">Informática B</option>
                    <option value="3">Eletrônica</option>
                    <option value="4">Mâcanica</option>
                    </select>
                </div>

                <div class="input_group">
                    <label for="qtd_pessoas">Com quantas pessoas você mora?</label>
                    <input type="text" id="qtd_pessoas" placeholder="3 moradores" readonly>
                </div>

                <div class="input_group">
                    <label for="medicamento">Já passou por acompanhamento psicológico?</label>
                </div>
                
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02" readonly>
                        <option value="1-sim" selected>Sim</option>
                        <option value="2-nao">Não</option>
                    </select>
                </div>

                <div class="input_group">
                    <label for="medicamento">Você consome algum medicamento?</label>
                </div>
                
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02" readonly>
                        <option value="1-sim">Sim</option>
                        <option value="2-nao" selected>Não</option>
                    </select>
                </div>

                <div class="input_group">
                    <label for="medicamento">Se sim, quais?</label>
                    <input type="text" id="medicamento" placeholder="Sem medicação" readonly>
                </div>

                <div class="input_group">
                    <label for="turma">A quanto tempo esses sentimentos estão te afligindo?</label>
                    <input type="text" id="turma" placeholder="1 ano" readonly>
                </div>
                
                <div class="input_group">
                    <label for="turma">Fique à vontade de deixar suas emoções</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" readonly></textarea>
                    <label for="floatingTextarea2">Comentários</label>
                </div>

                <div class="input_group">
                    <button>Voltar</button>
                </div>
            </form>
        </div>
    </div>
    

    <!-- Meu Javascript -->
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    
    <!-- Javascript bootstrap -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>