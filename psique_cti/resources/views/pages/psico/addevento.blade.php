@extends('layout.site')

@section('titulo', 'Publicar eventos')
    
@section('conteudo')
<div class="box-form1">
    <div class="form-box-form1">
        <h2>Publicar eventos</h2>
        <div class="linha"></div>
        <p>Crie eventos, paclestras ou reuniões com os alunos!</p>

        <form action="{{ route('addeven') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="input_group">
                <label for="titulo_evento">Título do evento</label>
                <input type="text" id="titulo_evento" name="titulo_evento" placeholder="Digite o título do evento" required>
                @error('titulo_evento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="responsavel_evento">Responsável</label>
                <input type="text" id="responsavel_evento" name="responsavel_evento" placeholder="Digite o responsável pelo evento" required>
                @error('responsavel_evento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="local_evento">Local</label>
                <input type="text" id="local_evento" name="local_evento" placeholder="Digite o local que ocorrerá o evento" required>
                @error('local_evento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="dataehora_evento">Data e horário</label>
                <input type="datetime-local" name="dataehora_evento" id="dataehora_evento" required>
                @error('dataehora_evento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="limite_pessoas_evento">Há limite de pessoas?</label>
                <input type="number" id="limite_pessoas_evento" name="limite_pessoas_evento" placeholder="Digite o limite de pessoas, caso haja">
                @error('limite_pessoas_evento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="link_evento">Link</label>
                <input type="url" id="link_evento" name="link_evento" placeholder="Adicione o link, caso haja, para redirecionamento para outra página">
                @error('link_evento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="img_ilustrativa">Imagem ilustrativa &#040;jpg, jpeg ou png&#041;</label>
                <label for="img_ilustrativa" class="img_ilustrativa">Escolha um arquivo</label>
                <input type="file" id="img_ilustrativa" name="img_ilustrativa" accept="image/png,image/jpeg,image/jpg">
                @error('img_ilustrativa')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <label for="descricao_evento">Descrição do evento</label>
                <div class="form-floating">
                    <textarea class="form-control" id="descricao_evento" name="descricao_evento" style="height: 100px"></textarea>
                    <label for="descricao_evento">Comentários</label>
                </div>
                @error('descricao_evento')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_group">
                <button>Enviar</button>
            </div>
        </form>
    </div>

    <img src="{{ asset('img/publica_eventos-img.png') }}" width="40%" alt="">
    
</div>
@endsection