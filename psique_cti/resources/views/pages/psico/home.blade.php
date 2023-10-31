@extends('layout.site')

@section('titulo', 'Home')
    
@section('conteudo')

    <div class="container-home_pro">
        <div class="form-box" id="detalhes">
            <h2>Detalhes do aluno</h2>
            <div class="box_img1 secao-ocultar">
                <img src="{{ asset('img/detalhes-img.png') }}" alt="">
            </div>
            <form action="#">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Digite o RA" aria-describedby="button-addon1">
                    <button class="btn btn-secondary" type="button" id="button-addon1">Pesquisar</button>
                </div>
                  
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" id="nome" placeholder="Nome do indivíduo" class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" placeholder="usuario@gmail.com" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_group">
                            <label for="dataNasc">Data de Nascimento</label>
                            <input type="date" placeholder="27/05/2023" id="dataNasc" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_group">
                            <label for="turma">Série/Ano</label>
                            <input type="email" id="email" placeholder="3º ano" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_group">
                            <label for="turma">Curso</label>
                            <input type="email" id="email" placeholder="Informática" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input_group">
                            <label for="qtd_pessoas">Com quantas pessoas você mora?</label>
                            <input type="text" id="qtd_pessoas" placeholder="3 moradores" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input_group">
                            <label for="acompanhamento">Já passou por acompanhamento psicológico?</label>
                            <input type="text" id="acompanhamento" placeholder="Sim" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="input_group">
                            <label for="tempo_sentimentos">A quanto tempo esses sentimentos estão te afligindo?</label>
                            <input type="text" id="tempo_sentimentos" placeholder="1 ano" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="input_group">
                            <label for="medicamento">Você consome algum medicamento?</label>
                            <input type="text" id="medicamento" placeholder="Sim" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="input_group">
                            <label for="medicamento">Quais?</label>
                            <input type="text" id="medicamento" placeholder="Dipirona" readonly class="cursor_blocked">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input_group">
                            <label for="relato_aluno">Fique à vontade de deixar suas emoções</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comentários</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input_group">
                            <label for="relato_aluno">Encontros</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Registros</label>
                        </div>
                    </div>

                </div>

                <div class="container-graphic">
                    <canvas class="pie-chart-mes"></canvas>
                </div>

                <div class="input_group">
                    <button>Limpar</button>
                </div>
            </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
        <script>
            var coresEmocoes = {
                'Felicidade': 'rgba(255,215,0)',
                'Tristeza': 'rgba(220,220,220)',
                'Raiva': 'rgba(255,0,0)',
                'Confusão': 'rgba(128,128,128)',
                'Medo': 'rgba(0,0,0',
                'Estresse': 'rgba(128,0,0',
                'Apaixonado': 'rgba(220,20,60', 
                'Animação': 'rgba(0,191,255'
            };
        
            var ctxMes = document.getElementsByClassName("pie-chart-mes");
        
            @if(isset($emocoesMes))
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
    </div>
@endsection
    

{{-- if(sem notificações) --}}
    {{-- <div class="pagina_vazia">
        <h3>Não há nenhuma notificação :&#040;</h3>
        <p>Volte em breve para conferir!</p>
        <img src="{{ asset('img/pipa-img.png') }}" width="35%" alt="">
    </div> --}}
    
    {{-- else(com notificações) --}}