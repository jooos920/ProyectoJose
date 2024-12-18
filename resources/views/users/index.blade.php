@extends('users/layout/app')

@section('content')
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 text-primary">Bienvenido a nuestra Tienda de Bicicletas y Accesorios</h1>
            <p class="lead">Encuentra las mejores bicicletas y accesorios para tus aventuras sobre ruedas</p>
        </div>

        <!-- Carousel Section (Imagen principal de bicicletas) -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://wallpapers.com/images/hd/woman-on-a-4k-mountain-bike-steep-trail-m5aa7q35ooqc2l0z.jpg" class="d-block w-100" alt="Bicicleta de Carreras">
                </div>
                <div class="carousel-item">
                    <img src="https://wallpapers.com/images/hd/leogang-downhill-4k-mountain-bike-track-luel5gej0olnx6ik.jpg" class="d-block w-100" alt="Bicicleta de Montaña">
                </div>
                <div class="carousel-item">
                    <img src="https://wallpapers.com/images/hd/dramatic-4k-mountain-bike-ride-bn6q0gzxti1g0p9s.jpg" class="d-block w-100" alt="Bicicleta de Ciudad">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        
        <!-- Sección de Categorías -->
        <div class="mt-5">
            <h2 class="text-center text-secondary">Categorías</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white bg-dark mb-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQopC8rcXJivZr1GOqzPAwbDCZQQLEzXfDcAg&s" class="card-img-top" alt="Accesorios">
                        <div class="card-body">
                            <h5 class="card-title">Accesorios</h5>
                            <p class="card-text">Todo lo que necesitas para complementar tu bici.</p>
                            <a href="#" class="btn btn-light">Ver productos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-dark mb-3">
                        <img src="https://image.made-in-china.com/202f0j00MKAlOjJFdPbI/Breathable-Men-s-Cycling-Jersey-Sportswear-Clothing-Set-for-Bike-Bicycle-Riding.webp" class="card-img-top" alt="Ropa de Ciclismo">
                        <div class="card-body">
                            <h5 class="card-title">Ropa de Ciclismo</h5>
                            <p class="card-text">Prendas de alta calidad para tu comodidad mientras pedaleas.</p>
                            <a href="#" class="btn btn-light">Ver productos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <img src="https://www.ecosdelnorte.com.ar/media/slide/data1/images/banner_bici3.jpg" class="img-fluid mb-4" alt="Bicicleta en Acción">
            <p class="lead">¡Explora nuestra tienda y empieza tu aventura sobre ruedas hoy mismo!</p>
        </div>
    </div>
@endsection
