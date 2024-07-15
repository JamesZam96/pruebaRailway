<link rel="stylesheet" href="{{ asset('css/sidebar-company.css') }}">
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fw-bold text-uppercase border-bottom border-black"><i
                class="fa-solid fa-house me-2"></i>{{ Auth::user()->company->company_name }}</div>
        <div class="list-group list-group-flush my-5 bg-white">
            <a href="/admin" class="list-group-item list-group-item-action bg-transparent main-text fw-bold list-group-item-action"><i
                    class="fa-regular fa-bell me-2"></i>Inicio</a>
            <a href="/categories" class="list-group-item bg-transparent main-text fw-bold"><i
                class="fa-solid fa-layer-group me-2"></i>Categorías</a>
            <a href="/products" class="list-group-item bg-transparent main-text fw-bold"><i
                    class="fa-solid fa-list me-2"></i>Productos</a>
            <a href="/services" class="list-group-item bg-transparent main-text fw-bold"><i
                    class="fa-solid fa-screwdriver-wrench me-2"></i>Servicios</a>
            <a href="#" class="list-group-item bg-transparent main-text fw-bold"><i
                    class="fa-regular fa-clock me-2"></i>Horarios</a>
            <a href="/orders" class="list-group-item bg-transparent main-text fw-bold"><i
                    class="fa-solid fa-list-ol me-2"></i>Ordenes</a>
            <a href="{{route('logout.company')}}" class="list-group-item bg-transparent main-text fw-bold mb-2" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="fa-solid fa-arrow-right-from-bracket me-2"></i>Cerrar sesión</a>
                <form id="logout-form" action="{{ route('logout.company') }}" method="POST" style="display: none;">
                    @csrf
                </form>
    </div>
</div>

