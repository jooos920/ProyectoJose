<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Proyecto')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Incluir jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
</head>
<div class="container">
    <h3 class="text-center mb-4">Iniciar Sesión</h3>
    @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '¡Fallido!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif
        
    <form action="{{ route('login') }}" method="POST" class="form">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @csrf

        <div class="form-group mb-3">
            <label for="email" class="form-label">
                <i class="fas fa-envelope"></i> Correo Electrónico
            </label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="password" class="form-label">
                <i class="fas fa-lock"></i> Contraseña
            </label>
            <input type="password" name="password" id="password" class="form-control"
                placeholder="Ingrese su contraseña" required>
        </div>
        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">
                Iniciar Sesión
            </button>

            <p>¿No tienes una cuenta? <a href="{{ route('signup') }}">Regístrate</a></p>
        </div>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
