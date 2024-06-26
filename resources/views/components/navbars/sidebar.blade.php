@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/main-logo-HS.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold text-white"> SisEd</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            @if (auth()->check() && auth()->user()->rol=="admin")
            <!---- Usuarios  --->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Usuarios</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'gestion-usuarios' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('gestion-usuarios') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Gestion</span>
                </a>
            </li>


            <!---- Estudiantes  --->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Estudiantes</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'gestion-estudiantes' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('gestion-estudiantes') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">star</i>
                    </div>
                    <span class="nav-link-text ms-1">Gestion</span>
                </a>
            </li>
            
            <!---- Tutores  --->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Tutores</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'gestion-tutores' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('gestion-tutores') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">star</i>
                    </div>
                    <span class="nav-link-text ms-1">Gestion</span>
                </a>
            </li>
            

            <!---- Cursos  --->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Cursos</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'gestion-curso' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('gestion-curso') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">star</i>
                    </div>
                    <span class="nav-link-text ms-1">Gestion</span>
                </a>
            </li>
            



            <!---- Empleados
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Empleados</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'gestion-empleados' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('gestion-empleados') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Gestion</span>
                </a>
            </li>  --->
            
            <!---- Pagos  --->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Principal</h6>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>            
            @endif
            

        </ul>
    </div>


</aside>
