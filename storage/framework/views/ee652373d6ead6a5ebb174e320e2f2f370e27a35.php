<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="plantas-table">
<thead class="bg-success">
    <tr>
        <th>Razón social</th>
        <th>Planta</th>
        <th>Estado</th>
        <th>Ciudad</th>
        <th>C.P.</th>
        <th>Teléfono</th>
        <th colspan=""></th>
    </tr>
</thead> 
<tbody>
    <?php $__currentLoopData = $plantas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo $planta->nombre; ?></td>
        <td><?php echo $planta->id_planta; ?></td>
        <td><?php echo $planta->nestado; ?></td>
        <td><?php echo $planta->municipio; ?></td>
        <td><?php echo $planta->cp; ?></td>
        <td><?php echo $planta->telefono; ?></td>
        <td>
            <?php echo Form::open(['route' => ['plantas.destroy', $planta->id], 'method' => 'delete']); ?>

            <div class='btn-group'>
                
                <a href="<?php echo route('plantas.edit', [$planta->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro?')"]); ?>

            </div>
            <?php echo Form::close(); ?>

        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>

<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/plantas/table.blade.php ENDPATH**/ ?>