var ctx = document.getElementById('graficoSabor').getContext('2d');
var SaborAlimento = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1 estrela', '2 estrelas', '3 estrelas', '4 estrelas', '5 estrelas', 'Média Ponderada'],
        datasets: [{
            label: 'Sabor do Alimento',
            data: [0,0,0,0,0,0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx2 = document.getElementById('graficoCardapio').getContext('2d');
var Cardapio = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['1 estrela', '2 estrelas', '3 estrelas', '4 estrelas', '5 estrelas', 'Média Ponderada'],
        datasets: [{
            label: 'Cardapio',
            data: [0,0,0,0,0,0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx3 = document.getElementById('graficoHigiene').getContext('2d');
var Higiene = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: ['1 estrela', '2 estrelas', '3 estrelas', '4 estrelas', '5 estrelas', 'Média Ponderada'],
        datasets: [{
            label: 'Higiene do Local',
            data: [0,0,0,0,0,0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx4 = document.getElementById('graficoAmbiente').getContext('2d');
var Ambiente = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ['1 estrela', '2 estrelas', '3 estrelas', '4 estrelas', '5 estrelas', 'Média Ponderada'],
        datasets: [{
            label: 'Ambiente',
            data: [0,0,0,0,0,0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

function ajaxvotacao(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
      'processing': true, 
      'serverSide': true,
        type: "GET",
        data: {
            data: $("#data_rel").val(),
            refeicao: $("#refeicao").val()
        },
        url: "/refeicao_dia",
        datatype: "json",
        success: function(response) {
            if(response == 'null'){
                $('#graficoSabor').hide();
                $('#graficoCardapio').hide();
                $('#graficoHigiene').hide();
                $('#graficoAmbiente').hide();
                $('#graficos2').html("<h5 class='text-center margin-top-10'>Desculpe-nos, não encontramos votação para esta combinação de refeição e dia.</h5>");
            }else{
                $('#graficos2').html("");
                $('#graficoSabor').show();
                $('#graficoCardapio').show();
                $('#graficoHigiene').show();
                $('#graficoAmbiente').show();
                var sa = (response['estrelaSabor1']*1+response['estrelaSabor2']*2+response['estrelaSabor3']*3+response['estrelaSabor4']*4+response['estrelaSabor5']*5)/(1+2+3+4+5);
                var ca = (response['estrelaCardapio1']*1+response['estrelaCardapio2']*2+response['estrelaCardapio3']*3+response['estrelaCardapio4']*4+response['estrelaCardapio5']*5)/(1+2+3+4+5);
                var hi = (response['estrelaHigiene1']*1+response['estrelaHigiene2']*2+response['estrelaHigiene3']*3+response['estrelaHigiene4']*4+response['estrelaHigiene5']*5)/(1+2+3+4+5);
                var am = (response['estrelaAmbiente1']*1+response['estrelaAmbiente2']*2+response['estrelaAmbiente3']*3+response['estrelaAmbiente4']*4+response['estrelaAmbiente5']*5)/(1+2+3+4+5);
                SaborAlimento.data.datasets[0].data = [response['estrelaSabor1'], response['estrelaSabor2'], response['estrelaSabor3'], response['estrelaSabor4'], response['estrelaSabor5'], sa];
                SaborAlimento.update();
                Cardapio.data.datasets[0].data = [response['estrelaCardapio1'], response['estrelaCardapio2'], response['estrelaCardapio3'], response['estrelaCardapio4'], response['estrelaCardapio5'], ca];
                Cardapio.update();
                Higiene.data.datasets[0].data = [response['estrelaHigiene1'], response['estrelaHigiene2'], response['estrelaHigiene3'], response['estrelaHigiene4'], response['estrelaHigiene5'], hi];
                Higiene.update();
                Ambiente.data.datasets[0].data = [response['estrelaAmbiente1'], response['estrelaAmbiente2'], response['estrelaAmbiente3'], response['estrelaAmbiente4'], response['estrelaAmbiente5'], am];
                Ambiente.update();
            }
        }
    });
}

$( document ).ready(function() {
    ajaxvotacao();
});