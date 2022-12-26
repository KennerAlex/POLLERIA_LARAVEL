@extends('layouts.plantilla')
@section('content')
<h1>Bienvenido</h1>
<p>Se le muestra el stock Disponible de hoy</p>

<div style="">
        <div class="row">  
            <div class="col-10" style=" padding: 30px;">     
                <canvas id="myChart3"></canvas>
            </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var platos=[];
    var cantidad=[];
    var ingresos=[];
    var mes=[];
    var cantidaddelivery=[];
    var stock=[];
    var platosStock=[];

   
    $(document).ready(function(){
        $.ajax({
            url:"estadisticas/stock",
            method:'POST',
            data:{
                id:1,
                _token:$('input[name="_token"]').val()
            }
        
        }).done(function(res){
            var arreglo=JSON.parse(res);

            for(var x=0;x<arreglo.length;x++){
               platosStock.push(arreglo[x].nombre);
               stock.push(arreglo[x].stockDiario);
            }
            generarGrafica3();
        })
    })
 
  function generarGrafica3(){
  const ctx = document.getElementById('myChart3');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: platosStock,
      datasets: [{
        label: 'Disponible',
        data: stock,
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
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
@endsection