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

    <div class="card">
        <div class="card-body">

            <form action="{{ route('proveedor.store') }}" method="post">
                @csrf

                <label for="nombre">Ingrese el nombre de Proveedor</label>
                <input type="text" min="5" max="30" maxlength="30" size="0" pattern="{5,30}"
                    placeholder="Nombre de Proveedor" name="nombre"
                    class="focus border-dark  form-control form-group col-md-3" value="" required>
                

                <label for="correo">Ingrese el correo electronico</label>
                <input type="email" name="correo" placeholder="Correo"
                    class="focus border-dark  form-control form-group col-md-3" value="{{ old('email') }}" required>
                @error('email')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror

                <label for="numero">Ingrese su numero de contacto</label>
                <input name="numero" type="tel" size="5" maxlength="18" pattern="[0-9-+()]{5,18}"
                    placeholder="+591XXXXXXXXX" required class="focus border-dark  form-control form-group col-md-3"
                    value="{{ old('numero') }}" required>
                @error('numero')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror

                <label for="direccion">Ingrese su direccion de hogar</label>
                <input type="text" minlength="1" maxlength="50" placeholder="Dirección" required name="direccion"
                    class="focus border-dark  form-control form-group col-md-3" value="{{ old('direccion') }}" required>
                @error('direccion')
                    <small>*{{ $message }}</small>
                    <br><br>
                @enderror

                <button class="btn btn-danger btn-sm" type="submit">Registrar Proveedor</button>
                <a class="btn btn-dark btn-sm" href="{{ route('proveedor.index') }}">Volver</a>

            </form>

        </div>
    </div>

@stop
