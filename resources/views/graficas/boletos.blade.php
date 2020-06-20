 @extends('template.master_artista')

 @section('contenido_central') 

 <script src="{!!asset('code/highcharts.js') !!}"></script>
  <script src="{!!asset('code/modules/exporting.js') !!}"></script>
   <script src="{!!asset('code/modules/export-data.js') !!}"></script>
 <h1>Graficas</h1>

<?php
$campos = "";  
foreach ($boletos as $boleto) {
	if ($boleto->evento->artista_id == $artista) {
		$total = $boleto->compra->count(); 
	$campos = $campos . "[ '".$boleto->evento->nombre_locacion."',".$total."],";
	}
}
?> 

 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Boletos'
    },
    subtitle: {
        text: 'Vendidos'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Numero de boletos vendidos'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Population',
        data: [
           <?= $campos ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
		</script>
@endsection 
