@extends('layout.site')

@section('titulo', 'Triagem')
    
@section('conteudo')
    <div class="box-form1">
        <div class="form-box-form1">
            <h2>Triagem</h2>

            <div class="linha"></div>
            <p>Me ajude a te conhecer melhor!</p>
            <form action="{{ route('controller.triagem') }}" method="POST">

                <div class="input_group">
                    <label for="qtd_pessoas">Com quantas pessoas você mora?</label>
                    <input type="number" id="qtd_pessoas" name="qtd_pessoas" min="1" max="10"  placeholder="Selecione o total contando com você" required>
                    
                </div>

                <div class="input_group">
                    <label for="acompanhamento">Já passou por acompanhamento psicológico?</label>
                </div>
                  
                <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect01">
                     <option disabled selected>Escolha...</option> 
                    <option value="1-sim">Sim</option>
                    <option value="2-nao">Não</option>
                </select>
                {{-- <label class="input-group-text" for="inputGroupSelect02">Opções</label> --}}
                </div>

                <div class="input_group">
                    <label for="medicamento">Você consome algum medicamento?</label>
                </div>   
                  
                <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect02" onchange="requerido()"  name="opcao_medicamento">
                    <option disabled selected>Escolha...</option>
                    <option value="1-sim">Sim</option>
                    <option value="2-nao">Não</option>
                </select>
                {{-- <label class="input-group-text" for="inputGroupSelect02">Opções</label> --}}
                </div>

                {{-- fazer uma condição em que se a resposta a cima for "sim", a descrição dos nomes será "required" --}}
               
                <div class="input_group" id="idMedic">
                <label for="medicamento">Se sim, quais?</label> 
                <input type="text" id="medicamento" name= "medicamento" placeholder="Nome da medicação"> 
                </div>
               

                <div class="input_group">
                    <label for="turma">A quanto tempo esses sentimentos estão te afligindo?</label>
                    <input type="text" id="turma" placeholder="Digite um tempo estimado" required>
                </div>
                
                <div class="input_group">
                    <label for="turma">Fique à vontade de deixar suas emoções</label>
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Comentários</label>
                </div>

                <div class="input_group">
                    <button>Enviar</button>
                </div>
            </form>
        </div>

        <img src="{{ asset('img/triagem_img.png') }}" width="40%" alt="">
    </div>
@endsection