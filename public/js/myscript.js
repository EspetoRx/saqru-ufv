var ctx = document.getElementById('graficos').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Sabor do alimento', 'Cardápio', 'Higiene do Local', 'Ambiente', 'Média'],
        datasets: [{
            label: 'Média da Votação coletada para este dia',
            data: [0, 0, 0, 0, 0],
            backgroundColor: [
                'rgba(121, 29, 31, 0.3)',
                'rgba(195, 166, 59, 0.3)',
                'rgba(121, 29, 31, 0.3)',
                'rgba(195, 166, 59, 0.3)',
                'rgba(0, 0, 0, 0.2)',
            ],
            borderColor: [
                'rgba(121, 29, 31, 1)',
                'rgba(195, 166, 59, 1)',
                'rgba(121, 29, 31, 1)',
                'rgba(195, 166, 59, 1)',
                'rgba(0, 0, 0, 1)',
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

function ajaxcardapio(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
      'processing': true, 
      'serverSide': true,
        type: "GET",
        data: {day: $("#data_cardapio").val()},
        url: "/cardapio_dia",
        datatype: "json",
        beforeSend: function() {
            $('#mensagem_cardapio').show();
        },
        success: function(cardapio) {
            $('#mensagem_cardapio').hide();
            var parser = JSON.parse(cardapio);
            if (typeof parser !== 'undefined' && parser.length > 0) {
            var string = '<div>';
            for(var k in parser){
                if(parser[k].tipo_refeicao == 1){
                    string += '<p class="cardapio-title">Café da Manhã</p>';
                }else if(parser[k].tipo_refeicao == 2){
                    string += '<p class="cardapio-title">Almoço</p>';
                }else if(parser[k].tipo_refeicao == 3){
                    string += '<p class="cardapio-title">Jantar</p>';
                }
                string += '<ul>';
                var lines = parser[k].cardapio.split('\n');
                for(var j in lines){
                    string += '<li>' + lines[j] + '</li>';
                }
                string += '</ul>'
            }
            string += '</div>';
            $('#include_cardapio').html(string);
        }else{
            var string = '<p class="table-margin text-center">Desculpe-nos não foi possível encontrar nenhum resultado. =(</p>';
            $('#include_cardapio').html(string);
        }
        }
    });
}

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
        beforeSend: function() {
            $('#mensagem_grafico').show();
        },
        success: function(response) {
            if(response == 'null'){
                $('#graficos').hide();
                $('#mensagem_grafico').hide();
                $('#graficos2').html("<h5 class='text-center margin-top-10'>Desculpe-nos, não encontramos votação para esta combinação de refeição e dia.</h5>");
            }else{
                $('#graficos2').html("");
                $('#mensagem_grafico').hide();
                $('#graficos').show();
                var sa = (response['estrelaSabor1']*1+response['estrelaSabor2']*2+response['estrelaSabor3']*3+response['estrelaSabor4']*4+response['estrelaSabor5']*5)/(1+2+3+4+5);
                var ca = (response['estrelaCardapio1']*1+response['estrelaCardapio2']*2+response['estrelaCardapio3']*3+response['estrelaCardapio4']*4+response['estrelaCardapio5']*5)/(1+2+3+4+5);
                var hi = (response['estrelaHigiene1']*1+response['estrelaHigiene2']*2+response['estrelaHigiene3']*3+response['estrelaHigiene4']*4+response['estrelaHigiene5']*5)/(1+2+3+4+5);
                var am = (response['estrelaAmbiente1']*1+response['estrelaAmbiente2']*2+response['estrelaAmbiente3']*3+response['estrelaAmbiente4']*4+response['estrelaAmbiente5']*5)/(1+2+3+4+5);
                var media = (sa+ca+hi+am)/4;
                myChart.data.datasets[0].data = [sa, ca, hi, am, media];
                myChart.update();
            }
        }
    });
}

$( window ).on("load", function() {
    this.setTimeout(function(){
        $(".se-pre-con").fadeOut("slow");
    }, 2000);
});

$( document ).ready(function() {
    ajaxcardapio();
    ajaxvotacao();
});

