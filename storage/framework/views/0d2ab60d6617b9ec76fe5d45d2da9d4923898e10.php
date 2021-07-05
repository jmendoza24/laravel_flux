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
                  <select class="form-control" name="contrato">
                    <option value="">Seleccione...</option>
                    <option value="1" <?php echo e($tblRh->contrato==1 ?'selected':''); ?>>Administrativo</option>
                    <option value="2" <?php echo e($tblRh->contrato==2 ?'selected':''); ?>>Practicante</option>
                    <option value="3" <?php echo e($tblRh->contrato==3 ?'selected':''); ?>>Sindicalizado</option>
                    <option value="4" <?php echo e($tblRh->contrato==4 ?'selected':''); ?>>Operaciones</option>
                  </select>
              </div>
            </div>
          </div>
         <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Activo</label>
              <div class="col-md-9">
                <select class="form-control" name="estatus" id="estatus" >
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
                  <?php echo Form::text('tcf', null, ['class' => 'form-control phone-inputmask']); ?>

              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Tel. Casa</label>
              <div class="col-md-9">
                <?php echo Form::text('tc', null, ['class' => 'form-control phone-inputmask']); ?>

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
              <label class="col-md-3 label-control" for="userinput2">Género</label>
              <div class="col-md-9">
                <select class="form-control " name="genero" id="genero" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                       <option value="1" <?php echo e(($tblRh->genero==1) ? 'selected' : ''); ?>>Masculino</option>
                      <option value="2" <?php echo e(($tblRh->genero==2) ? 'selected' : ''); ?>>Femenino</option>
                      <option value="3" <?php echo e(($tblRh->genero==3) ? 'selected' : ''); ?>>Otro</option>
                  </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Fecha Nac. (mm/dd/aaaa)</label>
              <div class="col-md-9">
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control jit-inputmask" value="<?php echo e($tblRh->fecha_nacimiento); ?>" >
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
              <label class="col-md-3 label-control" for="userinput1"><?php if($tblRh->doc_imss != ''): ?> <a href="<?php echo e($tblRh->doc_imss); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a><?php endif; ?> &nbsp; Alta IMSS</label>
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
              <label class="col-md-3 label-control" for="userinput1">
              <?php if($tblRh->identificacion != ''): ?> <a href="<?php echo e($tblRh->identificacion); ?>" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a><?php endif; ?>
              Doc. Identificación</label>
              <div class="col-md-9">
                
                <input type="file" name="identificacion" id="identificacion" class="form-control">
                 </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Escolaridad</label>
              <div class="col-md-9">
                <select class="form-control " name="grado_escolaridad" id="grado_escolaridad" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                  <option value="1" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==1) ? 'selected' : ''); ?> <?php endif; ?> >Escuela Técnica</option>
                  <option value="2" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==2) ? 'selected' : ''); ?> <?php endif; ?>>Preparatoria</option>
                  <option value="3" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==3) ? 'selected' : ''); ?> <?php endif; ?>>Universidad</option>
                  <option value="4" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==4) ? 'selected' : ''); ?> <?php endif; ?>>Posgrado</option>
                  <option value="5" <?php if(empty($tblRh->grado_escolaridad)): ?>   <?php else: ?>  <?php echo e(($tblRh->grado_escolaridad==5) ? 'selected' : ''); ?> <?php endif; ?>>Nada</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Edo. civil</label>
              <div class="col-md-9">
                    <select class="form-control " name="edo_civil" id="edo_civil" >
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
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Religión</label>
              <div class="col-md-9">
                <select class="form-control " name="religion" id="religion" >
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
                     <?php echo Form::text('t1ct', null, ['class' => 'form-control phone-inputmask']); ?>


                 </div>
            </div>
          </div>
          
        </div>
        <div class="row">

         
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Relación con el colaborador / Parentesco </label>
              <div class="col-md-9">
                <select class="form-control " style="width: 100%" name="relacion" id="relacion" >
                  <option value="0">Seleccione ...</option>
                    <option value="1" <?php echo e(($tblRh->relacion==1) ? 'selected' : ''); ?>>Padres</option>
                    <option value="2" <?php echo e(($tblRh->relacion==2) ? 'selected' : ''); ?>>Hijos</option>
                    <option value="3" <?php echo e(($tblRh->relacion==3) ? 'selected' : ''); ?>>Pareja</option>
                    <option value="4" <?php echo e(($tblRh->relacion==4) ? 'selected' : ''); ?>>Cónyuge</option>
                    <option value="5" <?php echo e(($tblRh->relacion==5) ? 'selected' : ''); ?>>Familiar</option>
                    <option value="6" <?php echo e(($tblRh->relacion==6) ? 'selected' : ''); ?>>Otro</option>
                </select>
              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Celular</label>
              <div class="col-md-9">
                      <?php echo Form::text('t1cc', null, ['class' => 'form-control phone-inputmask']); ?>

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
                     <?php echo Form::text('t2cc', null, ['class' => 'form-control phone-inputmask']); ?>


                 </div>
            </div>
          </div>
          
        </div>
        <div class="row">

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Relación con el colaborador / Parentesco </label>
              <div class="col-md-9">
                <select class="form-control " style="width: 100%" name="relacion2" id="relacion2" >
                  <option value="0">Seleccione...</option>
                  <option value="1" <?php echo e(($tblRh->relacion==1) ? 'selected' : ''); ?>>Padres</option>
                  <option value="2" <?php echo e(($tblRh->relacion==2) ? 'selected' : ''); ?>>Hijos</option>
                  <option value="3" <?php echo e(($tblRh->relacion==3) ? 'selected' : ''); ?>>Pareja</option>
                  <option value="4" <?php echo e(($tblRh->relacion==4) ? 'selected' : ''); ?>>Cónyuge</option>
                  <option value="5" <?php echo e(($tblRh->relacion==5) ? 'selected' : ''); ?>>Familiar</option>
                  <option value="6" <?php echo e(($tblRh->relacion==6) ? 'selected' : ''); ?>>Otro</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Celular</label>
              <div class="col-md-9">
                      <?php echo Form::text('t2ct', null, ['class' => 'form-control phone-inputmask']); ?>

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
                    <input type="text" name="fecha_nacimiento_bene" id="fecha_nacimiento_bene" class="form-control jit-inputmask"  value="<?php echo e($tblRh->fecha_nacimiento_bene); ?>" >
                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control " style="width: 100%" name="parentesco" id="parentesco" >
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
                    <?php echo Form::text('porcentaje', null, ['class' => 'form-control percentage-inputmask', 'id'=>'porcentaje','onkeyup'=>'calcular_porcentaje(1)']); ?>


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
                    <input type="text" name="fecha_nacimiento_bene2" id="fecha_nacimiento_bene2" class="form-control jit-inputmask"  value="<?php echo e($tblRh->fecha_nacimiento_bene2); ?>" >

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control " style="width: 100%" name="parentesco_bene2" id="parentesco_bene2" >
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
                    <?php echo Form::text('porcentaje2', null, ['class' => 'form-control percentage-inputmask','id'=>'porcentaje2','onkeyup'=>'calcular_porcentaje(2)']); ?>


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
                    <input type="text" name="fecha_nacimiento_bene3" id="fecha_nacimiento_bene3" class="form-control jit-inputmask" value="<?php echo e($tblRh->fecha_nacimiento_bene3); ?>">
                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control " style="width: 100%" name="parentesco_bene3" id="parentesco_bene3" >
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
                    <?php echo Form::text('porcentaje3', null, ['class' => 'form-control percentage-inputmask','id'=>'porcentaje3','onchange'=>'calcular_porcentaje(3)']); ?>


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
               <select class="form-control " style="width: 100%" name="puesto" id="puesto" >
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
                         <select class="form-control " style="width: 100%" name="departamento" id="departamento" >
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
              <label class="col-md-3 label-control" for="nombre">Fecha inicio<br>
              <span class="small">(MM/DD/AAAA)</span>
            </label>

              <div class="col-md-9">
                    <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control jit-inputmask"  value="<?php echo e($tblRh->fecha_ingreso); ?>">

              </div> 
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Fecha fin</label>

              <div class="col-md-9">
                    <input type="text" name="fecha_fin" id="fecha_fin" onchange="valida_fechas('fecha_ingreso','fecha_fin')" class="form-control jit-inputmask" value="<?php echo e($tblRh->fecha_fin); ?>">

              </div> 
            </div>
          </div>
        </div>
        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Vencimiento Periodo Prueba</label>
                  <div class="col-md-9">
                    <input type="text" name="Vencimiento_prueba" id="Vencimiento_prueba" onchange="valida_fechas('fecha_ingreso','Vencimiento_prueba')" class="form-control jit-inputmask" value="<?php echo e($tblRh->Vencimiento_prueba); ?>">

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Vencimiento de Contrato</label>
                  <div class="col-md-9">
                    <input type="text" name="Vencimiento_contrato" id="Vencimiento_contrato" onchange="valida_fechas('Vencimiento_prueba','Vencimiento_contrato')" class="form-control jit-inputmask" value="<?php echo e($tblRh->Vencimiento_contrato); ?>">

                  </div> 
                </div>
              </div>
        </div>   
      
          <br><h3>Salario Mensual</h3> <br>  
            <div class="col-md-12" style="width: 100%">
                <h1 class="pull-right">
                   <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#primary" onclick="ver_catalogo(2,0,1,'',<?php echo e($tblRh->id); ?>)" >+ Salario</span>
                </h1>
            </div>
            <br><br><br>
            <div id="dic_sal">
            <?php echo $__env->make('tbl_rhs.salarios', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

      </div>



  </div>

  <div class="tab-pane" id="link34" role="tabpanel" aria-labelledby="link-tab34" aria-expanded="false">
      <div class="col-md-12 text-left">
        <span class="btn btn-outline-success" data-toggle="modal" data-target="#primary"  onclick="ver_catalogo(3,0,1,'',<?php echo e($tblRh->id); ?>,1)"><i class="fa fa-plus"></i> Nuevo Documento</span>
      </div>
      <br><br>
      <div id="lista_docs" class="row">
          <?php echo $__env->make('tbl_rhs.lista_docs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
 
  </div>
  <div class="tab-pane" id="link35" role="tabpanel" aria-labelledby="link-tab35" aria-expanded="false">
      <div id="lista_tabla">
        <?php echo $__env->make('tbl_rhs.evaluaciones', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
      </div>   
      
  </div>  
<?php endif; ?>

</div>
<hr>
<div class="col-md-12 text-right">
  <a href="<?php echo e(route('tblRhs.index')); ?>">
    <button type="button" class="btn btn-warning mr-1">
      <i class="ft-x"></i> Cancel
    </button>
  </a>
  <button type="submit" class="btn btn-primary">
    <i class="fa fa-check-square-o"></i> Guardar
  </button>
</div>
<br>
<?php /**PATH C:\wamp64\www\laravel\laravel_flux\resources\views/tbl_rhs/fields.blade.php ENDPATH**/ ?>