@extends('layouts.plantilla')
@section('content')
    <div class="card h-100">
        <div class="card-header pt-2 d-flex " style="justify-content: space-between">
            <div class="row w-100">
                <div class=" col-10 card-title">
                    <h3 class="m-0">Pedidos</h3>
                </div>

                <div class="col-2 float-right">
                    <a href="{{ route('registrar') }}" class="btn btn-success btn-block">Registrar Nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="card h-100">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap h-100" style="overflow-y: auto">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Costo</th>
                                            <th class="text-center">Operaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedidos as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nombreCliente }}</td>
                                                <td>{{ $item->apellidosCliente }}</td>
                                                <td>{{ $item->correo }}</td>
                                                <td>{{ $item->telefono }}</td>
                                                <td>{{ $item->direccion }}</td>
                                                <td>S/.{{ $item->costo }}</td>
                                                <td>
                                                    <div class="d-flex" style="gap: 12px; justify-content:center">
                                                        <div>
                                                            <form action="{{ route('pedidos.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                {{ method_field('DELETE') }}

                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm border-dark">
                                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                                </button>
                                                            </form>
                                                            <br>
                                                        </div>
                                                        <div>
                                                            <form action="">
                                                                <a class="btn btn-success btn-sm border-dark"
                                                                    href="{{ route('pdf', $item->id) }}">
                                                                    <i class="fas fa-clipboard-list"></i> Generar Boleta</a>
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
        </div>
    </div>
@endsection
