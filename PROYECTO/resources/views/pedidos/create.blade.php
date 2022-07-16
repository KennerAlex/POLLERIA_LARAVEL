@extends('layouts.plantilla')
@section('content')
            
<div class="row ">
  <div id="separator-ribbon" class="justify-content-center">
    <div class="content" style="background-color: yellow;"> 
      <div class="row justify-content-center">
        <h1 style="font-family: serif; font-size: 30pt; font-size-adjust: 1.2 d-no d-md-block ; text-decoration: underline; font-weight: bolder;">Registrar Plato de Pollo a Brasa</h1>
      </div>    
    </div>
  </div>
 </div>
    
    <div class="card-body ">
        <form class="was-validated " action="{{route('pedidos.store')}}" class="form-control" method="post">
          @csrf
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <input type="text" id="idmenu" name="idmenu" class="form-control" value="{{$plato->id}}" hidden >
              </div>
            </div>    
          </div>
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <input type="text" id="" name="" class="form-control" value="{{$plato->nombre}}" disabled>
              </div>
            </div>    
          </div>     <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <input type="text" id="costo" name="costo" class="form-control" value="{{$plato->precio}}" disabled>
              </div>
            </div>    
          </div>
         
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Nombre del  Cliente</label>
                <input type="text" id="txtNombrecliente" name="txtNombrecliente" class="form-control" placeholder="Enter ..." required>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>
            </div>    
          </div>
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Apellido del  Cliente</label>
                <input type="text" id="" name="txtApellidocliente" class="form-control" placeholder="Enter ..." required>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>
            </div>    
          </div>
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Correo</label>
                <input type="email" id="" name="txtCorreo" class="form-control" placeholder="Enter ..." required>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>
            </div>    
          </div>
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Telefono</label>
                <input type="phone" id="" name="txtTelefono" class="form-control" placeholder="Enter ..." required>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>
            </div>    
          </div>
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Dirección</label>
                <input type="text" id="" name="txtDireccion" class="form-control" placeholder="Enter ..." required>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>
            </div>    
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Cantidad</label>
                <input type="number" name="txtCantidad" min="1" id="cantidad" class="form-control"  placeholder="Enter ..." oninput="multiplicar()">
                <div class="invalid-feedback">
                 (Solo se permiten números).
                 </div>         
              </div>
            </div>    
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <!-- textarea -->
              <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control"name="txtDescripcion" rows="3" placeholder="Enter ..." required></textarea>
                <div class="valid-feedback">
                  Campo obligatorio
                </div>
              </div>
            </div>
            
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Precio</label>
                <input type="number" name="txtCosto"  step="0.01" min="1" id="Precio" class="form-control"  placeholder="Enter ..." required>
                <div class="invalid-feedback">
                 (Solo se permiten números).
                 </div>         
              </div>
            </div>    
          </div>   
          <div class="row justify-content-center">
            <input type="submit" class="btn bg-warning" value="Registrar" ></button>
          </div> 
        </form>
      </div>                  
@endsection
@section('calcular')
    <script>
      function multiplicar(){
          m1 = parseFloat(document.getElementById("costo").value)||0;
          m2 = parseFloat(document.getElementById("cantidad").value)||0;
          r = m1*m2;
          document.getElementById("Precio").value = r;  
      }    
    </script>
@endsection