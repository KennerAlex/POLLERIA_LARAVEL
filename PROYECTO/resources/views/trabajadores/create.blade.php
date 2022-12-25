@extends('layouts.plantilla')
@section('content')
<div style="" class="">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card" style=" margin-top: 20px">
                        <div class="card-header" style="font-size: 40px">Nuevo Trabajador</div>
                      <div class="card-body">
                        <form action="{{ route('trabajadores.store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="apellidoPaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="apellidoMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" required>
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="estatus">Sexo</label>
                                <select class="form-control" id="sexo" name="sexo" required>
                                  <option value="">Seleccionar</option>
                                  <option value="M">Masculino</option>
                                  <option value="F">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-8">
                                <label for="telefono">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                              </div>

                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="celular">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                              </div>
                              <div class="form-group col-4">
                                <label for="celular">Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                              </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                                <label for="estatus">Estado</label>
                                <select class="form-control" id="estado" name="estado" required>
                                  <option value="">Seleccionar</option>
                                  <option value="1">Activo</option>
                                  <option value="0">Inactivo</option>
                                </select>
                              </div>
                          </div>
                          
                          <button type="submit" class="btn btn-primary">Guardar</button>
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