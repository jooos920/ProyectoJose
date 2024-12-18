@extends('admin/layout/app')

@section('content')
<div class="container">
    <h2>Crear Servicio</h2>
    
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('servicios.store') }}" method="POST" id="servicioForm">
        @csrf
        <div class="mb-3">
            <label for="name">Nombre del Servicio</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price">Precio</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>

        <div class="mb-3">
            <label for="duration">Duración (en minutos)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration') }}">
        </div>

        <button type="submit" class="btn btn-primary">Crear Servicio</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#servicioForm').on('submit', function(event) {
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

            if ($('#price').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el precio del servicio.", "error");
                return;
            }

            if ($('#duration').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa la duración del servicio.", "error");
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
                    Swal.fire("¡Éxito!", "Servicio creado exitosamente.", "success").then(() => {
                        // Reiniciar el formulario
                        $('#servicioForm')[0].reset();
                        // Redirigir si es necesario:
                        // window.location.href = '/servicios';
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
