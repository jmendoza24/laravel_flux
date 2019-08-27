<li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Catalogos</span></a>
    <ul class="menu-content">
        <li class="{{ Request::is('productos*') ? 'active' : '' }}"><a href="{!! route('productos.index') !!}"><span>Productos</span></a></li>
        <li class="{{ Request::is('plantas*') ? 'active' : '' }}"><a href="{!! route('plantas.index') !!}"><span>Plantas</span></a></li>
    </ul>
</li>

