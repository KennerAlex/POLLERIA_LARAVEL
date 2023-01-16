@extends('layouts.plantilla')
@section('content')
<link href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
		rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="libs/bootstrap-datepicker/css/bootstrap-datepicker.css">
<style>
  label{margin-left: 20px;}
  .combofecha{width:500px;}
  .combofecha > span:hover{cursor: pointer;}
</style>

  <div class="container text-center">
   <h1> Estadisticas</h1>
      <div  class="row justify-content-md-center">
        <div class="col-6">
          <form  method="POST">
            @csrf
            <div class="input-daterange input-group combofecha " id="datepicker">
              <input type="text" class="input-sm form-control" name="desde" id="desde"  value="2023-01-01" onchange="traerEstadistica()"/>
              <span class="input-group-addon">hasta</span>
              <input type="text" class="input-sm form-control" name="hasta" id="hasta" value="2023-06-01" onchange="traerEstadistica()"/>
            </div>
        </form>
        </div>
      </div>
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
function cargarvendidos(){
  $.ajax({
                url:"estadisticas/vendidos",
                method:'POST',
                data:{
                    id:1,
                    desde:$('#desde').val(),
                    hasta:$('#hasta').val(),
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
}
function cargaringresos(){
  $.ajax({
                url:"estadisticas/ingresos",
                method:'POST',
                data:{
                    id:1,
                    desde:$('#desde').val(),
                    hasta:$('#hasta').val(),
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
}
function cargardelivery(){
  $.ajax({
                url:"estadisticas/delivery",
                method:'POST',
                data:{
                    id:1,
                    desde:$('#desde').val(),
                    hasta:$('#hasta').val(),
                    _token:$('input[name="_token"]').val()
                }
            
            }).done(function(res){
                var arreglo=JSON.parse(res);

                for(var x=0;x<arreglo.length;x++){
                   cantidaddelivery.push(arreglo[x].cantidad);
                
                }
                generarGrafica2();
            })
}
        $(document).ready(function(){   
            cargarvendidos();
        })
        $(document).ready(function(){
            cargaringresos();
        })
        $(document).ready(function(){
           cargardelivery();
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
    
     
   function traerEstadistica(){
     cargardelivery();
     cargaringresos();
     cargarvendidos();
    }
    $('.combofecha').datepicker({
        format: "yyyy-mm-dd",
        todayBtn: "linked",
        language: "es",
        autoclose: true,
        beforeShowYear: function(date){
              if (date.getFullYear() == 2007) {
                return false;
              }
            },  
        });
    </script>
{{-- 
// DATEPICKER --}}
<script src=
"https://code.jquery.com/jquery-3.6.1.min.js" 
        integrity=
"sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
        crossorigin="anonymous">
    </script>
      
    <script src=
"https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
        integrity=
"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous">
    </script>
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity=
"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
@endsection