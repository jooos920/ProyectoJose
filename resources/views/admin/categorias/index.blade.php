@extends('admin/layout/app')
@section('content')
    <h1>CAtegorias</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoría</a>
    <table class="table">
        <thead>
            <tr>
                <th>Categría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->name }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('categorias.destroy', $categoria->id) }}" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categorias->links('pagination::bootstrap-5') }}
@endsection
