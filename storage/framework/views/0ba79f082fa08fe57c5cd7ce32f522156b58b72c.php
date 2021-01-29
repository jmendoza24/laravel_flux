<table class="table display nowrap table-striped table-bordered scroll-horizontal" id="clientes-table">
    <thead class="bg-success">
        <tr>
            <th>Nombre Corto</th>                
            <th>País</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>C.P.</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo $clientes->nombre_corto; ?></td>
            <td><?php echo $clientes->npais; ?></td>
            <td><?php echo $clientes->nestado; ?></td>
            <td><?php echo $clientes->nmunicipio; ?></td>
            <td><?php echo $clientes->cp; ?></td>
            <td>
                <?php echo Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete']); ?>

                <div class='btn-group'>
                    
                    <a href="<?php echo route('clientes.edit', [$clientes->id]); ?>" class='btn btn-float btn-outline-success btn-round'><i class="fa fa-edit"></i></a>
                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-outline-danger btn-round', 'onclick' => "return confirm('¿Deseas borrar esta información?')"]); ?>

                </div>
                <?php echo Form::close(); ?>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /var/www/html/flux/laravel/resources/views/clientes/table.blade.php ENDPATH**/ ?>