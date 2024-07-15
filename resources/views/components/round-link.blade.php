@php
$componentNames = [
    'Alternador',
    'Batería',
    'Filtro',
    'Amortiguador',
    'Radiador',
    'Embrague',
];
@endphp

<div class="container mt-4">
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3 justify-content-center">
        @foreach($componentNames as $name)
            <div class="col text-center">
                <a href="#" class="component-oval btn btn-dark text-white fw-bold text-decoration-none d-inline-flex justify-content-center align-items-center">
                    {{ $name }}
                </a>
            </div>
        @endforeach
    </div>
</div>

<style>
    .component-oval {
        width: 120px;
        height: 60px;
        border-radius: 30px !important;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .component-oval:hover {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .component-oval {
            width: 100px;
            height: 50px;
            font-size: 0.8rem;
        }
    }
</style>