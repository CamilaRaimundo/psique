@extends('layout.site')

@section('titulo', 'Editar evento')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">
            <h2>Editar evento</h2>

            {{-- exibir as informações já cadastradas e permitir edição dos campos --}}
            {{-- então realizar update --}}
            <form action="{{ route('atualizaeven', $linha->id_mural) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
                <div class="input_group">
                    <label for="titulo_evento">Título do evento</label>
                    <input type="text" id="titulo_evento" name="titulo_evento" placeholder="Digite o título do evento" required>
                </div>

                <div class="input_group">
                    <label for="responsavel_evento">Responsável</label>
                    <input type="text" id="responsavel_evento" name="responsavel_evento" placeholder="Digite o responsável pelo evento" required
                    value="{{ isset($linha->responsavel_evento) ? $linha->responsavel_evento : '' }}">
                </div>

                <div class="input_group">
                    <label for="local_evento">Local</label>
                    <input type="text" id="local_evento" name="local_evento" placeholder="Digite o local que ocorrerá o evento" required
                    value="{{ isset($linha->local_evento) ? $linha->local_evento : '' }}">
                </div>

                <div class="input_group">
                    <label for="dataehora_evento">Data e horário</label>
                    <input type="datetime-local" id="dataehora_evento" name="dataehora_evento" required
                    value="{{ isset($linha->dataehora_evento) ? $linha->dataehora_evento : '' }}">
                </div>

                <div class="input_group">
                    <label for="limite_pessoas_evento">Há limite de pessoas?</label>
                    <input type="number" id="limite_pessoas_evento" name="limite_pessoas_evento" placeholder="Digite o limite de pessoas, caso haja"
                    value="{{ isset($linha->limite_pessoas_evento) ? $linha->limite_pessoas_evento : '' }}">
                </div>

                <div class="input_group">
                    <label for="link_evento">Link</label>
                    <input type="url" id="link_evento" name="link_evento" placeholder="Adicione o link, caso haja, para redirecionamento para outra página"
                    value="{{ isset($linha->link_evento) ? $linha->link_evento : '' }}">
                </div>

                <div class="input_group">
                    <label for="img_ilustrativa">Imagem ilustrativa &#040;jpg, jpeg ou png&#041;</label>
                    <label class="img_ilustrativa">Escolha um arquivo</label>
                    <input type="file" id="img_ilustrativa" name="img_ilustrativa" accept="image/png,image/jpeg,image/jpg">
                </div>

                <div class="input_group">
                    <label for="descricao_evento">Descrição do evento</label>
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea2" name="comentarios" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comentários</label>
                    </div>
                </div>

                <div class="input_group">
                    <button>Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection