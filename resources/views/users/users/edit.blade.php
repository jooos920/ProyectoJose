@extends('users/layout/app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Usuario:</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $user->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $user->email ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control"
                    {{ isset($user) ? '' : 'required' }}>
                @if (isset($user))
                    <small class="text-muted">Dejar en blanco si no deseas cambiar la contraseña.</small>
                @endif
            </div>

            
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </form>

    </div>
@endsection
