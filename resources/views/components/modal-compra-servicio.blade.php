@php
$cards = [
    [
        'image' => asset('img/producto1.jfif'),
        'title' => 'liquido',
        'description' => '35.000$',
    ],
    [
        'image' => asset('img/producto2.jfif'),
        'title' => 'llatas',
        'description' => '60.000$',
    ],
    [
        'image' => asset('img/producto3.jfif'),
        'title' => 'liquido de frenos',
        'description' => '35.000$',
    ],
    [
        'image' => asset('img/producto4.jfif'),
        'title' => 'carburador',
        'description' => '150.000$',
    ],
    [
        'image' => asset('img/producto5.jfif'),
        'title' => 'filtro de aire',
        'description' => '12.000$',
    ],
   
];
@endphp
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
        
        @foreach($cards as $card)
       
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $card['image'] }}" class="card-img-top" alt="{{ $card['title'] }}">
                    <div class="card-body bg-dark p-2">
                        <h6 class="card-title mb-1 text-danger">{{ $card['title'] }}</h6>
                        <p class="card-text small mb-2 text-white">{{ $card['description'] }}</p>
                        
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Agregar
                            </button>
                            
                    </div>
                </div>
            </div>
        @endforeach
        
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $card['title'] }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            <img src="{{ $card['image'] }}" class="card-img-top" alt="{{ $card['title'] }}">
                                            <p class="card-text small mb-2 text-black">{{ $card['description'] }}</p>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Agregar a carrito</button>
                                    </div>
                                </div>
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






