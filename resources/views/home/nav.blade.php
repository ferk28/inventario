<!-- Nav items -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'safeguards' ? 'active' : null }}" href="{{url('safeguards')}}">
            <i class="ni ni-tv-2 text-primary"></i>
            <span class="nav-link-text">Responsivas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'areas' ? 'active' : null }}" href="{{url('areas')}}">
            <i class="ni ni-planet text-orange"></i>
            <span class="nav-link-text">Areas</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'bosses' ? 'active' : null }}" href="{{url('bosses')}}">
            <i class="ni ni-key-25 text-info"></i>
            <span class="nav-link-text">Los Patrones \o/</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'employees' ? 'active' : null }}" href="{{url('employees')}}">
            <i class="ni ni-single-02 text-yellow"></i>
            <span class="nav-link-text">Empleados</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'inventories' ? 'active' : null }}" href="{{url('inventories')}}">
            <i class="ni ni-bullet-list-67 text-default"></i>
            <span class="nav-link-text">Inventario</span>
        </a>
    </li>
    <li class="nav-item">
{{--        <a class="nav-link" href="examples/dashboard.html">
            <i class="ni ni-tie-bow text-green"></i>
            <span class="nav-link-text">Usuarios</span>
        </a>
    </li>--}}
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
