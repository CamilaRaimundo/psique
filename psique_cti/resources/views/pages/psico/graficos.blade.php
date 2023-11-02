@extends('layout.site')

@section('titulo', 'Estatísticas')
    
@section('conteudo')

<div class="container-home_pro">

  <div class="container text-center">
    <div class="row justify-content-md-center">

        <h1 class="pergunta"><b>Análise gráfica</b></h1>  

        <div class="container-graphic">
            <canvas class="pie-chart-dia"></canvas>
        </div>

        <div class="container-graphic">
            <canvas class="pie-chart-mes"></canvas>
        </div>
       
    </div>
  </div>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script>
    // Defina um objeto com as cores correspondentes às emoções
    var coresEmocoes = {
        'Felicidade': 'rgba(255,215,0)',
        'Tristeza': 'rgba(220,220,220)',
        'Raiva': 'rgba(255,0,0)',
        'Confusão': 'rgba(128,128,128)',
        'Medo': 'rgba(0,0,0)', //(128,0,128)
        'Estresse': 'rgba(128,0,0)',
        'Apaixonado': 'rgba(220,20,60)', 
        'Animação': 'rgba(0,191,255)'
    };

    // Gráfico de pizza para emoções do dia
    var ctxDia = document.getElementsByClassName("pie-chart-dia");

    var dataDia = {!! json_encode($emocoesDia->pluck('count', 'mood')) !!};
    var labelsDia = Object.keys(dataDia);
    var countsDia = Object.values(dataDia);

    var chartGraphDia = new Chart(ctxDia, {
        type: 'pie',
        data: {
          labels: labelsDia,
          datasets: [{
            data: countsDia,
            backgroundColor: labelsDia.map(emocao => coresEmocoes[emocao])
          }]
        },
        options: {
          title: {
            display: true,
            fontSize: 20,
            text: 'Sentimentos por Dia',
            color: 'rgba(0,0,0)',
          },
        }
    });

    // Gráfico de pizza para emoções do mês
    var ctxMes = document.getElementsByClassName("pie-chart-mes");

    var dataMes = {!! json_encode($emocoesMes->pluck('count', 'mood')) !!};
    var labelsMes = Object.keys(dataMes);
    var countsMes = Object.values(dataMes);

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
            text: 'Sentimentos por Mês',
            color: 'rgba(0,0,0)',
          },
        }
    });

    </script>
</div>
@endsection
