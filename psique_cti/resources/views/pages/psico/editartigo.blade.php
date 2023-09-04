@extends('layout.site')

@section('titulo', 'Editar artigo')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">
            <h2>Editar artigo</h2>

            {{-- exibir as informações já cadastradas e permitir edição dos campos --}}
            {{-- então realizar update --}}
            <form action="{{ route('controller.artigo') }}" method="POST">
                {{ csrf_field() }} 

                <div class="input_group">
                    <label for="titulo_publicacao">Título da publicação</label>
                    <input type="text" id="titulo_publicacao" placeholder="Digite o título da publicação" required>
                </div>

                <div class="input_group">
                    <label for="autor_publicacao">Autor</label>
                    <input type="text" id="autor_publicacao" name="autor_publicacao" placeholder="Digite o autor do artigo" required>
                </div>

                <div class="input_group">
                    <label for="link_publicacao">Link</label>
                    <input type="url" id="link_publicacao" placeholder="Adicione o link, caso haja, para redirecionamento para outra página">
                </div>

                <div class="input_group">
                    <label for="img_ilustrativa">Imagem ilustrativa &#040;jpg, jpeg ou png&#041;</label>
                    <label class="img_ilustrativa">Escolha um arquivo</label>
                    <input type="file" id="img_ilustrativa" accept="image/png,image/jpeg,image/jpg">
                </div>

                <div class="input_group">
                    <label for="descricao_publicacao">Indique abaixo a resenha sobre o artigo importado ou utilize o espaço para adicionar o texto próprio:</label>
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Descrição</label>
                    </div>
                </div>

                <div class="input_group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div> 
    
@endsection