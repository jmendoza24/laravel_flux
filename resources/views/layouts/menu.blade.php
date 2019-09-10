<li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Catalogos</span></a>
    <ul class="menu-content">       
        <li class="{{ Request::is('clientes*') ? 'active' : '' }}"><a href="{!! route('clientes.index') !!}"><span>Clientes</span></a></li>
        <li class="{{ Request::is('equipos*') ? 'active' : '' }}"><a href="{!! route('equipos.index') !!}">Equipos</span></a></li>
        <li class="{{ Request::is('plantas*') ? 'active' : '' }}"><a href="{!! route('plantas.index') !!}"><span>Plantas</span></a></li>
        <li class="{{ Request::is('productos*') ? 'active' : '' }}"><a href="{!! route('productos.index') !!}"><span>Productos</span></a></li>
        <li class="{{ Request::is('proveedores*') ? 'active' : '' }}"><a href="{!! route('proveedores.index') !!}"><span>Proveedores</span></a></li>
    </ul>
</li>
<li class=" nav-item"><a href="#"><i class="ft-folder"></i><span class="menu-title" data-i18n="">Subcatalogos</span></a>
    <ul class="menu-content">       
        <li class="{{ Request::is('procesos*') ? 'active' : '' }}"><a href="{!! route('procesos.index') !!}">Procesos</span></a></li>
        <li class="{{ Request::is('subprocesos*') ? 'active' : '' }}"><a href="{!! route('subprocesos.index') !!}"><span>Subprocesos</span></a></li>
        <li class="{{ Request::is('puestos*') ? 'active' : '' }}"><a href="{!! route('puestos.index') !!}"><span>Puestos</span></a></li>
        <li class="{{ Request::is('departamentos*') ? 'active' : '' }}"><a href="{!! route('departamentos.index') !!}"><span>Departamentos</span></a></li>
        <li class="{{ Request::is('familias*') ? 'active' : '' }}"><a href="{!! route('familias.index') !!}"><span>Familias</span></a></li>
        <li class="{{ Request::is('tipoEquipos*') ? 'active' : '' }}"><a href="{!! route('tipoEquipos.index') !!}">Tipo Equipos</span></a></li>
        <li class="{{ Request::is('tipoMaterials*') ? 'active' : '' }}"><a href="{!! route('tipoMaterials.index') !!}">Tipo Materials</span></a></li>
        <li class="{{ Request::is('grados*') ? 'active' : '' }}"><a href="{!! route('grados.index') !!}">Grados</span></a></li>
        <li class="{{ Request::is('formas*') ? 'active' : '' }}"><a href="{!! route('formas.index') !!}">Formas</span></a></li>
        <li class="{{ Request::is('incomeTerms*') ? 'active' : '' }}"><a href="{!! route('incomeTerms.index') !!}">Income Terms</span></a></li>
    </ul>
</li>




