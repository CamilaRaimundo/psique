@extends('layout.site')

@section('titulo', 'Encontros')
    
@section('conteudo')
    <div class="container-home_pro">
        <div class="caixa_encontro">
            <div class="pergunta">
                <h1>Registre os encontros com os alunos</h1>
            </div>
             {{-- Exibir mensagens de erro de validação --}}
             @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

         {{-- Exibir mensagem de sucesso --}}
         @if (session('success'))
             <div class="alert alert-success">
                 {{ session('success') }}
             </div>
         @endif
            <form method="POST" action="{{ route('encontros.store') }}">
                @csrf

                <div class="input-group">
                    <input type="date" class="form-control a" name="data">
                    <input type="text" class="form-control a" name="ra_pesquisa" placeholder="Digite o RA">
                    <button type="button" class="btn btn-secondary a">Procurar</button>
                    {{-- Botão de procurar --> if(existe na tabela aluno?) registrar em seu cadastro --}}
                    {{-- else (!existe) então cadastrar esse RA com  --}}
                    {{-- <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                    </button> --}}
                    {{-- <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul> --}}
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="comentario" id="floatingTextarea2" style="height: 450px"></textarea>
                    <label for="floatingTextarea2">Comentários</label>
                </div>

                <div class="input_group">
                    <button type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection