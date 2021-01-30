<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#active32" aria-controls="active32"
    aria-expanded="true"><i class="ft-user"></i> Información general</a>
  </li>
  @if($editar ==1)
  <li class="nav-item">
    <a class="nav-link" id="link-tab32" data-toggle="tab" href="#link32" aria-controls="link32"
    aria-expanded="false"><i class="ft-mail"></i> Historial</a>
  </li>
  @endif
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active in" id="active32" aria-labelledby="active-tab32" aria-expanded="true">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="descripcion">Nombre</label>
            <div class="col-md-9">
              {!! Form::text('nombre', null, ['class' => 'form-control','required']) !!}
              <div class="invalid-feedback">Este campo es requerido.</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="familia">Marca</label>
            <div class="col-md-9">          
                {!! Form::text('marca', null, ['class' => 'form-control','required']) !!}
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
              {!! Form::text('modelo', null, ['class' => 'form-control','required']) !!}
              <div class="invalid-feedback">Este campo es requerido.</div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput2">Serie</label>
            <div class="col-md-9">
              {!! Form::text('serie', null, ['class' => 'form-control','required']) !!}
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
              {!! Form::text('pedimento', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Tipo</label>
            <div class="col-md-9">
              {!! Form::number('tipo', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Ubicación en Planta</label>
            <div class="col-md-9">
              {!! Form::text('base', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Ultima Calibración</label>
            <div class="col-md-9">

                <input disabled="disabled" type="text" name="calibracion"  @if($valida==1)   @if($calibracion=="")  value=""  @else  value="{{ date("m-d-Y",strtotime($calibracion)) }}"  @endif     @else value=""  @endif  id="calibracion" class="form-control">

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
                @foreach($plantas as $planta)
                  <option value="{{$planta->id}}" @if($valida==1) {{ ($equipos->planta==$planta->id) ? 'selected' : '' }}  @endif   >{{$planta->nombre}}</option>
                @endforeach
              </select>
               </div>
          </div>
        </div>
     
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Ultimo Mtto. Preventivo</label>
            <div class="col-md-9">

              <input disabled="disabled" type="text" name="preventivo" value="{{ $preventivo}}"   id="correctivo" class="form-control">


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
                <input disabled="disabled" type="text" name="correctivo" value="{{ $correctivo != '0000-00-00' ? $correctivo :''}}"   class="form-control">
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
              <input type="date" name="mantenimiento"  value="{{ substr($equipos->mantenimiento,0,10) }}"  id="mantenimiento" class="form-control">
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
                  @if($editar ==1)

                <option value="1" {{ ($equipos->activo==1) ? 'selected' : '' }}>Si</option>
                <option value="0" {{ ($equipos->activo==0) ? 'selected' : '' }}>No</option>
                @else

                <option value="1" >Si</option>
                <option value="0" >No</option>
                @endif
            </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-actions right">
        <a href="{{ route('equipos.index') }}">
      <button type="button" class="btn btn-warning mr-1">
        <i class="ft-x"></i> Cancel
      </button>
      </a>
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-check-square-o"></i> Guardar
      </button>
      </div>
  </div>
  @if($editar ==1)
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

                     <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,0,1,'',1,{{$equipos->id}})" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;">+ Calibración</span>

                  </h1>
              </div>
              <div class="col-md-12" id="equipo_historial">
                @include('equipo_historials.table')
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tabVerticalLeft22" aria-labelledby="baseVerticalLeft2-tab2">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>
                     <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,0,1,'',2,{{$equipos->id}})" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;">+ Preventivo</a>

                  </h1>
              </div>
              <div class="col-md-12" id="equipo_histPrev">
                @include('equipo_historials.table_preventivo')
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tabVerticalLeft23" aria-labelledby="baseVerticalLeft2-tab3">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>
                     <span data-toggle="modal" data-target="#primary" onclick="ver_catalogo(1,0,1,'',3,{{$equipos->id}})" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;">+ Correctivo</a>
                  </h1>
              </div>
              <div class="col-md-12" id="equipo_histCorrect">
                @include('equipo_historials.table_correctivo')
              </div>
            </div>
          </div>
        </div>

    </div>

  </div>
@endif

</div>                    
