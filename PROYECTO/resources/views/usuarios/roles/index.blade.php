@extends('layouts.plantilla')
@section('content')
<div class="row ">
    {{-- <div id="separator-ribbon" class="justify-content-center">
      <div class="content" style="background-color: yellow;"> 
        <div class="row justify-content-center"> --}}
          <h1 style="font-family: serif; font-size: 30pt; font-size-adjust: 1.2 d-no d-md-block ; text-decoration: underline; font-weight: bolder;">Roles</h1>
        {{-- </div>    
      </div>
    </div> --}}
  </div>
 

    
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Roles</h3>
  
              <div class="row">
                <div class="col-10 d-none d-lg-block"></div>
                <div class="col-5 col-sm-2">
                <form action="{{route('tipoUsuario.create')}}">
                  <input type="submit" class="btn btn-warning border-dark" value="Agregar Nuevo Rol">
                </form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Rol</th>
                    <th style="padding-left: 10%">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                   <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->tipo}}</td>
                    
                    <td>
                      <div class="row">
                        <div class="col col-sm-4">
                          <form action="{{route('tipoUsuario.edit',$item->id)}}" method="get">
                            <i class="far fa-edit"></i>
                            <input type="submit" class="btn btn-warning btn-sm border-dark" value="Editar">
                          </form>
                          
                        
                        </div>                    
                        <div class="col col-sm-4">
                          
                          <form action="{{route('tipoUsuario.destroy', $item->id)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}} 
                            <i class="fas fa-trash-alt"></i>   
                            <input type="submit" class="btn btn-warning btn-sm border-dark"  value="Borrar">   
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
       
 
    


@endsection