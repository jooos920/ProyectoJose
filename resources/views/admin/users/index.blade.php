@extends('admin/layout/app')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Agregar Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Password</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->rol }}</td>
                    <td>
                        <a href="{{ route('users.admin.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('users.destroy', $user->id) }}"class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-5') }}
</div>
@endsection
