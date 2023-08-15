@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')
    <div class="container-admin">
        <button type="button" class="btn btn-primary btn-lg">Adicionar profissional</button>
        <h3>Profissionais cadastrados</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">CPR</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ativo</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Raissa Toassa Martinelli</td>
                <td>raissa.toassa@unesp.br</td>
                <td>999.999.999-99</td>
                <td>@12332</td>
                <td>(14) 99999-9999</td>
                <td>Sim</td>
                <td>
                    <button type="button" class="btn btn-danger">Excluir</button>
                    <button type="button" class="btn btn-warning">Inativar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>
                    <button type="button" class="btn btn-danger">Excluir</button>
                    <button type="button" class="btn btn-warning">Inativar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Larry the Bird</td>
                <td>@twitter</td>
                <td>Larry the Bird</td>
                <td>@twitter</td>
                <td>Larry the Bird</td>
                <td>
                    <button type="button" class="btn btn-danger">Excluir</button>
                    <button type="button" class="btn btn-warning">Inativar</button>
                </td>
              </tr>
            </tbody>
        </table>
    </div>
@endsection