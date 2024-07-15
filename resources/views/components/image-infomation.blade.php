@php
$cards = [
    [
        'image' => asset('img/taller-1.jpg'),
        'title' => 'Registra tu taller',
        'description' => 'Trabajan con Garapp',
    ],
    [
        'image' => asset('img/almacen.jfif'),
        'title' => 'Registra tu almacén',
        'description' => 'Disfrute de una logística inmediata',
    ],
    [
        'image' => asset('img/repartidor.jfif'),
        'title' => '¡Únete como conductor de entrega!',
        'description' => 'Gana dinero extra entregando paquetes,
 tenemos las mejores tarifas y beneficios.',
    ],
];
@endphp

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($cards as $card)
                    <div class="col d-flex justify-content-center">
                        <div class="card h-100" style="max-width: 18rem;">
                            <img src="{{ $card['image'] }}" class="card-img-top" alt="{{ $card['title'] }}">
                            <div class="card-body bg-dark p-2">
                                <h6 class="card-title mb-1 text-danger">{{ $card['title'] }}</h6>
                                <p class="card-text small mb-2 text-white">{{ $card['description'] }}</p>
                                <a href="#" class="btn btn-danger btn-sm">Trabaja con Garapp</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card-img-top {
        height: 150px;
        object-fit: cover;
    }
</style>