@extends('layout.site')

@section('titulo', 'Estatísticas')
    
@section('conteudo')

<div class="container text-center">
    <div class="row justify-content-md-center">

        <h1 class="pergunta"><b>Análise gráfica</b></h1>  

        <div class="container-graphic">
            <canvas class="line-chart"></canvas>
        </div>
       
        <div class="container-graphic">
            <canvas class="line-chart2"></canvas>
        </div>
        
        {{-- <div class="container-graphic">
            <canvas class="line-chart3"></canvas>
        </div> --}}

    </div>
</div>
    

    <!-- Include Chart.js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script>
        var ctx = document.getElementsByClassName("line-chart");

        // type, data e options
        var chartGraph = new Chart(ctx, {
            type: 'pie',
            data:{
                // eixo X
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    // legenda
                    label: "Taxas de acesso",
                    // eixo Y
                    data: [5,5,10,15,10,20,25,15,5,10,25,5],
                    // espessura da linha
                    // borderWidth: 6,
                    // cor da linha
                    borderColor: [
                      'rgba(123,104,238,0.85)', 
                      'rgba(255,105,180,0.85)',
                      'rgba(139,0,0,0.85)',
                      'rgba(152,251,152,0.85)', 
                      'rgba(127,255,0,0.85)',
                      'rgba(188,143,143,0.85)',
                      'rgba(216,191,216,0.85)', 
                      'rgba(175,238,238,0.85)',
                      'rgba(218,165,32,0.85)',
                      'rgba(0,255,0,0.85)', 
                      'rgba(255,140,0,0.85)',
                      'rgba(72,61,139,0.85)',

                    ],
                    backgroundColor: [
                      'rgba(123,104,238,0.85)', 
                      'rgba(255,105,180,0.85)',
                      'rgba(139,0,0,0.85)',
                      'rgba(152,251,152,0.85)', 
                      'rgba(127,255,0,0.85)',
                      'rgba(188,143,143,0.85)',
                      'rgba(216,191,216,0.85)', 
                      'rgba(175,238,238,0.85)',
                      'rgba(218,165,32,0.85)',
                      'rgba(0,255,0,0.85)', 
                      'rgba(255,140,0,0.85)',
                      'rgba(72,61,139,0.85)',
                    ]
                 }]
                //  para adicionar outro dataset precisa apenas colocar uma vírgula e abrir uma colchete
            },
            options: {
              title: {
                display: true,
                fontSize: 20,
                text: 'Sentimento por aluno'
              },
            }
            // 28:37
        });

        var ctx = document.getElementsByClassName("line-chart2");

        // type, data e options
        var chartGraph = new Chart(ctx, {
            type: 'bar',
            data:{
                // eixo X
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    // legenda
                    label: "Taxas de acesso",
                    // eixo Y
                    data: [5,5,10,15,10,20,25,15,5,10,25,5],
                    // espessura da linha
                    // borderWidth: 6,
                    // cor da linha
                    borderColor: [
                      'rgba(77,166,253,0.85)', 
                      'rgba(75,166,253,0.85)',
                      'rgba(76,166,253,0.85)',
                      'rgba(78,166,253,0.85)', 
                      'rgba(79,166,253,0.85)',
                      'rgba(80,166,253,0.85)',
                      'rgba(50,166,253,0.85)', 
                      'rgba(82,166,253,0.85)',
                      'rgba(78,166,253,0.85)',
                      'rgba(98,166,253,0.85)', 
                      'rgba(21,166,253,0.85)',
                      'rgba(13,166,253,0.85)',

                    ],
                    backgroundColor: [
                    'rgba(77,166,253,0.85)', 
                      'rgba(75,166,253,0.85)',
                      'rgba(76,166,253,0.85)',
                      'rgba(78,166,253,0.85)', 
                      'rgba(79,166,253,0.85)',
                      'rgba(80,166,253,0.85)',
                      'rgba(50,166,253,0.85)', 
                      'rgba(82,166,253,0.85)',
                      'rgba(78,166,253,0.85)',
                      'rgba(98,166,253,0.85)', 
                      'rgba(21,166,253,0.85)',
                      'rgba(13,166,253,0.85)',
                    ]
                 }]
                //  para adicionar outro dataset precisa apenas colocar uma vírgula e abrir uma colchete
            },
            options: {
              title: {
                display: true,
                fontSize: 20,
                text: 'Total de emoções'
              },
            }
            // 28:37
        });
        
        var ctx = document.getElementsByClassName("line-chart3");

        // type, data e options
        var chartGraph = new Chart(ctx, {
            type: 'pie',
            data:{
                // eixo X
                labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    // legenda
                    label: "Taxas de acesso",
                    // eixo Y
                    data: [5,5,10,15,10,20,25,15,5,10,25,5],
                    // espessura da linha
                    // borderWidth: 6,
                    // cor da linha
                    borderColor: [
                      'rgba(123,104,238,0.85)', 
                      'rgba(255,105,180,0.85)',
                      'rgba(139,0,0,0.85)',
                      'rgba(152,251,152,0.85)', 
                      'rgba(127,255,0,0.85)',
                      'rgba(188,143,143,0.85)',
                      'rgba(216,191,216,0.85)', 
                      'rgba(175,238,238,0.85)',
                      'rgba(218,165,32,0.85)',
                      'rgba(0,255,0,0.85)', 
                      'rgba(255,140,0,0.85)',
                      'rgba(72,61,139,0.85)',

                    ],
                    backgroundColor: [
                      'rgba(123,104,238,0.85)', 
                      'rgba(255,105,180,0.85)',
                      'rgba(139,0,0,0.85)',
                      'rgba(152,251,152,0.85)', 
                      'rgba(127,255,0,0.85)',
                      'rgba(188,143,143,0.85)',
                      'rgba(216,191,216,0.85)', 
                      'rgba(175,238,238,0.85)',
                      'rgba(218,165,32,0.85)',
                      'rgba(0,255,0,0.85)', 
                      'rgba(255,140,0,0.85)',
                      'rgba(72,61,139,0.85)',
                    ]
                 }]
                //  para adicionar outro dataset precisa apenas colocar uma vírgula e abrir uma colchete
            },
            options: {
              title: {
                display: true,
                fontSize: 20,
                text: 'RELATÓRIO MT DOIDO'
              },
            }
            // 28:37
        });
    </script>
@endsection