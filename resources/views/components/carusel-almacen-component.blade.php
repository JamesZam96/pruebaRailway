@php
$cards = [
    [
        'image' => asset('img/taller1.jfif'),
        'title' => 'Ford',
        'description' => 'Reparación y mantenimiento de vehículos Ford.',
        'long_description' => 'Nuestro taller especializado en Ford ofrece servicios de alta calidad para todos los modelos de la marca. Contamos con técnicos certificados por Ford y utilizamos equipos de diagnóstico de última generación. Realizamos desde mantenimientos preventivos hasta reparaciones complejas, garantizando siempre el uso de repuestos originales. Con más de 20 años de experiencia, somos expertos en motores EcoBoost, sistemas de transmisión y electrónica avanzada de Ford.',
    ],
    [
        'image' => asset('img/taller2.jfif'),
        'title' => 'Audi',
        'description' => 'Servicio completo para autos Audi.',
        'long_description' => 'Como especialistas en Audi, ofrecemos un servicio integral que abarca desde la más mínima revisión hasta las reparaciones más complejas. Nuestro personal altamente capacitado recibe formación continua directamente de Audi para mantenerse al día con las últimas tecnologías. Contamos con herramientas especializadas para diagnóstico y reparación de sistemas Quattro, motores TFSI y TSI, así como para la calibración de sistemas de asistencia al conductor (ADAS).',
    ],
    [
        'image' => asset('img/taller3.jfif'),
        'title' => 'Yamaha',
        'description' => 'Especialistas en motocicletas Yamaha.',
        'long_description' => 'Nuestro taller es el paraíso para los amantes de las motocicletas Yamaha. Ofrecemos servicios de mantenimiento, reparación y personalización para todos los modelos, desde scooters urbanas hasta potentes motos deportivas. Nuestros mecánicos son apasionados de las dos ruedas y cuentan con certificación Yamaha. Además de reparaciones, ofrecemos servicios de optimización de rendimiento, instalación de accesorios y preparación para competiciones.',
    ],
    [
        'image' => asset('img/taller4.jfif'),
        'title' => 'Mercedes',
        'description' => 'Mantenimiento y reparación de autos Mercedes.',
        'long_description' => 'En nuestro taller Mercedes-Benz, la excelencia es nuestra norma. Ofrecemos un servicio premium para todos los modelos de la estrella, desde los clásicos hasta los más recientes. Nuestros técnicos reciben formación continua directamente de la fábrica y utilizamos equipos de diagnóstico especializados Star Diagnosis. Somos expertos en sistemas MBUX, reparación de transmisiones automáticas y calibración de sistemas de seguridad. También ofrecemos servicios de restauración para vehículos clásicos Mercedes.',
    ],
    [
        'image' => asset('img/taller5.jfif'),
        'title' => 'Chevrolet',
        'description' => 'Taller especializado en vehículos Chevrolet.',
        'long_description' => 'Como taller autorizado Chevrolet, ofrecemos una atención integral para tu vehículo. Desde cambios de aceite hasta reparaciones mayores, nuestro equipo de profesionales está preparado para cualquier desafío. Utilizamos herramientas y equipos certificados por GM para garantizar que tu Chevrolet reciba el mejor cuidado posible. Somos especialistas en sistemas de inyección, diagnóstico de centralitas y reparación de cajas automáticas. También ofrecemos asesoramiento personalizado sobre el mantenimiento de tu vehículo y programas de fidelidad para nuestros clientes frecuentes.',
    ],
];
@endphp

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
        @foreach($cards as $index => $card)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $card['image'] }}" class="card-img-top" alt="{{ $card['title'] }}">
                    <div class="card-body bg-dark p-2">
                        <h6 class="card-title mb-1 text-danger">{{ $card['title'] }}</h6>
                        <p class="card-text small mb-2 text-white">{{ $card['description'] }}</p>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $index }}">
                            Ver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal para cada taller -->
            <div class="modal fade" id="modal{{ $index }}" tabindex="-1" aria-labelledby="modalLabel{{ $index }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal2Label{{ $index }}">{{ $card['title'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $card['image'] }}" class="img-fluid mb-3" alt="{{ $card['title'] }}">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-3">Descripción detallada:</h6>
                                    <p>{{ $card['long_description'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="/ProductoServicioIngreso" class="btn btn-danger">Ver más detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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