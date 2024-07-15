@php
$cardServices = [
    [
        'image' => asset('img/servicio1.jfif'),
        'name' => 'taller',
        'description' => '60.000$',
    ],
    [
        'image' => asset('img/servicio2.jfif'),
        'name' => 'llatas',
        'description' => '60.000$',
    ],
    [
        'image' => asset('img/servicio3.jfif'),
        'name' => 'liquido de frenos',
        'description' => '35.000$',
    ],
    [
        'image' => asset('img/servicio4.jfif'),
        'name' => 'carburador',
        'description' => '150.000$',
    ],
    [
        'image' => asset('img/servicio5.jfif'),
        'name' => 'filtro de aire',
        'description' => '12.000$',
    ],
];
@endphp

<div class="container-fluid">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
        @foreach($services as $indexService => $cardService)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/'.$cardService->image) }}" class="card-img-top" alt="{{ $cardService->name }}">
                    <div class="card-body bg-dark p-2">
                        <h6 class="card-name mb-1 text-danger">{{ $cardService->name }}</h6>
                        <p class="card-text small mb-2 text-white">$ {{ $cardService->price }}</p>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalService{{ $indexService }}">
                            Agregar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal para cada card -->
            <div class="modal fade" id="modalService{{ $indexService }}" tabindex="-1" aria-labelledby="modalLabel{{ $indexService }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $indexService }}">{{ $cardService->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/'.$cardService->image) }}" class="img-fluid mb-3" alt="{{ $cardService->name }}">
                            <p>Precio: $ {{ $cardService->price }}</p>
                            <p>Descripción: {{ $cardService->description }}</p>
                            <p>¿Estás seguro de que deseas agregar este producto?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <!--<button type="button" class="btn btn-danger">Confirmar</button>-->
                            <form action="{{route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $cardService->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </form>
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