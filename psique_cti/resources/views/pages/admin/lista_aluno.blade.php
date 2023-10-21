@extends('layout.site')

@section('titulo', 'Alunos')
    
@section('conteudo')
  <div class="container-admin">
  {{-- <button type="button" class="btn btn-primary btn-lg"><a href="/AdicionarAluno">Adicionar profissional</a></button> --}}
     <div class="text-aluno">
    <h3>Alunos cadastrados</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">RA</th>
          <th scope="col">Curso</th>
          <th scope="col">Série</th>
          <th scope="col">Excluir</th>
          {{-- <th scope="col">Ações</th> --}}
        </tr>
      </thead>
      @foreach($alunos as $al)
        <tbody>
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$al->nome}}</td>
            <td>{{$al->email}}</td>
            <td>{{$al->ra}}</td>
            <td>{{$al->curso}}</td>
            <td>{{$al->serie}}</td>
            {{-- <td>{{$al->ativo ? 'Sim' : 'Não'}}</td> --}}
            <td>
            </div>
   
            <form method="POST" action="{{ route('excluirAluno', ['ra' => $al->ra, 'email' => $al->email]) }}" onsubmit="return confirm('Tem certeza que deseja excluir o aluno?');">
              {{ csrf_field() }}
              @method('DELETE')
              <button type="submit" class="btn btn-danger excluir-aluno" data-ra="{{ $al->ra }}" data-email="{{ $al->email }}">
              {{-- <button type="submit" class="btn btn-danger" @if(!$al->ativo) disabled @endif> --}}
                  Excluir
              </button>
          </form>

              {{-- <form method="POST" action="{{ url('/inativar-ativar-aluno', $al->ra) }}">
                @csrf
                <button type="submit" class="btn btn-danger"
                  @if(!$al->ativo) disabled @endif>
                  Inativar</button>
              </form>
                    {{-- </form> --}}
              {{-- <form method="POST" action="{{ url('/inativar-ativar-aluno', $al->ra) }}">
                @csrf
                <button type="submit" class="btn btn-warning"
                  @if($al->ativo) disabled @endif>
                Ativar</button>
              </form>  --}}
            </td>
          </tr>
      @endforeach
    </table>  
  </div>

  <script>
    $(document).ready(function() {
        $('.excluir-aluno').on('click', function(e) {
            e.preventDefault(); // Impede o envio do formulário
            var ra = $(this).data('ra'); // Obtenha o valor do atributo 'data-ra' do botão
            var email = $(this).data('email'); // Obtenha o valor do atributo 'data-email' do botão
            var row = $(this).closest('tr'); // Encontre a linha da tabela que contém o botão clicado

            if (confirm('Tem certeza que deseja excluir o aluno?')) {
                $.ajax({
                    url: '/excluir-aluno/' + ra + '/' + email, // Passe ambos os parâmetros na URL
                    method: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        row.remove(); // Remove a linha da tabela após a exclusão bem-sucedida
                    }
                });
            }
        });
    });
</script>



  {{-- <script>
    $(document).ready(function() {
        $('.excluir-aluno').on('click', function(e) {
            e.preventDefault(); // Impede o envio do formulário
            var ra = $(this).data('id');
            var row = $(this).closest('tr'); // Encontre a linha da tabela que contém o botão clicado

            if (confirm('Tem certeza que deseja excluir o aluno?')) {
                $.ajax({
                    url: '/excluir-aluno/' + ra,
                    method: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        row.remove(); // Remove a linha da tabela após a exclusão bem-sucedida
                    }
                });
            }
        });
    });
</script> --}}


@endsection