@extends('layout.site')

@section('titulo', 'Editar evento')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">
            <h2>Editar evento</h2>

            {{-- exibir as informações já cadastradas e permitir edição dos campos --}}
            {{-- então realizar update --}}
            <form action="#">
                <div class="input_group">
                    <label for="titulo_evento">Título do evento</label>
                    <input type="text" id="titulo_evento" placeholder="Digite o título do evento" required>
                </div>

                <div class="input_group">
                    <label for="responsavel_evento">Responsável</label>
                    <input type="text" id="responsavel_evento" placeholder="Digite o responsável pelo evento" required>
                </div>

                <div class="input_group">
                    <label for="local_evento">Local</label>
                    <input type="text" id="local_evento" placeholder="Digite o local que ocorrerá o evento" required>
                </div>

                <div class="input_group">
                    <label for="dataehora_evento">Data e horário</label>
                    <input type="datetime-local" id="dataehora_evento" required>
                </div>

                <div class="input_group">
                    <label for="limite_pessoas_evento">Há limite de pessoas?</label>
                    <input type="text" id="limite_pessoas_evento" placeholder="Digite o limite de pessoas, caso haja">
                </div>

                <div class="input_group">
                    <label for="link_evento">Link</label>
                    <input type="url" id="link_evento" placeholder="Adicione o link, caso haja, para redirecionamento para outra página">
                </div>

                <div class="input_group">
                    <label for="img_ilustrativa">Imagem ilustrativa &#040;jpg, jpeg ou png&#041;</label>
                    <label class="img_ilustrativa">Escolha um arquivo</label>
                    <input type="file" id="img_ilustrativa" accept="image/png,image/jpeg,image/jpg">
                </div>

                <div class="input_group">
                    <label for="descricao_evento">Descrição do evento</label>
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
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