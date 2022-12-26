<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Boleta de Venta</h1>
    <h3>Nombre Cliente: </h3> 
    <p>{{$pedido->nombreCliente}}</p>
    <h3>Apellidos Cliente:</h3>
    <p>{{$pedido->apellidosCliente}}</p>
    <h3>Correo: </h3><p>{{$pedido->correo}}</p>
    <h3>Telefono: </h3><p>{{$pedido->celular}}</p>
    <h3>Dirección: </h3><p>{{$pedido->direccion}}</p>

    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Costo</th>        
          </tr>
        </thead>
        <tbody>   
          @foreach ($pedido->detalle as $detalle)
            
          @endforeach
           <tr>
            <td>{{$detalle->plato->nombre}}</td>
            <td>{{$detalle->cantidad}}</td>
            <td>{{$detalle->precio}}</td>
            </tr>                      
        </tbody>
        <tfoot>
          <tr>
            <td>Total</td>
            <td>S/.{{ $pedido->monto }}</td>
          </tr>
        </tfoot>
      </table>
</body>
</html>