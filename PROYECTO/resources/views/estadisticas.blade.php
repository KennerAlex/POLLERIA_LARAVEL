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


    {{-- <div class="row">
      <!-- filtros -->
         <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="dtpFechaDesdePlato" class = "control-label" >F. Desde:</label>
           
             <div style="position:relative;" >
               <input type="text" class="form-control has-feedback-left" id="dtpFechaDesdePlato" aria-describedby="inputSuccess2Status4">
               <span style="left: 0px;" class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
               <span id="inputSuccess2Status4" class="sr-only">(success)</span>
             </div>
         </div>
         
         <div class="col-md-6 col-sm-6 col-xs-12">
            <label for="dtpFechaHastaPlato" class = "control-label" >F. Hasta:</label>
           
             <div style="position:relative;" >
               <input type="text" class="form-control has-feedback-left" id="dtpFechaHastaPlato" aria-describedby="inputSuccess2Status4">
               <span style="left: 0px;" class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
               <span id="inputSuccess2Status4" class="sr-only">(success)</span>
             </div>
         </div>
   </div>

   <div class="row">
     <figure class="highcharts-figure">
       <div id="graficaCantidadPlato">

       </div>
     </figure>
   </div> --}}
   @if (session('status'))
       <br>
       {{session('status')}}
   @endif
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"></script>
   {{-- <script>
      function mostrargraficaPlato(e,fechaDesdePlato, fechaHastaPlato){
    	if(typeof fechaDesdePlato === 'undefined'){
    		var param_fechaDesde = cambiarFormatoFechaToSQL(dtpFechaDesdePlato.value);	
    		console.log('FDCC=U:',fechaDesdePlato,param_fechaDesde)	
    	}
    	else{
    		var param_fechaDesde = fechaDesdePlato;
    		console.log('FDCC=V:',fechaDesdePlato,param_fechaDesde)	
    	}
    
    	if(typeof fechaHastaPlato === 'undefined')
    		var param_fechaHasta = cambiarFormatoFechaToSQL(dtpFechaHastaPlato.value);
    	else
    		var param_fechaHasta = fechaHastaPlato;
    
    	var param_idTrabajador = cboVendedorCantClientesNuevos.value;
    
    
    	$.ajax({
    		type: 'POST',
    		data: 'param_opcion=getgraficaCantidadClientesNuevos' + 
    				'&param_fechaDesde='+ param_fechaDesde + 
    				'&param_fechaHasta='+ param_fechaHasta + 
    				'&param_idTrabajador='+ param_idTrabajador, 
    		url: '../../controller/controlDashboard/controlDashboardVentas.php',
    		success: function(data){
    			objeto = JSON.parse(data);
        
    			if( objeto.success == 1){
    				var chartdata = {
    					chart: {
    						plotBackgroundColor: null,
    						plotBorderWidth: null,
    						plotShadow: false,
    						type: 'pie'
    					},
    					title: {
    						text: 'Cantidad de Clientes Nuevos Registrados por Mes por Vendedor'
    					},
    					tooltip: { 
    						pointFormat: 'Porcentaje: <b>{point.percentage:.1f}%</b> <br> Cantidad: <b> {point.y:.0f} </b>'
    					},
    					accessibility: {
    						point: {
    							valueSuffix: '%'
    						}
    					},
    					plotOptions: {
    						pie: {
    							allowPointSelect: true,
    							cursor: 'pointer',
    							dataLabels: {
    								enabled: true,
    								format: '<b>{point.name}</b>: {point.y:.1f} ',
    								style: {
    									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
    								}
    							},
    							showInLegend: true
    						}
    					},
    					credits: {
    						enabled: false
    					},
    					series: [{
    						name: 'Categorías',
    						colorByPoint: true,
    						data: [{
    							name: 'Categoría 01',
    							y: 2400
    							//, sliced: true,
    							//selected: true
    						}, {
    							name: 'Categoría 02',
    							y: 4600
    						}]
    					}]
    				};
          
    				serie = [];
                	for (var i=0; i< objeto.data.length; i++) {
    					serie.push( { "name": objeto.data[i]["NombreCompleto"], "y": parseFloat(objeto.data[i]["CantidadClientes"]) });	
    				}
          
                	chartdata.series[0].data = serie;				
    				$('#graficaCantidadClientesNuevos').highcharts(chartdata);
    			}			
    		},
    		error:function(data){
    			alert('Error al mostrar');
    		}
    	});
    }
   </script> --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endsection