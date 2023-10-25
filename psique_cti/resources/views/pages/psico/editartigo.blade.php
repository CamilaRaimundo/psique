@extends('layout.site')

@section('titulo', 'Editar artigo')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">

            <a class="icon-link" href="JavaScript: window.history.back();">
                <i class="fa-solid fa-arrow-left"></i>
                Voltar para o mural
            </a>
            
            <h2>Editar artigo</h2>

            {{-- exibir as informações já cadastradas e permitir edição dos campos --}}
            {{-- então realizar update --}}
            <form action="{{ route('artigos_editar.processar') }}" method="POST">
                {{ csrf_field() }} 

                <div class="input_group" style = "display:none;">
                    <input type="text" id="id" name="id" value="{{$publi->id}}"readonly>
                </div>

                <div class="input_group">
                    <label for="titulo">Título da publicação</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Digite o título da publicação" value="{{$publi->titulo}}" required>
                </div>

                <div class="input_group">
                    <label for="autor">Autor</label>
                    <input type="text" id="autor" name="autor" placeholder="Digite o autor do artigo" value="{{$publi->autor}}" required>
                </div>

                <div class="input_group">
                    <label for="link">Link</label>
                    <input type="url" id="link" name="link" placeholder="Adicione o link, caso haja, para redirecionamento para outra página" value="{{$publi->link}}">
                </div>

                <div class="input_group">
                    <label for="img_ilustrativa">Imagem ilustrativa &#040;jpg, jpeg ou png&#041;</label>
                    <label class="img_ilustrativa">Escolha um arquivo</label>
                    <input type="file" id="img_ilustrativa" accept="image/png,image/jpeg,image/jpg">
                </div>

                <div class="input_group">
                    <label for="descricao_publicacao">Indique abaixo a resenha sobre o artigo importado ou utilize o espaço para adicionar o texto próprio:</label>
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea2" name="descricao" style="height: 100px">{{$publi->descricao}}</textarea>
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