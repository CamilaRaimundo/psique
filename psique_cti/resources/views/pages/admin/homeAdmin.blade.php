@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')
    <div class="container-admin">
        <button type="button" class="btn btn-primary btn-lg"><a href="/AdicionarPro">Adicionar profissional</a></button>
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
                <td>(99) 99999-9999</td>
                <td>Sim</td>
                <td>
                    <button type="button" class="btn btn-danger">Inativar</button>
                    <button type="button" class="btn btn-warning"><a href="\EditarPro">Editar</a></button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob Matheus</td>
                <td>jacob.m@gmail.com</td>
                <td>888.888.888-88</td>
                <td>@23258</td>
                <td>(88) 88888-8888</td>
                <td>Não</td>
                <td>
                    <button type="button" class="btn btn-danger">Inativar</button>
                    <button type="button" class="btn btn-warning">Ativar</button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>larry_bird@outlook.br</td>
                <td>777.777.777-77</td>
                <td>@98568</td>
                <td>(77) 77777-7777</td>
                <td>Não</td>
                <td>
                    <button type="button" class="btn btn-danger">Inativar</button>
                    <button type="button" class="btn btn-warning"><a href="\EditarPro">Editar</a></button>
                </td>
              </tr>
            </tbody>
        </table>
    </div>
@endsection