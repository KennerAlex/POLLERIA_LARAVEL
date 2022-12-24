@extends('layouts.plantilla')
@section('content')
<div class="row ">
  {{-- <div id="separator-ribbon" class="justify-content-center">
    <div class="content" style="background-color: yellow;"> 
      <div class="row justify-content-center"> --}}
        <h1 style="font-family: serif; font-size: 30pt; font-size-adjust: 1.2 d-no d-md-block ; text-decoration: underline; font-weight: bolder;">Registrar Nuevo Rol</h1>
      {{-- </div>    
    </div>
  </div> --}}
 </div>
    
    <div class="card-body ">
        <form class="was-validated " action="{{route('tipoUsuario.store')}}" class="form-control" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row justify-content-center" >
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Rol:</label>
                <input type="text" id="fname" name="txtRol" class="form-control" placeholder="Enter ..." required>
                <div class="valid-feedback">
                  Campo obligatorio
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