@extends('admin/layout/app')

@section('content')
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<div class="container">
    <h1>Lista de Servicios</h1>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Agregar Servicio</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->name }}</td>
                    <td>{{ $servicio->description }}</td>
                    <td>{{ $servicio->price }}</td>
                    <td>{{ $servicio->duration }} minutos</td>
                    <td>
                        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('servicios.destroy', $servicio->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $servicios->links('pagination::bootstrap-5') }}
</div>
@endsection
