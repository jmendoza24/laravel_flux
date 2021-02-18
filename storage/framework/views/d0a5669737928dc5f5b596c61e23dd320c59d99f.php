<div class="row">
        <div class="col-md-2 text-right">
          <span class="btn btn-outline-success mr-1" data-toggle="modal" data-target="#primary"  onclick="ver_catalogo(3,0,1,'',<?php echo e($tblRh->id); ?>,2)"><i class="fa fa-plus"></i> Nuevo Documento</span>
        </div>
        <?php $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($ar->id_documento == 6): ?>
            <div class="col-md-2 text-center"><a href="<?php echo e($ar->archivo); ?>" target="_blank"> <i class="fa fa-file-pdf-o"></i> Solicitud de trabajo</a></div>
          <?php endif; ?>
          <?php if($ar->id_documento == 7): ?>
            <div class="col-md-2 text-center"> <a href="<?php echo e($ar->archivo); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Contrato individual</a></div>
          <?php endif; ?>
          <?php if($ar->id_documento == 8): ?>
            <div class="col-md-2 text-center"> <a href="<?php echo e($ar->archivo); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Hoja de entrevista</a></div>
          <?php endif; ?>
          <?php if($ar->id_documento == 11): ?>
            <div class="col-md-2 text-center"> <a href="<?php echo e($ar->archivo); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i> Evaluación de Periodo de Prueba</a></div>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>
      <br><br>
      <div class="row">
      <div class="col-md-6">
      <h3>VIRTUS Resultados de Prueba  <?php $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($ar->id_documento == 9): ?>
                                           <a href="<?php echo e($ar->archivo); ?>"> <span class="btn btn-sm btn-outline-success pull-right"><i class="fa fa-file-pdf-o"></i></span></a>
                                          <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </h3> 
        <table class="table table-bordered table-striped compact">
        <thead class="bg-success">
            <tr>
                <th>Prueba</th>
                <th colspan="">Resultado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Emociones Positivas</td>
                <td><input type="text" style="width: 100px; padding: 1px;"  id="Emociones" value="<?php echo e($virtus->Emociones); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Pensamientos Negativos</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Pensamientos" value="<?php echo e($virtus->Pensamientos); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Compromiso & Enfoque</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Compromiso" value="<?php echo e($virtus->Compromiso); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Relaciones Positivas</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Relaciones" value="<?php echo e($virtus->Relaciones); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Sentido</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Sentido" value="<?php echo e($virtus->Sentido); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Logros</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Logros" value="<?php echo e($virtus->Logros); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Salud</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Salud" value="<?php echo e($virtus->Salud); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Soledad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Soledad" value="<?php echo e($virtus->Soledad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Felicidad Autoevaluación</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;"  id="Felicidad" value="<?php echo e($virtus->Felicidad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Felicidad Promedio</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Promedio" value="<?php echo e($virtus->Promedio); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Sabiduria</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Sabiduria" value="<?php echo e($virtus->Sabiduria); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Valor" value="<?php echo e($virtus->Valor); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Humanidad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Humanidad" value="<?php echo e($virtus->Humanidad); ?>" class="mask form-control  form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Justicia</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Justicia" value="<?php echo e($virtus->Justicia); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
             <tr>
                <td>Trascendencia</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Trascendencia" value="<?php echo e($virtus->Trascendencia); ?>" class="mask form-control  form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Templanza</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Templanza" value="<?php echo e($virtus->Templanza); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Creatividad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Creatividad" value="<?php echo e($virtus->Creatividad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Amor por el Aprendizaje</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Amor" value="<?php echo e($virtus->Amor); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Curiosidad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Curiosidad" value="<?php echo e($virtus->Curiosidad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Perspectiva</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Perspectiva" value="<?php echo e($virtus->Perspectiva); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Juicio</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Juicio" value="<?php echo e($virtus->Juicio); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Honestidad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Honestidad" value="<?php echo e($virtus->Honestidad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
             <tr>
                <td>Perseverancia</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Perseverancia" value="<?php echo e($virtus->Perseverancia); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
             <tr>
                <td>Entusiasmo</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Entusiasmo" value="<?php echo e($virtus->Entusiasmo); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
             <tr>
                <td>Valentia</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Valentia" value="<?php echo e($virtus->Valentia); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Amabilidad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Amabilidad" value="<?php echo e($virtus->Amabilidad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>

            <tr>
                <td>Inteligencia Social</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Inteligencia"  value="<?php echo e($virtus->Inteligencia); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Amor</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Amor_amor" value="<?php echo e($virtus->Amor_amor); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Equidad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Equidad" value="<?php echo e($virtus->Equidad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
             <tr>
                <td>Liderazgo</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Liderazgo" value="<?php echo e($virtus->Liderazgo); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
             <tr>
                <td>Trabajo de Equipo</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Trabajo" value="<?php echo e($virtus->Trabajo); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Esperitualidad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Esperitualidad" value="<?php echo e($virtus->Esperitualidad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Gratitud</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Gratitud" value="<?php echo e($virtus->Gratitud); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Esperanza</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Esperanza" value="<?php echo e($virtus->Esperanza); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Buen Humor</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Humor" value="<?php echo e($virtus->Humor); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Apreciacion por la Belleza</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Belleza" value="<?php echo e($virtus->Belleza); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Prudencia</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Prudencia" value="<?php echo e($virtus->Prudencia); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Humildad</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Humildad"  value="<?php echo e($virtus->Humildad); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Perdon</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;"   id="Perdon" value="<?php echo e($virtus->Perdon); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
            <tr>
                <td>Auto Control</td>
                <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Control" value="<?php echo e($virtus->Control); ?>" class="mask form-control form-control-sm" onchange="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
            </tr>
        </tbody>
      </table>
      </div>  
      <div class="col-md-6">
        <h3>Resultado Myers Briggs <?php $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($ar->id_documento == 10): ?>
                                           <a href="<?php echo e($ar->archivo); ?>"> <span class="btn btn-sm btn-outline-success pull-right"><i class="fa fa-file-pdf-o"></i></span></a>
                                          <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </h3> 
        <table class="table table-striped table-bordered" style="" id="productos-table">
          <thead class="bg-success">
              <tr>
                  <th>Nombre</th>
                  <th>Resultado </th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Introversión (I)</td>
                  <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Introversion" value="<?php echo e($MyersBriggs->Introversion); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
              <tr>
                  <td>Extroversión (E)</td>
                  <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Extroversion" value="<?php echo e($MyersBriggs->Extroversion); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
              <tr>
                  <td>Intuitivo (N)</td>
                  <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Intuitivo" value="<?php echo e($MyersBriggs->Intuitivo); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
              <tr>
                  <td>Sensorial (S)</td>
                  <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Sensorial" value="<?php echo e($MyersBriggs->Sensorial); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
              <tr>
                  <td>Pensamiento (T)</td>
                  <td><input type="text" name=""style="width: 100px; padding: 1px;" id="Pensamiento" value="<?php echo e($MyersBriggs->Pensamiento); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
              <tr>
                  <td>IEmocional (F)</td>
                  <td><input type="text" name="" style="width: 100px; padding: 1px;" id="IEmocional" value="<?php echo e($MyersBriggs->IEmocional); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
              <tr>
                  <td>Calificador (J)</td>
                  <td><input type="text" name="" style="width: 100px; padding: 1px;"id="Calificador" value="<?php echo e($MyersBriggs->Calificador); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
              <tr>
                  <td>Perceptivo (P)</td>
                  <td><input type="text" name="" style="width: 100px; padding: 1px;" id="Perceptivo" value="<?php echo e($MyersBriggs->Perceptivo); ?>" class="mask form-control form-control-sm" onchange="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
              </tr>
          
          </tbody>
        </table>
        
      </div>
    </div>          

    <div class="row">
      <div class="col-md-12">
        <h3>Evaluación Anual </h3>    
        <table class="table table-striped table-bordered" style="" id="productos-table" style="width: 100%">
          <thead class="bg-success">
              <tr>
                  <th>Nombre</th>
                  <th>Documento</th>
                  <th>Fecha</th>
                  <th colspan=""></th>

              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Nombre prueba</td>
                  <td>doc</td>
                  <td><?php echo e($virtus->Fecha); ?></td>
                  <td></td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>   <?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/expediente.blade.php ENDPATH**/ ?>