<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#active32" aria-controls="active32"
    aria-expanded="true"><i class="ft-user"></i> Información general</a>
  </li>
  <?php if($editar ==1): ?>
  <li class="nav-item">
    <a class="nav-link" id="link-tab32" data-toggle="tab" href="#link32" aria-controls="link32"
    aria-expanded="false"><i class="ft-mail"></i> Historial</a>
  </li>
  <?php endif; ?>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active in" id="active32" aria-labelledby="active-tab32" aria-expanded="true">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="descripcion">Nombre</label>
            <div class="col-md-9">
              <?php echo Form::text('nombre', null, ['class' => 'form-control','required']); ?>

              <div class="invalid-feedback">Este campo es requerido.</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="familia">Marca</label>
            <div class="col-md-9">          
                <?php echo Form::text('marca', null, ['class' => 'form-control','required']); ?>

                <div class="invalid-feedback">Este campo es requerido.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="empresa">Modelo</label>
            <div class="col-md-9">
              <?php echo Form::text('modelo', null, ['class' => 'form-control','required']); ?>

              <div class="invalid-feedback">Este campo es requerido.</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput2">Serie</label>
            <div class="col-md-9">
              <?php echo Form::text('serie', null, ['class' => 'form-control','required']); ?>

              <div class="invalid-feedback">Este campo es requerido.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Pedimento</label>
            <div class="col-md-9">
              <?php echo Form::text('pedimento', null, ['class' => 'form-control']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Tipo</label>
            <div class="col-md-9">
              <?php echo Form::number('tipo', null, ['class' => 'form-control']); ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Ubicación en Planta</label>
            <div class="col-md-9">
              <?php echo Form::text('base', null, ['class' => 'form-control']); ?>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Ultima Calibración</label>
            <div class="col-md-9">

                <input disabled="disabled" type="text" name="calibracion"  <?php if($valida==1): ?>   <?php if($calibracion==""): ?>  value=""  <?php else: ?>  value="<?php echo e(date("m-d-Y",strtotime($calibracion))); ?>"  <?php endif; ?>     <?php else: ?> value=""  <?php endif; ?>  id="calibracion" class="form-control">

            </div>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Planta</label>
            <div class="col-md-9">
               <select class="form-control select2" id="planta" name="planta" style="width: 100%;">
                <option value="0">Seleccione...</option>
                <?php $__currentLoopData = $plantas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($planta->id); ?>" <?php if($valida==1): ?> <?php echo e(($equipos->planta==$planta->id) ? 'selected' : ''); ?>  <?php endif; ?>   ><?php echo e($planta->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
               </div>
          </div>
        </div>
     
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Ultimo Mtto. Preventivo</label>
            <div class="col-md-9">

              <input disabled="disabled" type="text" name="preventivo" value="<?php echo e($preventivo); ?>"   id="correctivo" class="form-control">


            </div>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1"></label>
            <div class="col-md-9">
            
            </div>
          </div>
        </div>
     
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Ultimo Mtto. Correctivo</label>
            <div class="col-md-9">
                <input disabled="disabled" type="text" name="correctivo" value="<?php echo e($correctivo != '0000-00-00' ? $correctivo :''); ?>"   class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1"></label>
            <div class="col-md-9">
            
            </div>
          </div>
        </div>
     
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Proximo Mtto.</label>
            <div class="col-md-9">
              <input type="date" name="mantenimiento"  value="<?php echo e(substr($equipos->mantenimiento,0,10)); ?>"  id="mantenimiento" class="form-control">
            </div>
          </div>
        </div>
      </div>


      <div class="row">
       <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1"></label>
            <div class="col-md-9">
            
            </div>
          </div>
        </div>
     
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Activo</label>
            <div class="col-md-9">

             <select class="form-control" id="activo" name="activo">
                <option value="">Seleccione una opción:</option>
                  <?php if($editar ==1): ?>

                <option value="1" <?php echo e(($equipos->activo==1) ? 'selected' : ''); ?>>Si</option>
                <option value="0" <?php echo e(($equipos->activo==0) ? 'selected' : ''); ?>>No</option>
                <?php else: ?>

                <option value="1" >Si</option>
                <option value="0" >No</option>
                <?php endif; ?>
            </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-actions right">
        <a href="<?php echo e(route('equipos.index')); ?>">
      <button type="button" class="btn btn-warning mr-1">
        <i class="ft-x"></i> Cancel
      </button>
      </a>
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-check-square-o"></i> Guardar
      </button>
      </div>
  </div>
  <?php if($editar ==1): ?>
  <div class="tab-pane" id="link32" role="tabpanel" aria-labelledby="link-tab32" aria-expanded="false">
    <div class="nav-vertical">
      <ul class="nav nav-tabs nav-left nav-border-left" >
        <li class="nav-item">
          <a class="nav-link active" style="width: 100%;" id="baseVerticalLeft2-tab1" data-toggle="tab" aria-controls="tabVerticalLeft21"
          href="#tabVerticalLeft21" aria-expanded="true">Calibración</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="baseVerticalLeft2-tab2" data-toggle="tab" aria-controls="tabVerticalLeft22"
          href="#tabVerticalLeft22" aria-expanded="false">Mtto. Preventivo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="baseVerticalLeft2-tab3" data-toggle="tab" aria-controls="tabVerticalLeft23"
          href="#tabVerticalLeft23" aria-expanded="false">Mtto. Correctivo</a>
        </li>
      </ul>
      <div class="tab-content px-1">
          <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft21" aria-expanded="true" aria-labelledby="baseVerticalLeft2-tab1">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>

                     <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,0,1,'',1,<?php echo e($equipos->id); ?>)" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;">+ Calibración</span>

                  </h1>
              </div>
              <div class="col-md-12" id="equipo_historial">
                <?php echo $__env->make('equipo_historials.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tabVerticalLeft22" aria-labelledby="baseVerticalLeft2-tab2">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>
                     <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,0,1,'',2,<?php echo e($equipos->id); ?>)" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;">+ Preventivo</a>

                  </h1>
              </div>
              <div class="col-md-12" id="equipo_histPrev">
                <?php echo $__env->make('equipo_historials.table_preventivo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tabVerticalLeft23" aria-labelledby="baseVerticalLeft2-tab3">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>
                     <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,0,1,'',3,<?php echo e($equipos->id); ?>)" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;">+ Correctivo</a>
                  </h1>
              </div>
              <div class="col-md-12" id="equipo_histCorrect">
                <?php echo $__env->make('equipo_historials.table_correctivo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
          </div>
        </div>

    </div>

  </div>
<?php endif; ?>

</div>                    
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/equipos/fields.blade.php ENDPATH**/ ?>