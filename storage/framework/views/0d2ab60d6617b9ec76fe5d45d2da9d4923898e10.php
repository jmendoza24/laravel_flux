<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#active32" aria-controls="active32"
    aria-expanded="true"><i class="ft-user"></i>General</a>
  </li>
  <?php if($editar ==1): ?>
  <li class="nav-item">
    <a class="nav-link" id="link-tab32" data-toggle="tab" href="#link32" aria-controls="link32"
    aria-expanded="false"><i class="fa fa-check-square-o"></i>Información</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link-tab33" data-toggle="tab" href="#link33" aria-controls="link33"
    aria-expanded="false"><i class="fa fa-money"></i>Sueldos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link-tab34" data-toggle="tab" href="#link34" aria-controls="link34"
    aria-expanded="false"><i class="fa fa-file-text-o"></i>Expediente</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="link-tab35" data-toggle="tab" href="#link35" aria-controls="link34"
    aria-expanded="false"><i class="fa fa-pencil"></i>Evaluaciones</a>
  </li>
  <?php endif; ?>
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active in" id="active32" aria-labelledby="active-tab32" aria-expanded="true">
    <div class="form-body" style="">                        
        <div class="row">
      
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Nombre</label>
              <div class="col-md-9">
                  <?php echo Form::text('nombre', null, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Num Empleado</label>
              <div class="col-md-9">
                <?php echo Form::text('num_empleado', null, ['class' => 'form-control']); ?>


              </div> 
            </div>
            </div>
        </div>
          <div class="row">
      
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Contrato</label>
              <div class="col-md-9">
                  <?php echo Form::text('contrato', null, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>
         <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Activo</label>
              <div class="col-md-9">
                <select class="form-control select2" name="estatus" id="estatus" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                  <?php if(empty($tblRh->estatus)): ?>

                  <option value="1" >Si</option>
                  <option value="2" >No</option>
                  <?php else: ?>

                  <option value="1" <?php echo e(($tblRh->estatus==1) ? 'selected' : ''); ?>>Si</option>
                  <option value="2" <?php echo e(($tblRh->estatus==2) ? 'selected' : ''); ?>>No</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Tel. Celular</label>
              <div class="col-md-9">
                  <?php echo Form::text('tcf', null, ['class' => 'form-control international-inputmask']); ?>

              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Tel. Casa</label>
              <div class="col-md-9">
                <?php echo Form::text('tc', null, ['class' => 'form-control international-inputmask']); ?>

              </div> 
            </div>
           </div>
        </div>

        <div class="row">
          <div class="col-md-6">
             <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Correo</label>
              <div class="col-md-9">
                <?php echo Form::text('correo', null, ['class' => 'form-control email-inputmask' ]); ?>


              </div> 
            </div>
          </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Genero</label>
              <div class="col-md-9">
                <select class="form-control select2" name="genero" id="genero" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                  <?php if(empty($tblRh->genero)): ?>
                   <option value="1" >Masculino</option>
                  <option value="2" >Femenino</option>
                  <option value="3" >Otro</option>
               
                  <?php else: ?>
                       <option value="1" <?php echo e(($tblRh->genero==1) ? 'selected' : ''); ?>>Masculino</option>
                      <option value="2" <?php echo e(($tblRh->genero==2) ? 'selected' : ''); ?>>Femenino</option>
                      <option value="3" <?php echo e(($tblRh->genero==3) ? 'selected' : ''); ?>>Otro</option>
                   
                  <?php endif; ?>
                  </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Fecha nac.</label>
              <div class="col-md-9">

                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" <?php if(empty($tblRh->fecha_nacimiento)): ?> value="" <?php else: ?>  value="<?php echo e(date_format($tblRh->fecha_nacimiento, 'Y-m-d')); ?>" <?php endif; ?> >
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Lugar Nac.</label>
              <div class="col-md-9">
                <?php echo Form::text('lugar_nacimiento', null, ['class' => 'form-control']); ?>


              </div> 
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Num. IMSS</label>
              <div class="col-md-9">
                      <?php echo Form::text('imss', null, ['class' => 'form-control']); ?>

                 </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Alta IMSS</label>
              <div class="col-md-9">
                <input type="file" name="doc_imss" id="doc_imss" class="form-control">
                 </div>
            </div>
          </div>
        </div>
         <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">RFC</label>
              <div class="col-md-9">
                  <?php echo Form::text('rfc', null, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">CURP</label>
              <div class="col-md-9">
                <?php echo Form::text('curp', null, ['class' => 'form-control']); ?>


              </div> 
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Doc. Identificación</label>
              <div class="col-md-9">
                <input type="file" name="identificacion" id="identificacion" class="form-control">
                 </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Fecha (Doc. Identificación)</label>
              <div class="col-md-9">
                <input type="text" name="fecha_subida" id="fecha_subida" class="form-control" disabled="disabled"> 
              </div> 
            </div>
          </div>
            
        </div>
        <div class="row">   
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Escolaridad</label>
              <div class="col-md-9">
                <select class="form-control select2" name="grado_escolaridad" id="grado_escolaridad" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                  <option value="1" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==1) ? 'selected' : ''); ?> <?php endif; ?> >Escuela Técnica</option>
                  <option value="2" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==2) ? 'selected' : ''); ?> <?php endif; ?>>Preparatoria</option>
                  <option value="3" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==3) ? 'selected' : ''); ?> <?php endif; ?>>Universidad</option>
                  <option value="4" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==4) ? 'selected' : ''); ?> <?php endif; ?>>Nada</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Edo. civil</label>
              <div class="col-md-9">
                    <select class="form-control select2" name="edo_civil" id="edo_civil" >
                    <option value="0">Seleccione una opci&oacute;n</option>
                    <option value="1" <?php if(empty($tblRh->edo_civil)): ?>   <?php else: ?>  <?php echo e(($tblRh->edo_civil==1) ? 'selected' : ''); ?> <?php endif; ?> >Soltero</option>
                    <option value="2" <?php if(empty($tblRh->edo_civil)): ?>   <?php else: ?>  <?php echo e(($tblRh->edo_civil==2) ? 'selected' : ''); ?> <?php endif; ?>>Casado</option>
                    <option value="3" <?php if(empty($tblRh->edo_civil)): ?>   <?php else: ?>  <?php echo e(($tblRh->edo_civil==3) ? 'selected' : ''); ?> <?php endif; ?>>Divorciado</option>
                    <option value="4" <?php if(empty($tblRh->edo_civil)): ?>   <?php else: ?>  <?php echo e(($tblRh->edo_civil==4) ? 'selected' : ''); ?> <?php endif; ?>>Viudo</option>
                    <option value="5" <?php if(empty($tblRh->edo_civil)): ?>   <?php else: ?>  <?php echo e(($tblRh->edo_civil==5) ? 'selected' : ''); ?> <?php endif; ?>>Concubinato</option>
                    <option value="6" <?php if(empty($tblRh->edo_civil)): ?>   <?php else: ?>  <?php echo e(($tblRh->edo_civil==6) ? 'selected' : ''); ?> <?php endif; ?>>Separado</option>

              
                </select>
            
                 </div>
            </div>
          </div>
          
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Religión</label>
              <div class="col-md-9">
                <select class="form-control select2" name="religion" id="religion" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                    <option value="1" <?php if(empty($tblRh->religion)): ?>   <?php else: ?>  <?php echo e(($tblRh->religion==1) ? 'selected' : ''); ?>  <?php endif; ?> >Católico</option>
                    <option value="2" <?php if(empty($tblRh->religion)): ?>   <?php else: ?>  <?php echo e(($tblRh->religion==2) ? 'selected' : ''); ?>  <?php endif; ?>>Cristiano</option>
                    <option value="3" <?php if(empty($tblRh->religion)): ?>   <?php else: ?>  <?php echo e(($tblRh->religion==3) ? 'selected' : ''); ?>  <?php endif; ?>>Otro</option>
              
                </select>
              </div>
            </div>
          </div>
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Dirección</label>
              <div class="col-md-9">
               <?php echo Form::textarea('direccion', null, ['class' => 'form-control']); ?>


              </div> 
            </div>
          </div>
        </div>
    </div>
  </div> 
 
  <?php if($editar ==1): ?>
  <div class="tab-pane" id="link32" role="tabpanel" aria-labelledby="link-tab32" aria-expanded="false">

        <div class="form-body" style="">                        

        <br><h3>Contacto de Emergencia #1</h3><br>  

        <div class="row">
         <div class="col-md-6">

            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Nombre</label>
              <div class="col-md-9">
                  <?php echo Form::text('n1', null, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Casa  </label>
              <div class="col-md-9">
                     <?php echo Form::text('t1ct', null, ['class' => 'form-control international-inputmask']); ?>


                 </div>
            </div>
          </div>
          
        </div>
        <div class="row">

         
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Relación con el colaborador / Parentesco </label>
              <div class="col-md-9">
                <select class="form-control select2" style="width: 100%" name="relacion" id="relacion" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                    <option value="1" <?php echo e(($tblRh->relacion==1) ? 'selected' : ''); ?>>Padre</option>
                    <option value="2" <?php echo e(($tblRh->relacion==2) ? 'selected' : ''); ?>>Madre</option>
                    <option value="3" <?php echo e(($tblRh->relacion==3) ? 'selected' : ''); ?>>Hijo</option>
                    <option value="4" <?php echo e(($tblRh->relacion==4) ? 'selected' : ''); ?>>Conyugue</option>
                    <option value="5" <?php echo e(($tblRh->relacion==5) ? 'selected' : ''); ?>>Otro</option>


                </select>
              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Celular</label>
              <div class="col-md-9">
                      <?php echo Form::text('t1cc', null, ['class' => 'form-control international-inputmask']); ?>

                 </div>
            </div>
          </div>
          
        </div>
        <br><h3>Contacto de Emergencia #2</h3> <br>  

          <div class="row">
         <div class="col-md-6">

            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Nombre</label>
              <div class="col-md-9">
                  <?php echo Form::text('n2', null, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Casa  </label>
              <div class="col-md-9">
                     <?php echo Form::text('t2cc', null, ['class' => 'form-control international-inputmask']); ?>


                 </div>
            </div>
          </div>
          
        </div>
        <div class="row">

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Relación con el colaborador / Parentesco </label>
              <div class="col-md-9">
                <select class="form-control select2" style="width: 100%" name="relacion2" id="relacion2" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                    <option value="1" <?php echo e(($tblRh->relacion2==1) ? 'selected' : ''); ?>>Padre</option>
                    <option value="2" <?php echo e(($tblRh->relacion2==2) ? 'selected' : ''); ?>>Madre</option>
                    <option value="3" <?php echo e(($tblRh->relacion2==3) ? 'selected' : ''); ?>>Hijo</option>
                    <option value="4" <?php echo e(($tblRh->relacion2==4) ? 'selected' : ''); ?>>Conyugue</option>
                    <option value="5" <?php echo e(($tblRh->relacion2==5) ? 'selected' : ''); ?>>Otro</option>


                </select>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Celular</label>
              <div class="col-md-9">
                      <?php echo Form::text('t2ct', null, ['class' => 'form-control international-inputmask']); ?>

                 </div>
            </div>
          </div>
        </div>
        <br><h3>Equipo de seguridad</h3> <br>  

        <div class="row">
         <div class="col-md-6">

            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Talla Camisa</label>
              <div class="col-md-9">
                  <?php echo Form::text('camisa', null, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Talla Pantalón</label>
              <div class="col-md-9">
                     <?php echo Form::text('pantalon', null, ['class' => 'form-control']); ?>


                 </div>
            </div>
          </div>
          
        </div>
        <div class="row">
         <div class="col-md-6">

            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta"></label>
              <div class="col-md-9">
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">No. Calzado </label>
              <div class="col-md-9">
                     <?php echo Form::text('calzado', null, ['class' => 'form-control']); ?>


                 </div>
            </div>
          </div>
          
        </div> 
                <br><h3>Beneficiario 1</h3> <br>  

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Nombre beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('n_beneficiario', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">RFC</label>
                  <div class="col-md-9">
                    <?php echo Form::text('rfc_b1', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Domicilio beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('domicilio_bene', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Lugar de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('lugar_nacimiento_bene', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Fecha de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <input type="date" name="fecha_nacimiento_bene" id="fecha_nacimiento_bene" class="form-control" <?php if(empty($tblRh->fecha_nacimiento_bene)): ?> value=""  <?php else: ?>  value="<?php echo e(date_format($tblRh->fecha_nacimiento_bene, 'Y-m-d')); ?>" <?php endif; ?> >

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control select2" style="width: 100%" name="parentesco" id="parentesco" >
                      <option value="0">Seleccione una opci&oacute;n</option>
                        <option value="1" <?php echo e(($tblRh->parentesco==1) ? 'selected' : ''); ?>>Padre</option>
                        <option value="2" <?php echo e(($tblRh->parentesco==2) ? 'selected' : ''); ?>>Madre</option>
                        <option value="3" <?php echo e(($tblRh->parentesco==3) ? 'selected' : ''); ?>>Hijo</option>
                        <option value="4" <?php echo e(($tblRh->parentesco==4) ? 'selected' : ''); ?>>Conyugue</option>
                        <option value="5" <?php echo e(($tblRh->parentesco==5) ? 'selected' : ''); ?>>Otro</option>


                    </select>
                 

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre"></label>
                  <div class="col-md-9">

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Porcentaje</label>
                  <div class="col-md-9">
                    <?php echo Form::text('porcentaje', null, ['class' => 'form-control percentage-inputmask']); ?>


                  </div> 
                </div>
              </div>
        </div>
        <br><h3>Beneficiario 2</h3> <br>  

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Nombre beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('nombre_bene2', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">RFC</label>
                  <div class="col-md-9">
                    <?php echo Form::text('rfc_b2', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Domicilio beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('domicilio_bene2', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Lugar de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('lugar_nacimiento_bene2', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Fecha de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <input type="date" name="fecha_nacimiento_bene2" id="fecha_nacimiento_bene2" class="form-control" <?php if(empty($tblRh->fecha_nacimiento_bene2)): ?> value=""  <?php else: ?>  value="<?php echo e(date_format($tblRh->fecha_nacimiento_bene2, 'Y-m-d')); ?>" <?php endif; ?> >

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control select2" style="width: 100%" name="parentesco_bene2" id="parentesco_bene2" >
                      <option value="0">Seleccione una opci&oacute;n</option>
                        <option value="1" <?php echo e(($tblRh->parentesco_bene2==1) ? 'selected' : ''); ?>>Padre</option>
                        <option value="2" <?php echo e(($tblRh->parentesco_bene2==2) ? 'selected' : ''); ?>>Madre</option>
                        <option value="3" <?php echo e(($tblRh->parentesco_bene2==3) ? 'selected' : ''); ?>>Hijo</option>
                        <option value="4" <?php echo e(($tblRh->parentesco_bene2==4) ? 'selected' : ''); ?>>Conyugue</option>
                        <option value="5" <?php echo e(($tblRh->parentesco_bene2==5) ? 'selected' : ''); ?>>Otro</option>


                    </select>
                 

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre"></label>
                  <div class="col-md-9">

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Porcentaje</label>
                  <div class="col-md-9">
                    <?php echo Form::text('porcentaje2', null, ['class' => 'form-control percentage-inputmask']); ?>


                  </div> 
                </div>
              </div>
        </div>
        <br><h3>Beneficiario 3</h3> <br>  

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Nombre beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('nombre_bene3', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">RFC</label>
                  <div class="col-md-9">
                    <?php echo Form::text('rfc_b3', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Domicilio beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('domicilio_bene3', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Lugar de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('lugar_nacimiento_bene3', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Fecha de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <input type="date" name="fecha_nacimiento_bene3" id="fecha_nacimiento_bene3" class="form-control" <?php if(empty($tblRh->fecha_nacimiento_bene3)): ?> value=""  <?php else: ?>  value="<?php echo e(date_format($tblRh->fecha_nacimiento_bene3, 'Y-m-d')); ?>" <?php endif; ?>>

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control select2" style="width: 100%" name="parentesco_bene3" id="parentesco_bene3" >
                      <option value="0">Seleccione una opci&oacute;n</option>
                        <option value="1" <?php echo e(($tblRh->parentesco_bene3==1) ? 'selected' : ''); ?>>Padre</option>
                        <option value="2" <?php echo e(($tblRh->parentesco_bene3==2) ? 'selected' : ''); ?>>Madre</option>
                        <option value="3" <?php echo e(($tblRh->parentesco_bene3==3) ? 'selected' : ''); ?>>Hijo</option>
                        <option value="4" <?php echo e(($tblRh->parentesco_bene3==4) ? 'selected' : ''); ?>>Conyugue</option>
                        <option value="5" <?php echo e(($tblRh->parentesco_bene3==5) ? 'selected' : ''); ?>>Otro</option>


                    </select>
                 

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre"></label>
                  <div class="col-md-9">

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Porcentaje</label>
                  <div class="col-md-9">
                    <?php echo Form::text('porcentaje3', null, ['class' => 'form-control percentage-inputmask']); ?>


                  </div> 
                </div>
              </div>
        </div>

  </div>  


  </div>

  <div class="tab-pane" id="link33" role="tabpanel" aria-labelledby="link-tab33" aria-expanded="false">
       <div class="form-body" style="">                        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Puesto</label>
              <div class="col-md-9">
               <select class="form-control select2" style="width: 100%" name="puesto" id="puesto" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                  
                   <?php $__currentLoopData = $puesto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($puesto->id); ?>" 
                          <?php echo e(($tblRh->puesto == $puesto->id) ? 'selected' : ''); ?>

                        >
                        <?php echo e($puesto->puesto); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div> 
            </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-md-3 label-control" for="planta">Departamento</label>
                  <div class="col-md-9">
                         <select class="form-control select2" style="width: 100%" name="departamento" id="departamento" >
                              <option value="0">Seleccione una opci&oacute;n</option>
                              <?php $__currentLoopData = $Departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Departamentos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($Departamentos->id); ?>" 
                                
                                  <?php echo e(($tblRh->departamento == $Departamentos->id) ? 'selected' : ''); ?>

                              >
                                <?php echo e($Departamentos->departamento); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        
                  </div>
                </div>
              </div>
            </div>

        <div class="row">
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Supervisor</label>
                  <div class="col-md-9">
                    <?php echo Form::text('nombre_sup', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
              
              <div class="col-md-6">
              </div>
            </div>

        <div class="row">
          <div class="col-md-6">
           <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Fecha inicio</label>
              <div class="col-md-9">
                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" <?php if(empty($tblRh->fecha_ingreso)): ?> value=""  <?php else: ?>  value="<?php echo e(date_format($tblRh->fecha_ingreso, 'Y-m-d')); ?>" <?php endif; ?>>

              </div> 
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Fecha fin</label>
              <div class="col-md-9">
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" <?php if(empty($tblRh->fecha_fin)): ?>  value="" <?php else: ?>  value="<?php echo e(date_format($tblRh->fecha_fin, 'Y-m-d')); ?>" <?php endif; ?>>

              </div> 
            </div>
          </div>
        </div>
        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Vencimiento Periodo Prueba</label>
                  <div class="col-md-9">
                    <input type="date" name="Vencimiento_prueba" id="Vencimiento_prueba" class="form-control" <?php if(empty($tblRh->Vencimiento_prueba)): ?> value=""  <?php else: ?>  value="<?php echo e(date_format($tblRh->Vencimiento_prueba, 'Y-m-d')); ?>" <?php endif; ?>>

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Vencimiento de Contrato</label>
                  <div class="col-md-9">
                    <input type="date" name="Vencimiento_contrato" id="Vencimiento_contrato" class="form-control" <?php if(empty($tblRh->Vencimiento_contrato)): ?>  value="" <?php else: ?>  value="<?php echo e(date_format($tblRh->Vencimiento_contrato, 'Y-m-d')); ?>" <?php endif; ?>>

                  </div> 
                </div>
              </div>
        </div>
        <div class="row">

              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Salario Diario</label>
                  <div class="col-md-9">
                    <?php echo Form::text('salario_diario', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
             <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Salario Mensual</label>
                  <div class="col-md-9">
                    <?php echo Form::text('salario_mensual', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
        </div>
        <div class="row">

              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Reviciones</label>
                  <div class="col-md-9">
                    <?php echo Form::text('reviciones', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
             <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre"></label>
                  <div class="col-md-9">

                  </div> 
                </div>
              </div>
        </div>
        <div class="row">

              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Salario inicial</label>
                  <div class="col-md-9">
                    <?php echo Form::text('sal_ini', null, ['class' => 'form-control']); ?>


                  </div> 
                </div>
              </div>
             <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Fecha Salario inicial</label>
                  <div class="col-md-9">
                    <input type="date" name="sal_ini_fecha" id="sal_ini_fecha" class="form-control" <?php if(empty($tblRh->sal_ini_fecha)): ?> value="" <?php else: ?>  value="<?php echo e(date_format($tblRh->sal_ini_fecha, 'Y-m-d')); ?>" <?php endif; ?>>

                  </div> 
                </div>
              </div>
        </div>

        <br><h3>Salario Mensual</h3> <br>  
            <div class="col-md-12" style="width: 100%">
                <h1 class="pull-right">
                   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#abc"   href="#">+ Salario</a>
                </h1>
            </div>
            <div id="dic_sal">
            <?php echo $__env->make('tbl_rhs.salarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
      </div>



  </div>





  <div class="tab-pane" id="link34" role="tabpanel" aria-labelledby="link-tab34" aria-expanded="false">
       <div class="form-body" style="">   
              
  
        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Documentos requeridos</label>
                  <div class="col-md-9">
                    <input type="file" name="" class="form-control">

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre"></label>
                  <div class="col-md-9">

                  </div> 
                </div>
              </div>
        </div>
        <br><h3>Accidentes o Incidentes</h3> <br>  
         <div class="col-md-12" style="width: 100%">
                <h1 class="pull-right">
                   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#antecedente"   href="#">+ Registo</a>
                </h1>
            </div>
            <div id="dic_ante">
            <?php echo $__env->make('tbl_rhs.antecedente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>





    <br><h3>Reportes de Conducta</h3> <br>  

             <div class="col-md-12" style="width: 100%">
                <h1 class="pull-right">
                   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#antecedente"   href="#">+ Conducta</a>
                </h1>
            </div>
            <div id="dic_ante">
            <?php echo $__env->make('tbl_rhs.conducta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>





    <br><h3>Reportes Médicos </h3> <br>  

             <div class="col-md-12" style="width: 100%">
                <h1 class="pull-right">
                   <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#antecedente"   href="#">+ Reporte</a>
                </h1>
            </div>
            <div id="dic_ante">
            <?php echo $__env->make('tbl_rhs.medicos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>


     
      </div>  

  </div>
  <div class="tab-pane" id="link35" role="tabpanel" aria-labelledby="link-tab35" aria-expanded="false">
       <div class="form-body" style="">      
       
    <br><h3>VIRTUS Resultados de Prueba </h3> <br>  

        <table class="table display nowrap table-striped table-bordered scroll-horizontal" style="" id="productos-table" style="width: 100%">
        <thead class="bg-success">
            <tr>
                <th>Prueba</th>
                <th colspan=""></th>
                <th colspan=""></th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Emociones Positivas</td>
                <td><input type="text" name="" id="Emociones" value="<?php echo e($virtus->Emociones); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Pensamientos Negativos</td>
                <td><input type="text" name="" id="Pensamientos" value="<?php echo e($virtus->Pensamientos); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Compromiso & Enfoque</td>
                <td><input type="text" name="" id="Compromiso" value="<?php echo e($virtus->Compromiso); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Relaciones Positivas</td>
                <td><input type="text" name="" id="Relaciones" value="<?php echo e($virtus->Relaciones); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Sentido</td>
                <td><input type="text" name="" id="Sentido" value="<?php echo e($virtus->Sentido); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Logros</td>
                <td><input type="text" name="" id="Logros" value="<?php echo e($virtus->Logros); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Salud</td>
                <td><input type="text" name="" id="Salud" value="<?php echo e($virtus->Salud); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Soledad</td>
                <td><input type="text" name="" id="Soledad" value="<?php echo e($virtus->Soledad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Felicidad Autoevaluación</td>
                <td><input type="text" name="" id="Felicidad" value="<?php echo e($virtus->Felicidad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Felicidad Promedio</td>
                <td><input type="text" name="" id="Promedio" value="<?php echo e($virtus->Promedio); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Sabiduria</td>
                <td><input type="text" name="" id="Sabiduria" value="<?php echo e($virtus->Sabiduria); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td><input type="text" name="" id="Valor" value="<?php echo e($virtus->Valor); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Humanidad</td>
                <td><input type="text" name="" id="Humanidad" value="<?php echo e($virtus->Humanidad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Justicia</td>
                <td><input type="text" name="" id="Justicia" value="<?php echo e($virtus->Justicia); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
             <tr>
                <td>Trascendencia</td>
                <td><input type="text" name="" id="Trascendencia" value="<?php echo e($virtus->Trascendencia); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Templanza</td>
                <td><input type="text" name="" id="Templanza" value="<?php echo e($virtus->Templanza); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Creatividad</td>
                <td><input type="text" name="" id="Creatividad" value="<?php echo e($virtus->Creatividad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Amor por el Aprendizaje</td>
                <td><input type="text" name="" id="Amor" value="<?php echo e($virtus->Amor); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Curiosidad</td>
                <td><input type="text" name="" id="Curiosidad" value="<?php echo e($virtus->Curiosidad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Perspectiva</td>
                <td><input type="text" name="" id="Perspectiva" value="<?php echo e($virtus->Perspectiva); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Juicio</td>
                <td><input type="text" name="" id="Juicio" value="<?php echo e($virtus->Juicio); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Honestidad</td>
                <td><input type="text" name="" id="Honestidad" value="<?php echo e($virtus->Honestidad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
             <tr>
                <td>Perseverancia</td>
                <td><input type="text" name="" id="Perseverancia" value="<?php echo e($virtus->Perseverancia); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
             <tr>
                <td>Entusiasmo</td>
                <td><input type="text" name="" id="Entusiasmo" value="<?php echo e($virtus->Entusiasmo); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
             <tr>
                <td>Valentia</td>
                <td><input type="text" name="" id="Valentia" value="<?php echo e($virtus->Valentia); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Amabilidad</td>
                <td><input type="text" name="" id="Amabilidad" value="<?php echo e($virtus->Amabilidad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
 
            <tr>
                <td>Inteligencia Social</td>
                <td><input type="text" name="" id="Inteligencia"  value="<?php echo e($virtus->Inteligencia); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Amor</td>
                <td><input type="text" name="" id="Amor_amor" value="<?php echo e($virtus->Amor_amor); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Equidad</td>
                <td><input type="text" name="" id="Equidad" value="<?php echo e($virtus->Equidad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
             <tr>
                <td>Liderazgo</td>
                <td><input type="text" name="" id="Liderazgo" value="<?php echo e($virtus->Liderazgo); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>

             <tr>
                <td>Trabajo de Equipo</td>
                <td><input type="text" name="" id="Trabajo" value="<?php echo e($virtus->Trabajo); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Esperitualidad</td>
                <td><input type="text" name="" id="Esperitualidad" value="<?php echo e($virtus->Esperitualidad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Gratitud</td>
                <td><input type="text" name="" id="Gratitud" value="<?php echo e($virtus->Gratitud); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Esperanza</td>
                <td><input type="text" name="" id="Esperanza" value="<?php echo e($virtus->Esperanza); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Buen Humor</td>
                <td><input type="text" name="" id="Humor" value="<?php echo e($virtus->Humor); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Apreciacion por la Belleza</td>
                <td><input type="text" name="" id="Belleza" value="<?php echo e($virtus->Belleza); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Prudencia</td>
                <td><input type="text" name="" id="Prudencia" value="<?php echo e($virtus->Prudencia); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Humildad</td>
                <td><input type="text" name="" id="Humildad"  value="<?php echo e($virtus->Humildad); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Perdon</td>
                <td><input type="text" name="" id="Perdon" value="<?php echo e($virtus->Perdon); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
            <tr>
                <td>Auto Control</td>
                <td><input type="text" name="" id="Control" value="<?php echo e($virtus->Control); ?>" class="mask form-control" onblur="virtus(<?php echo e($virtus->id_empleado); ?>)"></td>
                <td><?php echo e($virtus->Fecha); ?></td>
            </tr>
        
            
        </tbody>
    </table>







     <br><h3>Resultado Myers Briggs</h3> <br>  

        <table class="table display nowrap table-striped table-bordered scroll-horizontal" style="" id="productos-table" style="width: 100%">
        <thead class="bg-success">
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Introversión (I)</td>
                <td><input type="text" name="" id="Introversion" value="<?php echo e($MyersBriggs->Introversion); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
            <tr>
                <td>Extroversión (E)</td>
                <td><input type="text" name="" id="Extroversion" value="<?php echo e($MyersBriggs->Extroversion); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
            <tr>
                <td>Intuitivo (N)</td>
                <td><input type="text" name="" id="Intuitivo" value="<?php echo e($MyersBriggs->Intuitivo); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
            <tr>
                <td>Sensorial (S)</td>
                <td><input type="text" name="" id="Sensorial" value="<?php echo e($MyersBriggs->Sensorial); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
            <tr>
                <td>Pensamiento (T)</td>
                <td><input type="text" name="" id="Pensamiento" value="<?php echo e($MyersBriggs->Pensamiento); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
            <tr>
                <td>IEmocional (F)</td>
                <td><input type="text" name="" id="IEmocional" value="<?php echo e($MyersBriggs->IEmocional); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
            <tr>
                <td>Calificador (J)</td>
                <td><input type="text" name="" id="Calificador" value="<?php echo e($MyersBriggs->Calificador); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
            <tr>
                <td>Perceptivo (P)</td>
                <td><input type="text" name="" id="Perceptivo" value="<?php echo e($MyersBriggs->Perceptivo); ?>" class="mask form-control" onblur="MyersBriggs(<?php echo e($MyersBriggs->id_empleado); ?>)"></td>
                <td><?php echo e($MyersBriggs->Fecha); ?></td>
            </tr>
        
        </tbody>
    </table>
      
        <br><h3>Anexos</h3> <br>            

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Resultado Myers Briggs </label>
                  <div class="col-md-9">
                    <input type="file" name="" class="form-control">

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                     <label class="col-md-3 label-control" for="nombre">VIRTUS Resultados de Prueba </label>
                  <div class="col-md-9">
                    <input type="file" name="" class="form-control">

                  </div> 
                </div>
              </div>
        </div>
                <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                    <label class="col-md-3 label-control" for="nombre">Evaluación de Periodo de Prueba </label>
                  <div class="col-md-9">
                    <input type="file" name="" class="form-control">

                  </div> 
                </div>
              </div>
        </div>



    <br><h3>Evaluación Anual </h3> <br>  

        <table class="table display nowrap table-striped table-bordered scroll-horizontal" style="" id="productos-table" style="width: 100%">
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

  </div>
  <?php endif; ?>
 
 
 
 
 


</div>
<div class="form-actions right">
  <a href="<?php echo e(route('tblRhs.index')); ?>">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancel
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>





<div class="modal fade text-left" id="abc" tabindex="-1" role="dialog" aria-labelledby="abc" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">Salarios</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_logistica">
          <div id="campos_logistica">   
            <div class="modal-body">
                <input type="text" name="" id="salario" class="form-control">
                <input type="hidden" name="id_empleado"  value="<?php echo e($tblRh->id); ?>"  id="id_empleado" class="form-control">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" onclick="guarda_sal(<?php echo e($tblRh->id); ?>)">Guardar</button>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>


<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/fields.blade.php ENDPATH**/ ?>