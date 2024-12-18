@extends('admin/layout/app')

@section('content')
    <div class="container">
        <h1>Agregar Categoría</h1>
        <form action="{{ route('categorias.store') }}" method="POST" id="form">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Nombre de la categoría:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form').on('submit', function(event) {
            event.preventDefault(); // Evitar el envío tradicional del formulario

            // Validar el campo de nombre
            if ($('#name').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa un nombre para la categoría.", "error");
                return; // Detener si el campo está vacío
            }

            // Recopilar datos del formulario
            var formData = $(this).serialize();

            // Enviar datos usando AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Usar la acción del formulario
                data: formData,
                success: function(response) {
                    Swal.fire("¡Éxito!", "Categoría creada exitosamente.", "success").then(
                    () => {
                        // Reiniciar el formulario o redirigir
                        $('#form')[0].reset();
                        // Redirigir si es necesario:
                        // window.location.href = '/categorias'; 
                    });
                },
                error: function(xhr) {
                    // Manejar errores de validación
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        Swal.fire("¡Error!", value[0],
                        "error"); // Mostrar el primer error
                    });
                }
            });
        });
    });
</script>
