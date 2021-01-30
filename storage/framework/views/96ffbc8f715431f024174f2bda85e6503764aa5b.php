<li class=" nav-item"><a href="#"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Catálogos</span></a>
    <ul class="menu-content">       
        <li class="<?php echo e(Request::is('clientes*') ? 'active' : ''); ?>"><a href="<?php echo route('clientes.index'); ?>"><span>Clientes</span></a></li>
        <li class="<?php echo e(Request::is('equipos*') ? 'active' : ''); ?>"><a href="<?php echo route('equipos.index'); ?>">Equipos</span></a></li>
        <li class="<?php echo e(Request::is('materiales*') ? 'active' : ''); ?>"><a href="<?php echo route('materiales.index'); ?>"><span>Inv. Materiales</span></a></li>
        <li class="<?php echo e(Request::is('plantas*') ? 'active' : ''); ?>"><a href="<?php echo route('plantas.index'); ?>"><span>Plantas</span></a></li>
        <li class="<?php echo e(Request::is('productos*') ? 'active' : ''); ?>"><a href="<?php echo route('productos.index'); ?>"><span>Piezas</span></a></li>
        <li class="<?php echo e(Request::is('proveedores*') ? 'active' : ''); ?>"><a href="<?php echo route('proveedores.index'); ?>"><span>Proveedores</span></a></li>
        <li class=" nav-item"><a href="#"><i class="ft-folder"></i><span class="menu-title" data-i18n="">Subcatálogos</span></a>
            <ul class="menu-content">       
                <li class="<?php echo e(Request::is('procesos*') ? 'active' : ''); ?>"><a href="<?php echo route('procesos.index'); ?>">Procesos</span></a></li>
                <li class="<?php echo e(Request::is('subprocesos*') ? 'active' : ''); ?>"><a href="<?php echo route('subprocesos.index'); ?>"><span>Subprocesos</span></a></li>
                <li class="<?php echo e(Request::is('puestos*') ? 'active' : ''); ?>"><a href="<?php echo route('puestos.index'); ?>"><span>Puestos</span></a></li>
                <li class="<?php echo e(Request::is('departamentos*') ? 'active' : ''); ?>"><a href="<?php echo route('departamentos.index'); ?>"><span>Departamentos</span></a></li>
                <li class="<?php echo e(Request::is('familias*') ? 'active' : ''); ?>"><a href="<?php echo route('familias.index'); ?>"><span>Familias</span></a></li>
                <li class="<?php echo e(Request::is('tipoEquipos*') ? 'active' : ''); ?>"><a href="<?php echo route('tipoEquipos.index'); ?>">Tipo de equipos</span></a></li>
                <li class="<?php echo e(Request::is('tipoMaterials*') ? 'active' : ''); ?>"><a href="<?php echo route('tipoMaterials.index'); ?>">Tipo de Materiales</span></a></li>
                <li class="<?php echo e(Request::is('grados*') ? 'active' : ''); ?>"><a href="<?php echo route('grados.index'); ?>">Grados</span></a></li>
                <li class="<?php echo e(Request::is('formas*') ? 'active' : ''); ?>"><a href="<?php echo route('formas.index'); ?>">Formas</span></a></li>
                <li class="<?php echo e(Request::is('incomeTerms*') ? 'active' : ''); ?>"><a href="<?php echo route('incomeTerms.index'); ?>">Incoterms</span></a></li>
                <li class="<?php echo e(Request::is('actividades*') ? 'active' : ''); ?>"><a href="<?php echo route('actividades.index'); ?>"><span>Actividades</span></a></li>
                <!--<li class="<?php echo e(Request::is('documentos*') ? 'active' : ''); ?>"><a href="<?php echo route('documentos.index'); ?>"><span>Documentos</span></a></li>-->
                <li class="<?php echo e(Request::is('condiciones*') ? 'active' : ''); ?>"><a href="<?php echo route('condiciones.index'); ?>"><span>Condiciones</span></a></li>
                <li class="<?php echo e(Request::is('tipoaceros*') ? 'active' : ''); ?>"><a href="<?php echo route('tipoaceros.index'); ?>"><span>Tipos de aceros</span></a></li>
                <li class="<?php echo e(Request::is('tipoestructuras*') ? 'active' : ''); ?>"><a href="<?php echo route('tipoestructuras.index'); ?>"><span>Tipos de estructuras</span></a></li>
                <li class="<?php echo e(Request::is('catalogoFormas*') ? 'active' : ''); ?>"><a href="<?php echo route('catalogoFormas.index'); ?>"><span>Catálogo Formas</span></a></li>
            </ul>
        </li>
    </ul>
</li>
<!--
<li class="nav-item"><a href="#"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Cotizaciones</span></a>
    <ul class="menu-content">       
        <li class="<?php echo e(Request::is('cotizaciones*') ? 'active' : ''); ?>"><a href="<?php echo route('cotizaciones.index'); ?>"><span>Nueva cotización</span></a></li>
        <li class="<?php echo e(Request::is('historia*') ? 'active' : ''); ?>"><a href="<?php echo route('cotizaciones.historia'); ?>"><span>Historial</span></a></li>
    </ul>
</li>--->
<li class=" nav-item <?php echo e(Request::is('historia*') ? 'active' : ''); ?>">
    <a href="<?php echo route('cotizaciones.historia'); ?>">
        <i class="ft-credit-card"></i>
        <span class="menu-title" data-i18n="">Cotizaciones</span>
    </a>
</li>
<li class=" nav-item <?php echo e(Request::is('ordenesCompras*') ? 'active' : ''); ?>">
    <a href="<?php echo route('ordenesCompras.index'); ?>">
        <i class="ft-bar-chart-2"></i>
        <span class="menu-title" data-i18n="">Ordenes de trabajo</span>
    </a>
</li>

<li class=" nav-item <?php echo e(Request::is('traficos*') ? 'active' : ''); ?>">
    <a href="<?php echo route('traficos.index'); ?>">
        <i class="ft-sliders"></i>
        <span class="menu-title" data-i18n="">Tráfico</span>
    </a>
</li>
<li class=" nav-item <?php echo e(Request::is('factura*') ? 'active' : ''); ?>">
    <a href="<?php echo route('factura.index'); ?>">
        <i class="ft-smartphone"></i>
        <span class="menu-title" data-i18n="">Facturación</span>
    </a>
</li>

<li class="<?php echo e(Request::is('tblRhs*') ? 'active' : ''); ?>">
    <a href="<?php echo route('tblRhs.index'); ?>"><i class="ft-users"></i><span>RH</span></a>
</li>


<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/layouts/menu.blade.php ENDPATH**/ ?>