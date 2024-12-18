@extends('admin/layout/app')

@section('content')
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<div class="container">
    <h1>Lista de Sucursales</h1>
    <a href="{{ route('sucursales.create') }}" class="btn btn-primary mb-3">Agregar Sucursal</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Encargado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sucursales as $sucursal)
                <tr>
                    <td>{{ $sucursal->name }}</td>
                    <td>{{ $sucursal->address }}</td>
                    <td>{{ $sucursal->phone }}</td>
                    <td>{{ $sucursal->email }}</td>
                    <td>{{ $sucursal->manager }}</td>
                    <td>
                        <a href="{{ route('sucursales.edit', $sucursal->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('sucursales.destroy', $sucursal->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $sucursales->links('pagination::bootstrap-5') }}
</div>
@endsection
