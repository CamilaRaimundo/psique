@extends('layout.site')

@section('titulo', 'Alunos')
    
@section('conteudo')
  <div class="container-admin">
    {{-- <button type="button" class="btn btn-primary btn-lg"><a href="/AdicionarPro">Adicionar profissional</a></button> --}}
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
          <th scope="col">Ativo</th>
          <th scope="col">Ações</th>
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
          </tr>
      @endforeach
    </table>  
  </div>
@endsection