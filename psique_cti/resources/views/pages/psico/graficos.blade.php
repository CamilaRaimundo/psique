@extends('layout.site')

@section('titulo', 'Estatísticas')
    
@section('conteudo')

<div class="container-home_pro">

  <div class="container text-center">
    <div class="row justify-content-md-center">

        <h1 class="pergunta"><b>Análise gráfica</b></h1>  

        <div class="container-graphic">
            <canvas class="pie-chart"></canvas>
            {{-- o total de alunos divididos pelos sentimentos diários  --}}
        </div>
       
        <div class="container-graphic">
            <canvas class="bar-chart"></canvas>
            {{-- média de emoçoes tidas ao mês --}}
        </div>
    </div>
  </div>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script>
    var ctx = document.getElementsByClassName("pie-chart");
    // import { Colors } from 'chart.js';
    // type, data e options
    var chartGraph = new Chart(ctx, {
        type: 'pie',
        data:{
          // eixo X
          labels: ["Felicidade", "Tristeza", "Raiva", "Confusão", "Medo", "Estresse", "Paixão", "Animação"],
          datasets: [{
            // legenda
            // label: "Taxas de acesso",
            // eixo Y
            data: [5,10,15,5,10,15,5,10],
            // cores
            borderColor: [
              'rgba(255,215,0)', 
              'rgba	(220,220,220)',
              'rgba(255,0,0)',
              'rgba(220,20,60)', 
              'rgba(128,0,128)', 
              'rgba(255,140,0)',
              'rgba(139,0,0)', 
              'rgba(70,130,180)',
            ],
            backgroundColor: [
              'rgba(255,215,0)', 
              'rgba	(220,220,220)',
              'rgba(255,0,0)',
              'rgba(220,20,60)', 
              'rgba(128,0,128)', 
              'rgba(255,140,0)',
              'rgba(139,0,0)', 
              'rgba(70,130,180)',
            ]
          }]
        //  para adicionar outro dataset precisa apenas colocar uma vírgula e abrir uma colchete
        },
        options: {
          title: {
            display: true,
            fontSize: 20,
            text: 'Sentimento por aluno',
            color: 'rgba(0,0,0)',
          },
        }
    });
    
    var ctx = document.getElementsByClassName("bar-chart");

    // type, data e options
    var chartGraph = new Chart(ctx, {
        type: 'pie',
        data:{
          // eixo X
          labels: ["Felicidade", "Tristeza", "Raiva", "Confusão", "Medo", "Estresse", "Paixão", "Animação"],
          datasets: [{
            // legenda
            // label: "Taxas de acesso",
            // eixo Y
            data: [5,10,15,5,10,15,5,10],
            // cores
            borderColor: [
              'rgba(255,215,0)', 
              'rgba	(220,220,220)',
              'rgba(255,0,0)',
              'rgba(220,20,60)', 
              'rgba(128,0,128)', 
              'rgba(255,140,0)',
              'rgba(139,0,0)', 
              'rgba(70,130,180)',
            ],
            backgroundColor: [
              'rgba(255,215,0)', 
              'rgba	(220,220,220)',
              'rgba(255,0,0)',
              'rgba(220,20,60)', 
              'rgba(128,0,128)', 
              'rgba(255,140,0)',
              'rgba(139,0,0)', 
              'rgba(70,130,180)',
            ]
          }]
        //  para adicionar outro dataset precisa apenas colocar uma vírgula e abrir uma colchete
        },
        options: {
          title: {
            display: true,
            fontSize: 20,
            text: 'Sentimento por aluno',
            color: '#fff'
          },
        }
    });

    // var ctx = document.getElementsByClassName("bar-chart");
    // var chartGraph = new Chart(ctx, {
    //     type: 'pie',
    //     labels: ["Felicidade", "Tristeza", "Raiva"],
    //     datasets: [{
    //       // label: 'My First Dataset',
    //       data: [65, 59, 80],
    //       backgroundColor: [
    //         'rgba(255, 99, 132, 0.2)',
    //         'rgba(255, 159, 64, 0.2)',
    //         'rgba(255, 205, 86, 0.2)'
    //       ],
    //       borderColor: [
    //         'rgb(255, 99, 132)',
    //         'rgb(255, 159, 64)',
    //         'rgb(255, 205, 86)',
    //       ],
    //       // borderWidth: 1
    //     }],
    //     options: {
    //       title: {
    //         display: true,
    //         fontSize: 20,
    //         text: 'Total de emoções'
    //       },
    //     }
    // });
  </script>
</div>
@endsection