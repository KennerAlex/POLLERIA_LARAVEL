@extends('layouts.plantilla')
@section('content')
<div style="" class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card" style=" margin-top: 20px">
                        <div class="card-header" style="font-size: 40px">Editar Trabajador Trabajador</div>
                      <div class="card-body">
                        <form action="{{ route('trabajadores.update',['trabajadore'=>$trabajador->id])}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $trabajador->nombre }}"  required>
                              </div>
                              <div class="form-group col-4">
                                <label for="apellidoPaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="{{ $trabajador->apellidoPaterno}}" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="apellidoMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="{{ $trabajador->apellidoMaterno}}" required>
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="estatus">Sexo</label>
                                <select class="form-control" id="sexo" name="sexo" required>
                                  <option value="">Seleccionar</option>
                                  <option value="M" <?php if($trabajador->sexo=='M'){ echo "selected";} ?>>Masculino</option>
                                  <option value="F" <?php if($trabajador->sexo=='F'){ echo "selected";} ?>>Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-8">
                                <label for="telefono">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $trabajador->direccion}}" required>
                              </div>

                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" value="{{ $trabajador->celular}}" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="celular">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $trabajador->telefono}}" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="celular">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $trabajador->email}}" required>
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="estatus">Estado</label>
                                <select class="form-control" id="estado" name="estado" required>
                                  <option value="">Seleccionar</option>
                                    <option value="1" <?php if($trabajador->activo==1){ echo "selected";} ?>>Activo</option>
                                    <option value="0" <?php if($trabajador->activo==0){ echo "selected";} ?>>Inactivo</option>
                                </select>
                              </div>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                          <a class="btn btn-danger" href=""{{route('trabajadores.index')}}>Cancelar</a>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection