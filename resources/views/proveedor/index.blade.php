@extends('adminlte::page')

@section('title', 'Quality-Store')

@section('content_header')

@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('style/font-awesome.min.css') }}">

@endsection

@section('js')
    <script src="<?php echo asset('js/imprimir.js'); ?>"></script>


    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#productos').DataTable({
            autoWidth: false
        });
    </script>


@endsection

@section('content')
    <br>
    <div class="card text-dark">
        <div class="card-header  text-center">
            <h3><b>Proveedores</b></h3>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{-- @can('Modo Admin') --}}
            <a class="btn btn-dark" href="{{ route('proveedor.create') }}"><i class="fas fa-shoe-prints"></i> Agregar</a>
        </div>
    </div>

    <div class="card-body table-responsive">
        <table class="table" id="marcas">
            <thead class="thead-dark">
                <tr>
                    <th thead-light class="text-center">ID </th>
                    <th thead-light class="text-center">Nombre</th>
                    {{-- @can('Modo Admin') --}}
                    <th thead-light class="text-center">Email</th>
                    <th thead-light class="text-center">telefono</th>
                    <th thead-light class="text-center">Direccion</th>
                    <th thead-light class="text-center">Acciones</th>
                    {{-- @endcan --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td class="text-center">{{ $proveedor->id }}</td>
                        <td class="text-center">{{ $proveedor->nombre }}</td>
                        <td class="text-center">{{ $proveedor->email }}</td>
                        <td class="text-center">{{ $proveedor->telefono }}</td>
                        <td class="text-center">{{ $proveedor->direccion }}</td>

                        <td class="text-center">
                            <form action="{{ route('proveedor.destroy', $proveedor) }}" method="POST">
                                

                                <a class="btn btn-dark btn-sm" href="{{ route('proveedor.edit', $proveedor) }}"><i
                                        class="fas fa-edit"></i> Editar</a>

                                @csrf
                                @method('delete')
                                <button onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" type="submit" value="Borrar"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>
                                    Eliminar</button>

                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@stop
