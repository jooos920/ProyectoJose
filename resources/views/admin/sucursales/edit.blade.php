@extends('admin/layout/app')

@section('content')
<div class="container">
    <h2>Modificar Sucursal</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('sucursales.update', $sucursal->id) }}" method="POST" id="branchForm">
        <input type="hidden" name="id" value="{{ $sucursal->id }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre de la Sucursal</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $sucursal->name) }}">
        </div>
        
        <div class="form-group">
            <label for="address">Dirección</label>
            <textarea class="form-control" id="address" name="address">{{ old('address', $sucursal->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $sucursal->phone) }}">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $sucursal->email) }}">
        </div>

        <div class="form-group">
            <label for="manager">Encargado</label>
            <input type="text" class="form-control" id="manager" name="manager" value="{{ old('manager', $sucursal->manager) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Sucursal</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#branchForm').on('submit', function(event) {
            event.preventDefault();

            if ($('#name').val().trim() === '' && $('#address').val().trim() === '' && $('#phone').val().trim() === '' && $('#email').val().trim() === '' && $('#manager').val().trim() === '') {
                Swal.fire("¡Error!", "No debe de haber campos vacíos", "error");
                return;
            }
            if ($('#name').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el nombre de la sucursal.", "error");
                return;
            }

            if ($('#address').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa la dirección de la sucursal.", "error");
                return;
            }

            const phone = $('#phone').val().trim();
            if (phone === '') {
                Swal.fire("¡Error!", "Por favor, ingresa un número de teléfono válido.", "error");
                return;
            }

            const email = $('#email').val().trim();
            if (email === '') {
                Swal.fire("¡Error!", "Por favor, ingresa un correo electrónico válido.", "error");
                return;
            }

            if ($('#manager').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el nombre del encargado.", "error");
                return;
            }

            // Recopilar datos del formulario
            const formData = $(this).serialize();

            // Enviar datos usando AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    Swal.fire("¡Éxito!", "Sucursal actualizada exitosamente.", "success").then(() => {
                        // Redirigir si es necesario:
                        window.location.href = '/sucursales';
                    });
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            Swal.fire("¡Error!", value[0], "error");
                        });
                    } else {
                        Swal.fire("¡Error!", "Ocurrió un error inesperado.", "error");
                    }
                }
            });
        });
    });
</script>
