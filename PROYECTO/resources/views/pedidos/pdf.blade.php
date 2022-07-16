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
    <h3>Telefono: </h3><p>{{$pedido->telefono}}</p>
    <h3>Dirección: </h3><p>{{$pedido->direccion}}</p><br><br>
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>NumeroPedido</th>
            <th>idMenu</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Costo</th>        
          </tr>
        </thead>
        <tbody>   
           <tr>
            <td>{{$pedido->id}}</td>
            <td>{{$pedido->idmenu}}</td>
            <td>{{$pedido->cantidad}}</td>
            <td>{{$pedido->descripcion}}</td>
            <td>{{$pedido->costo}}</td>
            </tr>                      
        </tbody>
      </table>
</body>
</html>