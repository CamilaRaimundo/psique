@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')
    <div class="container-admin">
        <button type="button" class="btn btn-primary btn-lg" ><a href="/AdicionarPro">Adicionar profissional</a></button>
        <h3>Profissionais cadastrados</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">CRP</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ativo</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
        @foreach($pro as $pro)
            <tbody>
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$pro->nome}}</td>
                <td>{{$pro->email}}</td>
                <td>{{$pro->cpf}}</td>
                <td>{{$pro->crp}}</td>
                <td>{{$pro->telefone}}</td>
                <td>{{$pro->ativo ? 'Sim' : 'Não'}}</td>
                <td>
                    <!-- <button type="button" class="btn btn-danger">Inativar</button>
                    <button type="button" class="btn btn-warning">Ativar</button> -->

                    <form method="POST" action="{{ url('/inativar-ativar-profissional', $pro->cpf) }}">
                      @csrf
                      <button type="submit" class="btn btn-danger"
                                @if(!$pro->ativo) disabled @endif>
                            Inativar</button>
                  </form>
                    </form>
                    <form method="POST" action="{{ url('/inativar-ativar-profissional', $pro->cpf) }}">
                      @csrf
                      <button type="submit" class="btn btn-warning"
                                @if($pro->ativo) disabled @endif>
                            Ativar</button>
                  </form>

                  <!-- <button type="sumit" class="btn btn-danger">Inativar</button>
                  <button type="button" class="btn btn-warning"
                                @if($pro->ativo) disabled @endif>
                            Ativar</button> -->
                </td>
              </tr>
        @endforeach
      </table>  
    </div>
@endsection