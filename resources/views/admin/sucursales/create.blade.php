@extends('admin/layout/app')

@section('content')
<div class="container">
    <h2>Crear Sucursal</h2>
    
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('sucursales.store') }}" method="POST" id="sucursalForm">
        @csrf
        <div class="mb-3">
            <label for="name">Nombre de la Sucursal</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
        </div>

        <div class="mb-3">
            <label for="phone">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="manager">Encargado</label>
            <input type="text" class="form-control" id="manager" name="manager" value="{{ old('manager') }}">
        </div>

        <button type="submit" class="btn btn-primary">Crear Sucursal</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sucursalForm').on('submit', function(event) {
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

            if ($('#phone').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el teléfono de la sucursal.", "error");
                return;
            }

            if ($('#email').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el correo electrónico de la sucursal.", "error");
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
                    Swal.fire("¡Éxito!", "Sucursal creada exitosamente.", "success").then(() => {
                        // Reiniciar el formulario
                        $('#sucursalForm')[0].reset();
                        // Redirigir si es necesario:
                        // window.location.href = '/sucursales';
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
