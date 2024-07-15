@php
$imageLinks = [
    [
        'url' => asset('img/taller1.jfif'),
        'alt' => 'Descripción 1',
        'link' => 'https://ejemplo.com/pagina1'
    ],
    [
        'url' =>  asset('img/taller2.jfif'),
        'alt' => 'Descripción 2',
        'link' => 'https://ejemplo.com/pagina2'
    ],
    [
        'url' =>  asset('img/image3.jfif'),
        'alt' => 'Descripción 3',
        'link' => 'https://ejemplo.com/pagina3'
    ],
    [
        'url' =>  asset('img/image4.jfif'),
        'alt' => 'Descripción 4',
        'link' => 'https://ejemplo.com/pagina4'
    ],
];
@endphp

<div class="container mt-4">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($imageLinks as $image)
            <div class="col">
                <a href="{{ $image['link'] }}" class="d-block text-center image-link">
                    <img src="{{ $image['url'] }}" 
                         alt="{{ $image['alt'] }}" 
                         class="img-fluid rounded-circle img-thumbnail image-hover"
                         style="width: 150px; height: 150px; object-fit: cover;">
                </a>
            </div>
        @endforeach
    </div>
</div>

<style>
    .image-link {
        display: inline-block;
        border-radius: 50%;
        padding: 5px;
        transition: all 0.3s ease;
    }

    .image-hover {
        transition: all 0.3s ease;
    }

    .image-link:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .image-link:hover .image-hover {
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }
</style>