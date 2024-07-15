<link rel="stylesheet" href="{{ asset('css/sidebar-company.css') }}">
<nav class="navbar navbar-expand-lg navbar-light py-4 px-4 bg-transparent">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Dashboard</h2>
    </div>

    <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown position-absolute end-0 top-0 mt-4 me-4 me-lg-5">
                <a class="nav-link dropdown-toggle primary-text fw-bold" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>{{ Auth::user()->company->company_name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('logout.company')}}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                    <form id="logout-form" action="{{ route('logout.company') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
