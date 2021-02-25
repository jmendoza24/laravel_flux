<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#active32" aria-controls="active32"
    aria-expanded="true"><i class="ft-user"></i>General</a>
  </li>
  @if($editar ==1)
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
  @endif
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active in" id="active32" aria-labelledby="active-tab32" aria-expanded="true">
    <div class="form-body" style="">                        
        <div class="row">
      
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Nombre</label>
              <div class="col-md-9">
                  {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Num Empleado</label>
              <div class="col-md-9">
                {!! Form::text('num_empleado', null, ['class' => 'form-control']) !!}

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
                    <option value="1" {{ $tblRh->contrato==1 ?'selected':'' }}>Administrativo</option>
                    <option value="2" {{ $tblRh->contrato==2 ?'selected':'' }}>Practicante</option>
                    <option value="3" {{ $tblRh->contrato==3 ?'selected':'' }}>Sindicalizado</option>
                    <option value="4" {{ $tblRh->contrato==4 ?'selected':'' }}>Operaciones</option>
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
                  @if(empty($tblRh->estatus))

                  <option value="1" >Si</option>
                  <option value="2" >No</option>
                  @else

                  <option value="1" {{ ($tblRh->estatus==1) ? 'selected' : '' }}>Si</option>
                  <option value="2" {{ ($tblRh->estatus==2) ? 'selected' : '' }}>No</option>
                  @endif
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
                  {!! Form::text('tcf', null, ['class' => 'form-control phone-inputmask']) !!}
              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Tel. Casa</label>
              <div class="col-md-9">
                {!! Form::text('tc', null, ['class' => 'form-control phone-inputmask']) !!}
              </div> 
            </div>
           </div>
        </div>

        <div class="row">
          <div class="col-md-6">
             <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Correo</label>
              <div class="col-md-9">
                {!! Form::text('correo', null, ['class' => 'form-control email-inputmask' ]) !!}

              </div> 
            </div>
          </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput2">Género</label>
              <div class="col-md-9">
                <select class="form-control " name="genero" id="genero" >
                  <option value="0">Seleccione una opci&oacute;n</option>
                       <option value="1" {{ ($tblRh->genero==1) ? 'selected' : '' }}>Masculino</option>
                      <option value="2" {{ ($tblRh->genero==2) ? 'selected' : '' }}>Femenino</option>
                      <option value="3" {{ ($tblRh->genero==3) ? 'selected' : '' }}>Otro</option>
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
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control jit-inputmask" value="{{ $tblRh->fecha_nacimiento }}" >
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Lugar Nac.</label>
              <div class="col-md-9">
                {!! Form::text('lugar_nacimiento', null, ['class' => 'form-control']) !!}

              </div> 
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Num. IMSS</label>
              <div class="col-md-9">
                      {!! Form::text('imss', null, ['class' => 'form-control']) !!}
                 </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">@if($tblRh->doc_imss != '') <a href="{{ $tblRh->doc_imss}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a>@endif &nbsp; Alta IMSS</label>
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
                  {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">CURP</label>
              <div class="col-md-9">
                {!! Form::text('curp', null, ['class' => 'form-control']) !!}

              </div> 
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">
              @if($tblRh->identificacion != '') <a href="{{ $tblRh->identificacion}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a>@endif
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
                  <option value="1" @if(empty($tblRh->grado_escolaridad))   @else  {{ ($tblRh->grado_escolaridad==1) ? 'selected' : '' }} @endif >Escuela Técnica</option>
                  <option value="2" @if(empty($tblRh->grado_escolaridad))   @else  {{ ($tblRh->grado_escolaridad==2) ? 'selected' : '' }} @endif>Preparatoria</option>
                  <option value="3" @if(empty($tblRh->grado_escolaridad))   @else  {{ ($tblRh->grado_escolaridad==3) ? 'selected' : '' }} @endif>Universidad</option>
                  <option value="4" @if(empty($tblRh->grado_escolaridad))   @else  {{ ($tblRh->grado_escolaridad==4) ? 'selected' : '' }} @endif>Posgrado</option>
                  <option value="5" @if(empty($tblRh->grado_escolaridad))   @else  {{ ($tblRh->grado_escolaridad==5) ? 'selected' : '' }} @endif>Nada</option>
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
                    <option value="1" @if(empty($tblRh->edo_civil))   @else  {{ ($tblRh->edo_civil==1) ? 'selected' : '' }} @endif >Soltero</option>
                    <option value="2" @if(empty($tblRh->edo_civil))   @else  {{ ($tblRh->edo_civil==2) ? 'selected' : '' }} @endif>Casado</option>
                    <option value="3" @if(empty($tblRh->edo_civil))   @else  {{ ($tblRh->edo_civil==3) ? 'selected' : '' }} @endif>Divorciado</option>
                    <option value="4" @if(empty($tblRh->edo_civil))   @else  {{ ($tblRh->edo_civil==4) ? 'selected' : '' }} @endif>Viudo</option>
                    <option value="5" @if(empty($tblRh->edo_civil))   @else  {{ ($tblRh->edo_civil==5) ? 'selected' : '' }} @endif>Concubinato</option>
                    <option value="6" @if(empty($tblRh->edo_civil))   @else  {{ ($tblRh->edo_civil==6) ? 'selected' : '' }} @endif>Separado</option>
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
                    <option value="1" @if(empty($tblRh->religion))   @else  {{ ($tblRh->religion==1) ? 'selected' : '' }}  @endif >Católico</option>
                    <option value="2" @if(empty($tblRh->religion))   @else  {{ ($tblRh->religion==2) ? 'selected' : '' }}  @endif>Cristiano</option>
                    <option value="3" @if(empty($tblRh->religion))   @else  {{ ($tblRh->religion==3) ? 'selected' : '' }}  @endif>Otro</option>
              
                </select>
              </div>
            </div>
          </div>
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Dirección</label>
              <div class="col-md-9">
               {!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}

              </div> 
            </div>
          </div>
        </div>
    </div>
  </div> 
 
  @if($editar ==1)
  <div class="tab-pane" id="link32" role="tabpanel" aria-labelledby="link-tab32" aria-expanded="false">

        <div class="form-body" style="">                        

        <br><h3>Contacto de Emergencia #1</h3><br>  

        <div class="row">
         <div class="col-md-6">

            <div class="form-group row">
              <label class="col-md-3 label-control" for="planta">Nombre</label>
              <div class="col-md-9">
                  {!! Form::text('n1', null, ['class' => 'form-control']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Casa  </label>
              <div class="col-md-9">
                     {!! Form::text('t1ct', null, ['class' => 'form-control phone-inputmask']) !!}

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
                    <option value="1" {{ ($tblRh->relacion==1) ? 'selected' : '' }}>Padres</option>
                    <option value="2" {{ ($tblRh->relacion==2) ? 'selected' : '' }}>Hijos</option>
                    <option value="3" {{ ($tblRh->relacion==3) ? 'selected' : '' }}>Pareja</option>
                    <option value="4" {{ ($tblRh->relacion==4) ? 'selected' : '' }}>Cónyuge</option>
                    <option value="5" {{ ($tblRh->relacion==5) ? 'selected' : '' }}>Familiar</option>
                    <option value="6" {{ ($tblRh->relacion==6) ? 'selected' : '' }}>Otro</option>
                </select>
              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Celular</label>
              <div class="col-md-9">
                      {!! Form::text('t1cc', null, ['class' => 'form-control phone-inputmask']) !!}
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
                  {!! Form::text('n2', null, ['class' => 'form-control']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Casa  </label>
              <div class="col-md-9">
                     {!! Form::text('t2cc', null, ['class' => 'form-control phone-inputmask']) !!}

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
                  <option value="1" {{ ($tblRh->relacion==1) ? 'selected' : '' }}>Padres</option>
                  <option value="2" {{ ($tblRh->relacion==2) ? 'selected' : '' }}>Hijos</option>
                  <option value="3" {{ ($tblRh->relacion==3) ? 'selected' : '' }}>Pareja</option>
                  <option value="4" {{ ($tblRh->relacion==4) ? 'selected' : '' }}>Cónyuge</option>
                  <option value="5" {{ ($tblRh->relacion==5) ? 'selected' : '' }}>Familiar</option>
                  <option value="6" {{ ($tblRh->relacion==6) ? 'selected' : '' }}>Otro</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Teléfono Celular</label>
              <div class="col-md-9">
                      {!! Form::text('t2ct', null, ['class' => 'form-control phone-inputmask']) !!}
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
                  {!! Form::text('camisa', null, ['class' => 'form-control']) !!}
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Talla Pantalón</label>
              <div class="col-md-9">
                     {!! Form::text('pantalon', null, ['class' => 'form-control']) !!}

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
                     {!! Form::text('calzado', null, ['class' => 'form-control']) !!}

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
                    {!! Form::text('n_beneficiario', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">RFC</label>
                  <div class="col-md-9">
                    {!! Form::text('rfc_b1', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Domicilio beneficiario</label>
                  <div class="col-md-9">
                    {!! Form::text('domicilio_bene', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Lugar de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    {!! Form::text('lugar_nacimiento_bene', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Fecha de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <input type="text" name="fecha_nacimiento_bene" id="fecha_nacimiento_bene" class="form-control jit-inputmask"  value="{{ $tblRh->fecha_nacimiento_bene}}" >
                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control " style="width: 100%" name="parentesco" id="parentesco" >
                      <option value="0">Seleccione una opci&oacute;n</option>
                        <option value="1" {{ ($tblRh->parentesco==1) ? 'selected' : '' }}>Padre</option>
                        <option value="2" {{ ($tblRh->parentesco==2) ? 'selected' : '' }}>Madre</option>
                        <option value="3" {{ ($tblRh->parentesco==3) ? 'selected' : '' }}>Hijo</option>
                        <option value="4" {{ ($tblRh->parentesco==4) ? 'selected' : '' }}>Conyugue</option>
                        <option value="5" {{ ($tblRh->parentesco==5) ? 'selected' : '' }}>Otro</option>


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
                    {!! Form::text('porcentaje', null, ['class' => 'form-control percentage-inputmask', 'id'=>'porcentaje','onkeyup'=>'calcular_porcentaje(1)']) !!}

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
                    {!! Form::text('nombre_bene2', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">RFC</label>
                  <div class="col-md-9">
                    {!! Form::text('rfc_b2', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Domicilio beneficiario</label>
                  <div class="col-md-9">
                    {!! Form::text('domicilio_bene2', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Lugar de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    {!! Form::text('lugar_nacimiento_bene2', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Fecha de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <input type="text" name="fecha_nacimiento_bene2" id="fecha_nacimiento_bene2" class="form-control jit-inputmask"  value="{{ $tblRh->fecha_nacimiento_bene2 }}" >

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control " style="width: 100%" name="parentesco_bene2" id="parentesco_bene2" >
                      <option value="0">Seleccione una opci&oacute;n</option>
                        <option value="1" {{ ($tblRh->parentesco_bene2==1) ? 'selected' : '' }}>Padre</option>
                        <option value="2" {{ ($tblRh->parentesco_bene2==2) ? 'selected' : '' }}>Madre</option>
                        <option value="3" {{ ($tblRh->parentesco_bene2==3) ? 'selected' : '' }}>Hijo</option>
                        <option value="4" {{ ($tblRh->parentesco_bene2==4) ? 'selected' : '' }}>Conyugue</option>
                        <option value="5" {{ ($tblRh->parentesco_bene2==5) ? 'selected' : '' }}>Otro</option>


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
                    {!! Form::text('porcentaje2', null, ['class' => 'form-control percentage-inputmask','id'=>'porcentaje2','onkeyup'=>'calcular_porcentaje(2)']) !!}

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
                    {!! Form::text('nombre_bene3', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">RFC</label>
                  <div class="col-md-9">
                    {!! Form::text('rfc_b3', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Domicilio beneficiario</label>
                  <div class="col-md-9">
                    {!! Form::text('domicilio_bene3', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Lugar de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    {!! Form::text('lugar_nacimiento_bene3', null, ['class' => 'form-control']) !!}

                  </div> 
                </div>
              </div>
        </div>

        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Fecha de nacimiento beneficiario</label>
                  <div class="col-md-9">
                    <input type="text" name="fecha_nacimiento_bene3" id="fecha_nacimiento_bene3" class="form-control jit-inputmask" value="{{ $tblRh->fecha_nacimiento_bene3 }}">
                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Parentesco</label>
                  <div class="col-md-9">
                    <select class="form-control " style="width: 100%" name="parentesco_bene3" id="parentesco_bene3" >
                      <option value="0">Seleccione una opci&oacute;n</option>
                        <option value="1" {{ ($tblRh->parentesco_bene3==1) ? 'selected' : '' }}>Padre</option>
                        <option value="2" {{ ($tblRh->parentesco_bene3==2) ? 'selected' : '' }}>Madre</option>
                        <option value="3" {{ ($tblRh->parentesco_bene3==3) ? 'selected' : '' }}>Hijo</option>
                        <option value="4" {{ ($tblRh->parentesco_bene3==4) ? 'selected' : '' }}>Conyugue</option>
                        <option value="5" {{ ($tblRh->parentesco_bene3==5) ? 'selected' : '' }}>Otro</option>


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
                    {!! Form::text('porcentaje3', null, ['class' => 'form-control percentage-inputmask','id'=>'porcentaje3','onchange'=>'calcular_porcentaje(3)']) !!}

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
                  
                   @foreach($puesto as $puesto)
                      <option value="{{ $puesto->id}}" 
                          {{ ($tblRh->puesto == $puesto->id) ? 'selected' : '' }}
                        >
                        {{ $puesto->puesto}}</option>
                      @endforeach
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
                              @foreach($Departamentos as $Departamentos)
                              <option value="{{ $Departamentos->id}}" 
                                
                                  {{ ($tblRh->departamento == $Departamentos->id) ? 'selected' : '' }}
                              >
                                {{ $Departamentos->departamento}}</option>
                              @endforeach
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
                    {!! Form::text('nombre_sup', null, ['class' => 'form-control']) !!}

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
                    <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control jit-inputmask"  value="{{ $tblRh->fecha_ingreso }}">

              </div> 
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group row">
              <label class="col-md-3 label-control" for="nombre">Fecha fin</label>
              <div class="col-md-9">
                    <input type="text" name="fecha_fin" id="fecha_fin" class="form-control jit-inputmask" value="{{ $tblRh->fecha_fin}}">

              </div> 
            </div>
          </div>
        </div>
        <div class="row">
              <div class="col-md-6">
               <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Vencimiento Periodo Prueba</label>
                  <div class="col-md-9">
                    <input type="text" name="Vencimiento_prueba" id="Vencimiento_prueba" class="form-control jit-inputmask" value="{{ $tblRh->Vencimiento_prueba}}">

                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group row">
                  <label class="col-md-3 label-control" for="nombre">Vencimiento de Contrato</label>
                  <div class="col-md-9">
                    <input type="text" name="Vencimiento_contrato" id="Vencimiento_contrato" class="form-control jit-inputmask" value="{{ $tblRh->Vencimiento_contrato}}">

                  </div> 
                </div>
              </div>
        </div>   
      
          <br><h3>Salario Mensual</h3> <br>  
            <div class="col-md-12" style="width: 100%">
                <h1 class="pull-right">
                   <span class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#primary" onclick="ver_catalogo(2,0,1,'',{{$tblRh->id}})" >+ Salario</span>
                </h1>
            </div>
            <br><br><br>
            <div id="dic_sal">
            @include('tbl_rhs.salarios')
            </div>

      </div>



  </div>

  <div class="tab-pane" id="link34" role="tabpanel" aria-labelledby="link-tab34" aria-expanded="false">
      <div class="col-md-12 text-left">
        <span class="btn btn-outline-success" data-toggle="modal" data-target="#primary"  onclick="ver_catalogo(3,0,1,'',{{ $tblRh->id}},1)"><i class="fa fa-plus"></i> Nuevo Documento</span>
      </div>
      <br><br>
      <div id="lista_docs" class="row">
          @include('tbl_rhs.lista_docs')
      </div>
 
  </div>
  <div class="tab-pane" id="link35" role="tabpanel" aria-labelledby="link-tab35" aria-expanded="false">
      <div id="lista_tabla">
        @include('tbl_rhs.evaluaciones')  
      </div>   
      
  </div>  
@endif

</div>
<hr>
<div class="col-md-12 text-right">
  <a href="{{ route('tblRhs.index') }}">
    <button type="button" class="btn btn-warning mr-1">
      <i class="ft-x"></i> Cancel
    </button>
  </a>
  <button type="submit" class="btn btn-primary">
    <i class="fa fa-check-square-o"></i> Guardar
  </button>
</div>
<br>
