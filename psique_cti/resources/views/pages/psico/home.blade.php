@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')

    <div class="container-home_pro">
        <div class="form-box" id="detalhes">
            <h2>Detalhes do aluno</h2>
            <div class="box_img1 secao-ocultar">
                <img src="{{ asset('img/detalhes-img.png') }}" alt="">
            </div>
            <form action="{{ route('pesquisaRA') }}" method="GET">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Digite o RA" aria-describedby="button-addon1" name="ra">
                    <button class="btn btn-secondary" type="submit" id="button-addon1">Pesquisar</button>
                </div>
           
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input_group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" id="nome" class="cursor_blocked" @isset($aluno) value="{{ $aluno->nome }}" @endisset>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="input_group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" readonly @isset($aluno) value="{{ $aluno->email }}" @endisset>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="input_group">
                                <label for="dataNasc">Data de Nascimento</label>
                                <input type="date" id="dataNasc" readonly @isset($aluno) value="{{ $aluno->data_nascimento }}" @endisset>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="input_group">
                                <label for="turma">Série/Ano</label>
                                <input type="text" id="serie" readonly @isset($aluno) value="{{ $aluno->serie }}" @endisset>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="input_group">
                                <label for="turma">Curso</label>
                                <input type="text" id="curso" readonly @isset($aluno) value="{{ $aluno->curso }}" @endisset>
                            </div>
                        </div>
                    </div>
                    



                    <div class="col-md-3">
                        <div class="input_group">
                            <label for="qtd_pessoas">Com quantas pessoas você mora?</label>
                            <input type="text" id="qtd_pessoas" readonly class="cursor_blocked" @isset($historico) value="{{ $historico->qtde_moradores }}" @endisset>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="input_group">
                            <label for="acompanhamento">Já passou por acompanhamento psicológico?</label>
                            <input type="text" id="acompanhamento" readonly class="cursor_blocked" @isset($historico) value="{{ $historico->acompanhamento ? 'Sim' : 'Não' }}" @endisset>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <div class="input_group">
                            <label for="tempo_sentimentos">A quanto tempo esses sentimentos estão te afligindo?</label>
                            <input type="text" id="tempo_sentimentos" readonly class="cursor_blocked" @isset($historico) value="{{ $historico->tempo_sentimentos }}" @endisset>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="input_group">
                            <label for="medicamento">Você consome algum medicamento?</label>
                            <input type="text" id="medicamento" readonly class="cursor_blocked" @isset($historico) value="{{ $historico->medicamentos ? 'Sim' : 'Não' }}" @endisset>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="input_group">
                            <label for="medicamento">Quais?</label>
                            <input type="text" id="medicamento" readonly class="cursor_blocked" @isset($historico) value="{{ $historico->nome_medicamentos }}" @endisset>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="input_group">
                            <label for="relato_aluno">Fique à vontade de deixar suas emoções</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" >@isset($historico){{$historico->queixas }}@endisset</textarea>
                            <label for="floatingTextarea2">Comentários</label>
                        </div>
                    </div>
                    
                   
                    <div class="col-md-6">
                        <div class="input_group">
                            <label for="relato_aluno">Encontros</label>
                        </div>
                        <div class="form-floating">
                            @isset($encontros)
                                @foreach($encontros as $encontro)
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{$encontro->observacoes}}</textarea>
                                @endforeach
                            @endisset
                            <label for="floatingTextarea2">Registros</label>
                        </div>
                    </div>
                    
            </div>
          

                <div class="container-graphic">
                    <canvas class="pie-chart-mes"></canvas>
                </div>

                <div class="input_group">
                    <button id="limpar-campos">Limpar</button>
                </div>
            </form>
            {{-- </form> --}}
        </div>
</div>
               
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        @if(isset($alunoMood)) 
        <script>
            var coresEmocoes = {
                'Felicidade': 'rgba(255,215,0)',
                'Tristeza': 'rgba(220,220,220)',
                'Raiva': 'rgba(255,0,0)',
                'Confusão': 'rgba(128,128,128)',
                'Medo': 'rgba(0,0,0)',
                'Estresse': 'rgba(128,0,0)',
                'Apaixonado': 'rgba(220,20,60)', 
                'Animação': 'rgba(0,191,255)'
            };
        
            var ctxMes = document.getElementsByClassName("pie-chart-mes");
            
        
            @if(isset($alunoMood))
            var dataMes = {!! json_encode($emocoesMes->pluck('count', 'mood')) !!};
            var labelsMes = Object.keys(dataMes);
            var countsMes = Object.values(dataMes);
            @else
            var labelsMes = [];
            var countsMes = [];
            @endif
        
            var chartGraphMes = new Chart(ctxMes, {
                type: 'pie',
                data: {
                    labels: labelsMes,
                    datasets: [{
                        data: countsMes,
                        backgroundColor: labelsMes.map(emocao => coresEmocoes[emocao])
                    }]
                },
                options: {
                    title: {
                        display: true,
                        fontSize: 20,
                        text: 'Sentimentos por Mês do Aluno',
                        color: 'rgba(0,0,0)',
                    },
                }
            });
        </script>
        @endif

        <script>
            function limparCamposEGráfico() {
                // Limpar os campos de entrada de texto, campos de data, campos de e-mail e campos de texto
                var campos = document.querySelectorAll('input[type="text"], input[type="date"], input[type="email"], textarea');
                campos.forEach(function (campo) {
                    campo.value = '';
                });
        
                // Remover permanentemente o gráfico, se existir
                var canvasMes = document.getElementsByClassName("pie-chart-mes")[0];
                if (canvasMes) {
                    canvasMes.remove();
                }
            }
        
            document.addEventListener('DOMContentLoaded', function () {
                var limparBotao = document.getElementById('limpar-campos');
                limparBotao.addEventListener('click', limparCamposEGráfico);
            });
        </script>
        
    </div>
@endsection
    

{{-- if(sem notificações) --}}
    {{-- <div class="pagina_vazia">
        <h3>Não há nenhuma notificação :&#040;</h3>
        <p>Volte em breve para conferir!</p>
        <img src="{{ asset('img/pipa-img.png') }}" width="35%" alt="">
    </div> --}}
    
    {{-- else(com notificações) --}}