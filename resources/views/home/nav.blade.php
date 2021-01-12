<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading p-0 text-muted">
    @if(auth()->user()->role == 'admin')
    <span class="docs-normal">Administrar</span>
    @elseif(auth()->user()->role == 'boss')
    <span class="docs-normal">Control</span>
    @elseif(auth()->user()->role == 'employee')
    <span class="docs-normal">Consultar</span>
    @endif
</h6>
{{-- Nav items --}}
<ul class="navbar-nav">
    @if (auth()->user()->role == 'admin')
     {{-- safeguards --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'safeguards' ? 'active' : null }}" href="{{url('safeguards')}}">
            <i class="ni ni-tv-2 text-primary"></i>
            <span class="nav-link-text">Responsivas</span>
        </a>
    </li>
     {{-- areas --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'areas' ? 'active' : null }}" href="{{url('areas')}}">
            <i class="ni ni-planet text-orange"></i>
            <span class="nav-link-text">Areas</span>
        </a>
    </li>
     {{-- bosses --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'bosses' ? 'active' : null }}" href="{{url('bosses')}}">
            <i class="ni ni-key-25 text-info"></i>
            <span class="nav-link-text">Los Patrones \o/</span>
        </a>
    </li>
     {{-- employees --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'employees' ? 'active' : null }}" href="{{url('employees')}}">
            <i class="ni ni-single-02 text-yellow"></i>
            <span class="nav-link-text">Empleados</span>
        </a>
    </li>


    <h6 class="navbar-heading p-10 text-muted">
        <span class="docs-normal">Inventario</span>
    </h6>
    {{-- series --}}
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="ni ni-map-big text-default"></i>
            <span class="nav-link-text">Seriales</span>
        </a>
    </li>
    {{-- products  --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'inventories' ? 'active' : null }}" href="{{url('inventories')}}">
            <i class="ni ni-box-2 text-indigo"></i>
            <span class="nav-link-text">Productos</span>
        </a>
    </li>
    @elseif (auth()->user()->role == 'boss')
    {{-- safeguards --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'safeguards' ? 'active' : null }}" href="{{url('safeguards')}}">
            <i class="ni ni-tv-2 text-primary"></i>
            <span class="nav-link-text">Responsivas</span>
        </a>
    </li>
    {{-- employees --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'employees' ? 'active' : null }}" href="{{url('employees')}}">
            <i class="ni ni-single-02 text-yellow"></i>
            <span class="nav-link-text">Empleados</span>
        </a>
    </li>
    {{-- products  --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'inventories' ? 'active' : null }}" href="{{url('inventories')}}">
            <i class="ni ni-box-2 text-indigo"></i>
            <span class="nav-link-text">Productos</span>
        </a>
    </li>
    {{-- series --}}
     <a class="nav-item">
         <a class="nav-link" href="#">
             <i class="ni ni-map-big text-default"></i>
             <span class="nav-link-text">Seriales</span>
         </a>
    </a>
    </li>

    @elseif (auth()->user()->role == 'employee')
    {{-- products  --}}
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'inventories' ? 'active' : null }}" href="{{url('inventories')}}">
            <i class="ni ni-box-2 text-indigo"></i>
            <span class="nav-link-text">Productos</span>
        </a>
    </li>
    @endif
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading p-0 text-muted">
    <span class="docs-normal">Documentation</span>
</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="" target="_blank">
            <i class="ni ni-ui-04"></i>
            <span class="nav-link-text">Ajustes</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active active-pro" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <i class="ni ni-send text-dark"></i>
            <span class="nav-link-text">Cerrar sesión</span>
        </a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
