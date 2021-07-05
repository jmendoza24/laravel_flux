<table class="table table-striped table-bordered datacol-basic-initialisation" style="" id="familias-table">
    <thead class="bg-success">
        <tr>
            <th>Familia</th>
            <th>Descripción</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $familia->familia; ?></td>
        <td><?php echo $familia->descripcion; ?></td>
            <td>
                <?php echo Form::open(['route' => ['familias.destroy', $familia->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('familias.edit', [$familia->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar esta familia?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/familias/table.blade.php ENDPATH**/ ?>