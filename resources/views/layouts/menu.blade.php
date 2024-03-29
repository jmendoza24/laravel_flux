<li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Catálogos</span></a>
    <ul class="menu-content">       
        <li class="{{ Request::is('clientes*') ? 'active' : '' }}"><a href="{!! route('clientes.index') !!}"><span>Clientes</span></a></li>
        <li class="{{ Request::is('equipos*') ? 'active' : '' }}"><a href="{!! route('equipos.index') !!}">Equipos</span></a></li>
        <li class="{{ Request::is('materiales*') ? 'active' : '' }}"><a href="{!! route('materiales.index') !!}"><span>Inv. Materiales</span></a></li>
        <li class="{{ Request::is('plantas*') ? 'active' : '' }}"><a href="{!! route('plantas.index') !!}"><span>Plantas</span></a></li>
        <li class="{{ Request::is('productos*') ? 'active' : '' }}"><a href="{!! route('productos.index') !!}"><span>Piezas</span></a></li>
        <li class="{{ Request::is('proveedores*') ? 'active' : '' }}"><a href="{!! route('proveedores.index') !!}"><span>Proveedores</span></a></li>
        <li class=" nav-item"><a href="#"><i class="ft-folder"></i><span class="menu-title" data-i18n="">Subcatálogos</span></a>
            <ul class="menu-content">       
                <li class="{{ Request::is('procesos*') ? 'active' : '' }}"><a href="{!! route('procesos.index') !!}">Procesos</span></a></li>
                <li class="{{ Request::is('subprocesos*') ? 'active' : '' }}"><a href="{!! route('subprocesos.index') !!}"><span>Subprocesos</span></a></li>
                <li class="{{ Request::is('puestos*') ? 'active' : '' }}"><a href="{!! route('puestos.index') !!}"><span>Puestos</span></a></li>
                <li class="{{ Request::is('departamento*') ? 'active' : '' }}"><a href="{!! route('departamento.index') !!}"><span>Departamentos</span></a></li>
                {{-- <li class="{{ Request::is('departamentos*') ? 'active' : '' }}"><a href="{!! route('departamentos.index') !!}"><span>Departamentos</span></a></li> --}}
                <li class="{{ Request::is('familias*') ? 'active' : '' }}"><a href="{!! route('familias.index') !!}"><span>Familias</span></a></li>
                <li class="{{ Request::is('tipoEquipos*') ? 'active' : '' }}"><a href="{!! route('tipoEquipos.index') !!}">Tipo de equipos</span></a></li>
                <li class="{{ Request::is('tipoMaterials*') ? 'active' : '' }}"><a href="{!! route('tipoMaterials.index') !!}">Tipo de Materiales</span></a></li>
                <li class="{{ Request::is('grados*') ? 'active' : '' }}"><a href="{!! route('grados.index') !!}">Grados</span></a></li>
                <li class="{{ Request::is('formas*') ? 'active' : '' }}"><a href="{!! route('formas.index') !!}">Formas</span></a></li>
                <li class="{{ Request::is('incomeTerms*') ? 'active' : '' }}"><a href="{!! route('incomeTerms.index') !!}">Incoterms</span></a></li>
                <li class="{{ Request::is('actividades*') ? 'active' : '' }}"><a href="{!! route('actividades.index') !!}"><span>Actividades</span></a></li>
                <!--<li class="{{ Request::is('documentos*') ? 'active' : '' }}"><a href="{!! route('documentos.index') !!}"><span>Documentos</span></a></li>-->
                <li class="{{ Request::is('condiciones*') ? 'active' : '' }}"><a href="{!! route('condiciones.index') !!}"><span>Condiciones</span></a></li>
                <li class="{{ Request::is('tipoaceros*') ? 'active' : '' }}"><a href="{!! route('tipoaceros.index') !!}"><span>Tipos de aceros</span></a></li>
                <li class="{{ Request::is('tipoestructuras*') ? 'active' : '' }}"><a href="{!! route('tipoestructuras.index') !!}"><span>Tipos de estructuras</span></a></li>
                <li class="{{ Request::is('catalogoFormas*') ? 'active' : '' }}"><a href="{!! route('catalogoFormas.index') !!}"><span>Catálogo Formas</span></a></li>
            </ul>
        </li>
    </ul>
</li>
<!--
<li class="nav-item"><a href="#"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Cotizaciones</span></a>
    <ul class="menu-content">       
        <li class="{{ Request::is('cotizaciones*') ? 'active' : '' }}"><a href="{!! route('cotizaciones.index') !!}"><span>Nueva cotización</span></a></li>
        <li class="{{ Request::is('historia*') ? 'active' : '' }}"><a href="{!! route('cotizaciones.historia') !!}"><span>Historial</span></a></li>
    </ul>
</li>--->
<li class=" nav-item {{ Request::is('historia*') ? 'active' : '' }}">
    <a href="{!! route('cotizaciones.historia') !!}">
        <i class="ft-credit-card"></i>
        <span class="menu-title" data-i18n="">Cotizaciones</span>
    </a>
</li>
<li class=" nav-item {{ Request::is('ordenesCompras*') ? 'active' : '' }}">
    <a href="{!! route('ordenesCompras.index') !!}">
        <i class="ft-bar-chart-2"></i>
        <span class="menu-title" data-i18n="">Ordenes de trabajo</span>
    </a>
</li>

<li class=" nav-item {{ Request::is('traficos*') ? 'active' : '' }}">
    <a href="{!! route('traficos.index') !!}">
        <i class="ft-sliders"></i>
        <span class="menu-title" data-i18n="">Tráfico</span>
    </a>
</li>
<li class=" nav-item {{ Request::is('factura*') ? 'active' : '' }}">
    <a href="{!! route('factura.index') !!}">
        <i class="ft-smartphone"></i>
        <span class="menu-title" data-i18n="">Facturación</span>
    </a>
</li>

<li class="{{ Request::is('tblRhs*') ? 'active' : '' }}">
    <a href="{!! route('tblRhs.index') !!}"><i class="ft-users"></i><span>RH</span></a>
</li>


