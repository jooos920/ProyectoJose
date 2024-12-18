@extends('admin/layout/app')

@section('content')
<div class="container">
    <h2>Modificar Servicio</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST" id="serviceForm">
        <input type="hidden" name="id" value="{{ $servicio->id }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Servicio</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $servicio->name) }}">
        </div>
        
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $servicio->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $servicio->price) }}">
        </div>

        <div class="form-group">
            <label for="duration">Duración (en minutos)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $servicio->duration) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#serviceForm').on('submit', function(event) {
            event.preventDefault();

            if ($('#name').val().trim() === '' && $('#description').val().trim() === '' && $('#price').val().trim() === '' && $('#duration').val().trim() === '') {
                Swal.fire("¡Error!", "No debe de haber campos vacíos", "error");
                return;
            }
            if ($('#name').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el nombre del servicio.", "error");
                return;
            }

            if ($('#description').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa la descripción del servicio.", "error");
                return;
            }

            const price = $('#price').val().trim();
            if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
                Swal.fire("¡Error!", "Por favor, ingresa un precio válido.", "error");
                return;
            }

            const duration = $('#duration').val().trim();
            if (duration === '' || isNaN(duration) || parseInt(duration) <= 0) {
                Swal.fire("¡Error!", "Por favor, ingresa una duración válida en minutos.", "error");
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
                    Swal.fire("¡Éxito!", "Servicio actualizado exitosamente.", "success").then(() => {
                        // Redirigir si es necesario:
                        window.location.href = '/servicios';
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
