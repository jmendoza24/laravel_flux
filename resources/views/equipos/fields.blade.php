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
            <label class="col-md-3 label-control" for="userinput1">Base</label>
            <div class="col-md-9">
              {!! Form::text('calibracion', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput1">Calibración</label>
            <div class="col-md-9">
              {!! Form::text('base', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
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

<div class="form-actions right">
  <a href="{{ route('equipos.index') }}">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancelar
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>
