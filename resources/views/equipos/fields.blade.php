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
            <label class="col-md-3 label-control" for="userinput1">Calibracion</label>
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
          href="#tabVerticalLeft22" aria-expanded="false">M. Preventivo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="baseVerticalLeft2-tab3" data-toggle="tab" aria-controls="tabVerticalLeft23"
          href="#tabVerticalLeft23" aria-expanded="false">M. Correctivo</a>
        </li>
      </ul>
      <div class="tab-content px-1">
          <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft21" aria-expanded="true" aria-labelledby="baseVerticalLeft2-tab1">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>
                     <a  data-toggle="modal" data-target="#equipo_historials" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;">+ Calibración</a>
                  </h1>
              </div>
              <div class="col-md-12">
                @include('equipo_historials.table')
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tabVerticalLeft22" aria-labelledby="baseVerticalLeft2-tab2">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>
                     <a data-toggle="modal" data-target="#equipo_historials" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;" >+ Preventivo</a>
                  </h1>
              </div>
              <div class="col-md-12">
                @include('equipo_historials.table_preventivo')
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tabVerticalLeft23" aria-labelledby="baseVerticalLeft2-tab3">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="pull-right">
                    <br>
                     <a data-toggle="modal" data-target="#equipo_historials" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; color: white;" >+ Correctivo</a>
                  </h1>
              </div>
              <div class="col-md-12">
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
@if($editar ==1)
<div class="modal fade text-left" id="equipo_historials" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel17">+ Direcci&oacute;n de envio</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form_logistica">
          <div id="campos_equipos">
            <div class="modal-body">
              @include('equipo_historials.fields')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-outline-primary" onclick="guarda_direccion({{$equipos->id}})">Guardar</button>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
  @endif