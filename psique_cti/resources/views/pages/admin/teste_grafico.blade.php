<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TESTE</title>
</head>
<body>
    
    {{-- inicio da criação --}}
    <div class="container-graphic">
        <canvas class="pie-chart"></canvas>
    </div>

    <!-- Include Chart.js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script>
        var ctx = document.getElementsByClassName("pie-chart");

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
                text: 'RELATÓRIO MT DOIDO'
              },
            }
            // 28:37
        });
    </script>
</body>
</html>