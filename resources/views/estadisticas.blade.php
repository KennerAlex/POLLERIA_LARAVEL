@extends('layouts.plantilla')
@section('content')
<h1> Estadisticas</h1>
    <div style="">
            <div class="row">
                <div class="col-6" style=" padding: 30px;">
                    <h2>Platos más vendidos</h2>
                    <div class="col-10"> <canvas id="myChart"></canvas></div>   
                </div>
                <div class="col-6" style=" padding: 30px;">
                    <h2>Ingresos por Mes</h2>
                    <canvas id="myChart1"></canvas>
                </div>
                <div class="col-6" style=" padding: 30px;">
                    <h2>Pedidos por Delivery</h2>
                    <canvas id="myChart2"></canvas>
                </div>
                <div class="col-6" style=" padding: 30px;">
                    <h2>Stock Diario</h2>
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
        $(document).ready(function(){
            $.ajax({
                url:"estadisticas/ingresos",
                method:'POST',
                data:{
                    id:1,
                    _token:$('input[name="_token"]').val()
                }
            
            }).done(function(res){
                var arreglo=JSON.parse(res);

                for(var x=0;x<arreglo.length;x++){
                   ingresos.push(arreglo[x].ingresos);
                   mes.push(arreglo[x].mes);
                
                }
                generarGrafica1();
            })
        })
        $(document).ready(function(){
            $.ajax({
                url:"estadisticas/delivery",
                method:'POST',
                data:{
                    id:1,
                    _token:$('input[name="_token"]').val()
                }
            
            }).done(function(res){
                var arreglo=JSON.parse(res);

                for(var x=0;x<arreglo.length;x++){
                   cantidaddelivery.push(arreglo[x].cantidad);
                
                }
                generarGrafica2();
            })
        })
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
     function generarGrafica(){
      const ctx = document.getElementById('myChart');
    
      new Chart(ctx, {
        type: 'pie',
        data: {
          labels: platos,
          datasets: [{
            label: 'Cantidad',
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
      function generarGrafica1(){
      const ctx = document.getElementById('myChart1');
    
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: mes,
          datasets: [{
            label: 'Ingreso en soles',
            data: ingresos,
            backgroundColor: [
                'rgba(255, 205, 86, 0.2)',
            ],
            borderColor: [
                'rgb(255, 205, 86)',  
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
      function generarGrafica2(){
      const ctx = document.getElementById('myChart2');
    
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['NO','SI'],
          datasets: [{
            label: 'Solicitud de delivery',
            data: cantidaddelivery,
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
            ],
            borderColor: [
              'rgb(255, 99, 132)',  
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