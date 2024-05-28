@extends('adminlte::page')

@section('title', 'Quality-Store')

@section('content_header')
    <h1>Editar Datos De Marcas</h1>
@stop

@section('content')
    <form method="post" action="{{ route('proveedor.update', $proveedor) }}">
        @csrf
        @method('PATCH')


        <label for="nombre">Ingrese el nombre de Proveedor</label>
        <input type="text" min="5" max="30" maxlength="30" size="0" pattern="{5,30}"
            placeholder="Nombre de Proveedor" name="nombre" class="focus border-dark  form-control form-group col-md-3"
            value="{{$proveedor->nombre}}" required>


        <label for="correo">Ingrese el correo electronico</label>
        <input type="email" name="correo" placeholder="Correo"
            class="focus border-dark  form-control form-group col-md-3" value="{{$proveedor->email}}" required>
        @error('email')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror

        <label for="numero">Ingrese su numero de contacto</label>
        <input name="numero" type="tel" size="5" maxlength="18" pattern="[0-9-+()]{5,18}"
            placeholder="+591XXXXXXXXX" required class="focus border-dark  form-control form-group col-md-3"
            value="{{$proveedor->telefono}}" required>
        @error('numero')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror

        <label for="direccion">Ingrese su direccion de hogar</label>
        <input type="text" minlength="1" maxlength="50" placeholder="Dirección" required name="direccion"
            class="focus border-dark  form-control form-group col-md-3" value="{{$proveedor->direccion}}" required>
        @error('direccion')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror

        <button class="btn btn-danger btn-sm" type="submit">Guardar</button>
        <a class="btn btn-dark btn-sm" href="{{ route('proveedor.index') }}">Volver</a>


    </form>
@stop
