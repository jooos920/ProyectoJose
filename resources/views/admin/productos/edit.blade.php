@extends('admin/layout/app')

@section('content')
<div class="container">
    <h2>MOdificar Producto</h2>
    @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" id="productForm">
        <input type="hidden" name="id" value="{{ $producto->id }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion', $producto->descripcion)}}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{old('precio', $producto->precio)}}">
        </div>

        <div class="form-group">
            <label for="stock">Cantidad</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock', $producto->stock)}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#productForm').on('submit', function(event) {
            event.preventDefault();

            if ($('#nombre').val().trim() === ''&&$('#descripcion').val().trim() === ''&&$('#precio').val().trim()===''&&$('#stock').val().trim()==='') {
                Swal.fire("¡Error!", "No debe de haber campos vacios", "error");
                return;
            }
            if ($('#nombre').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa el nombre del producto.", "error");
                return;
            }

            if ($('#descripcion').val().trim() === '') {
                Swal.fire("¡Error!", "Por favor, ingresa la descripción del producto.", "error");
                return;
            }

            const precio = $('#precio').val().trim();
            if (precio === '' || parseFloat(precio) <= 0) {
                Swal.fire("¡Error!", "Por favor, ingresa un precio válido.", "error");
                return;
            }

            const stock = $('#stock').val().trim();
            if (stock === '' || parseInt(stock) < 0) {
                Swal.fire("¡Error!", "Por favor, ingresa una cantidad válida.", "error");
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
                    Swal.fire("¡Éxito!", "Producto actualizado exitosamente.", "success").then(() => {
                        // Reiniciar el formulario
                        $('#productForm')[0].reset();
                        // Redirigir si es necesario:
                         window.location.href = '/productos';
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