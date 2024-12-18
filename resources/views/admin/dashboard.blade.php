@extends('admin/layout/app')

@section('content')
    <div class="container">
        <h1>Bienvenido a la Aplicación</h1>
            <br>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuarios</a>
            {{--<a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
            <a href="{{ route('categorias.index') }}" class="btn btn-primary">Ver Categorías de Productos</a>
            <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Ver Proveedores</a>
            --}}
    </div>
@endsection
