 @extends('template.master_usuario')

 @section('contenido_central') 

 <script src="{!!asset('code/highcharts.js') !!}"></script>
  <script src="{!!asset('code/modules/exporting.js') !!}"></script>
   <script src="{!!asset('code/modules/export-data.js') !!}"></script>
 <h1>Graficas</h1>

<?php
$campos = "";  
foreach ($generos as $genero) {
	$total = $genero->canciones->count(); 
	$campos = $campos . "[ '".$genero->nombre."',".$total."],";
}
?> 

 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Canciones'
    },
    subtitle: {
        text: 'Recopiladas por genero'
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
            text: 'Numero de canciones'
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
