<li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Catalogos</span></a>
    <ul class="menu-content">       
        <li class="{{ Request::is('clientes*') ? 'active' : '' }}"><a href="{!! route('clientes.index') !!}"><span>Clientes</span></a></li>
        <li class="{{ Request::is('equipos*') ? 'active' : '' }}"><a href="{!! route('equipos.index') !!}">Equipos</span></a></li>
        <li class="{{ Request::is('plantas*') ? 'active' : '' }}"><a href="{!! route('plantas.index') !!}"><span>Plantas</span></a></li>
        <li class="{{ Request::is('productos*') ? 'active' : '' }}"><a href="{!! route('productos.index') !!}"><span>Productos</span></a></li>
        <li class="{{ Request::is('proveedores*') ? 'active' : '' }}"><a href="{!! route('proveedores.index') !!}"><span>Proveedores</span></a></li>
    </ul>
</li>
