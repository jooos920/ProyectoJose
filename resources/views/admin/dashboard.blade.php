@extends('admin/layout/app')

@section('content')
    <div class="container mt-5">
        <!-- Section: Welcome message -->
        <div class="text-center mb-5">
            <h1 class="display-4 text-primary">Bienvenido al Panel de Administración</h1>
            <p class="lead">Gestiona todos los aspectos de la tienda de bicicletas y accesorios desde aquí.</p>
        </div>

        <!-- Section: Cards with links to different sections -->
        <div class="row">
            <!-- Users Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg">
                    <img src="https://bonboarding.com/_astro/about-mission.pDzAWkly_2iTYsF.webp" class="card-img-top" alt="Usuarios">
                    <div class="card-body text-center">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Administra los usuarios registrados en la aplicación.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuarios</a>
                    </div>
                </div>
            </div>

            <!-- Products Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg">
                    <img src="https://i.pinimg.com/564x/fe/24/49/fe2449955de07735b6e4a1b479be8677.jpg" class="card-img-top" alt="Productos">
                    <div class="card-body text-center">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Administra todos los productos (bicicletas y accesorios) disponibles.</p>
                        <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
                    </div>
                </div>
            </div>

            <!-- Categories Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg">
                    <img src="https://images.milanuncios.com/api/v1/ma-ad-media-pro/images/e252f741-1491-4ffb-a88a-4d38994feb08?rule=detail_640x480" class="card-img-top" alt="Categorías">
                    <div class="card-body text-center">
                        <h5 class="card-title">Categorías de Productos</h5>
                        <p class="card-text">Gestiona las categorías para organizar los productos.</p>
                        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Ver Categorías</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section: Other Links (Sucursales & Servicios) -->
        <div class="row">
            <!-- Sucursales Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg">
                    <img src="https://cdn.shopify.com/s/files/1/0225/8629/4336/files/Alameda_480x480.png?v=1731532260" class="card-img-top" alt="Sucursales">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sucursales</h5>
                        <p class="card-text">Administra las sucursales de la tienda.</p>
                        <a href="{{ route('sucursales.index') }}" class="btn btn-primary">Ver Sucursales</a>
                    </div>
                </div>
            </div>

            <!-- Servicios Section -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg">
                    <img src="https://img.lalr.co/cms/2016/08/11215836/bicicleta0812-1000.jpg?size=sm&ratio=sq&f=jpg" class="card-img-top" alt="Servicios">
                    <div class="card-body text-center">
                        <h5 class="card-title">Servicios</h5>
                        <p class="card-text">Administra los servicios ofrecidos en la tienda.</p>
                        <a href="{{ route('servicios.index') }}" class="btn btn-primary">Ver Servicios</a>
                    </div>
                </div>
            </div>

            <!-- Add more cards as necessary -->
        </div>
    </div>
@endsection
