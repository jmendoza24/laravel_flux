<table class="table table-striped table-bordered zero-configuration" style="" id="departamentos-table">
    <thead class="bg-success">
        <tr>
            <th>Departamento</th>
            <th colspan=""></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departamentos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $departamentos->departamento; ?></td>
            <td>
                <?php echo Form::open(['route' => ['departamento.destroy', $departamentos->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    <a href="<?php echo route('departamento.edit', [$departamentos->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('Estas seguro deseas eliminar este departamento?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/departamento/table.blade.php ENDPATH**/ ?>