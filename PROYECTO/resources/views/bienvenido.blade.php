@extends('layouts.plantilla')
@section('content')
<h1>Estadisticas</h1>
    <div style="margin: 40px; width:400px;">
      <canvas id="myChart"></canvas>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        var platos=[];
        var cantidad=[];
        $(document).ready(function(){
            $.ajax({
                url:"estadisticas/vendidos",
                method:'POST',
                data:{
                    id:1,
                    _token:$('input[name="_token"]').val()
                }
            
            }).done(function(res){
                var arreglo=JSON.parse(res);

                for(var x=0;x<arreglo.length;x++){
                   platos.push(arreglo[x].nombre);
                   cantidad.push(arreglo[x].cantidad);
                
                }
                generarGrafica();
            })
        })

     function generarGrafica(){
      const ctx = document.getElementById('myChart');
    
      new Chart(ctx, {
        type: 'pie',
        data: {
          labels: platos,
          datasets: [{
            label: 'Cantidad:',
            data: cantidad,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });}
    </script>

   @if (session('status'))
       <br>
       {{session('status')}}
   @endif
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"></script>
   
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endsection