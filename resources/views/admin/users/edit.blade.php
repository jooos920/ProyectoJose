@extends('admin/layout/app')

@section('content')
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="{{ route('users.admin.update', $user->id) }}" method="POST" id="userForm">
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
                    value="{{ old('name', $user->name ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $user->email ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" name="password" class="form-control"
                    {{ isset($user) ? '' : 'required' }}>
                @if (isset($user))
                    <small class="text-muted">Dejar en blanco si no deseas cambiar la contraseña.</small>
                @endif
            </div>

            <div class="form-group">
                <label for="rol">Rol:</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="usuario" {{ $user->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </form>

    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userForm').on('submit', function(event) {
            event.preventDefault();
            if ($('#name').val().trim() === ''&&$('#email').val().trim() === '') {
                Swal.fire("¡Error!", "Nombe y correo deben de estar llenos.", "error");
                return;
            }
            if ($('#name').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el nombre del usuario.", "error");
                return;
            }

            if ($('#email').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el email del usuario.", "error");
                return;
            }

            // Recopilar datos del formulario
            var formData = $(this).serialize();

            // Enviar datos usando AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    Swal.fire("¡Éxito!", "Usuario actualizado exitosamente.", "success").then(() => {
                        // Reiniciar el formulario
                        $('#userForm')[0].reset();
                        // Redirigir si es necesario:
                        window.location.href = '/usuarios';
                    });
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        Swal.fire("¡Error!", value[0], "error");
                    });
                }
            });
        });
    });
</script>
