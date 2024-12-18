@extends('users/layout/app')

@section('content')
    <h1>Información del Usuario</h1>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modificar información</a>
    <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Eliminar Usuario</a>
@endsection
