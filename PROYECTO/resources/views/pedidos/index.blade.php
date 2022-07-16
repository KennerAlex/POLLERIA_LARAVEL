@extends('layouts.plantilla')
@section('content')
<div class="row ">
    {{-- <div id="separator-ribbon" class="justify-content-center">
      <div class="content" style="background-color: yellow;"> 
        <div class="row justify-content-center"> --}}
          <h1 style="font-family: serif; font-size: 30pt; font-size-adjust: 1.2 d-no d-md-block ; text-decoration: underline; font-weight: bolder;">Registro de pedidos</h1>
        {{-- </div>    
      </div>
    </div> --}}
  </div>
 

    <form action="">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pedidos</h3>
  
             
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>NumeroPedido</th>
                    <th>idMenu</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Costo</th> 
                    <th>Eliminar</th>       
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $item)
                   <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->idmenu}}</td>
                    <td>{{$item->nombreCliente}}</td>
                    <td>{{$item->apellidosCliente}}</td>
                    <td>{{$item->correo}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->direccion}}</td>
                    <td>{{$item->cantidad}}</td>
                    <td>{{$item->descripcion}}</td>
                    <td>S/.{{$item->costo}}</td>
                    <td>
                      <div class="row">
                        <div class="col col-sm-12">
                          <form action="{{route('pedidos.destroy', $item->id)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}} 
                            <i class="fas fa-trash-alt"></i>   
                            <input type="submit" class="btn btn-warning btn-sm border-dark"  value="Borrar">   
                        </form>
                        <br>
                        </div>                    
                       <div class="col col-sm-12">
                         <form action="{{route('pdf',$item->id)}}">
                          <i class="fas fa-clipboard-list"></i>
                          <input type="submit"  class="btn btn-warning btn-sm border-dark"  value="Generar Boleta">
                         </form>
                       </div>       
                      </div>
                    </td>
                     </tr>     
                    @endforeach             
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
       
    </form>
    


@endsection