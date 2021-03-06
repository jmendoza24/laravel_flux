
  @if($editar ==1)
     <h4>Pieza: {{ $productos->descripcion }}</h4>
  @endif   
<ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
  <li class="nav-item">
    <a class="nav-link active" id="active-tab32" data-toggle="tab" href="#active32" aria-controls="active32"
    aria-expanded="true"><i class="fa fa-info-circle"></i> Información General</a>
  </li>
  @if($editar ==1)
      
  <li class="nav-item">
    <a class="nav-link" id="link-tab32" data-toggle="tab" href="#link32" aria-controls="link32"
    aria-expanded="false"><i class="fa fa-picture-o"></i> Dibujos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="linkOpt-tab2" data-toggle="tab" href="#linkOpt2" aria-controls="linkOpt2"><i class="fa fa-tasks"></i> Procesos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="linkOpt-tab2" data-toggle="tab" href="#linkOpt3" aria-controls="linkOpt3"><i class="fa fa-truck"></i> Materiales</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" id="linkOpt-tab2" data-toggle="tab" href="#linkOpt4" aria-controls="linkOpt4"><i class="fa fa-money"></i> Costeo</a>
  </li>--->
  @endif
</ul>
<div class="tab-content px-1 pt-1">
  <div role="tabpanel" class="tab-pane active in" id="active32" aria-labelledby="active-tab32" aria-expanded="true">                     
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="descripcion">Número de pieza:</label>
          <div class="col-md-9">
            {!! Form::text('numero_parte', null, ['required', 'class' => 'form-control']) !!}  
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="descripcion">Descripción de pieza:</label>
          <div class="col-md-9">
            {!! Form::textarea('descripcion', null, ['required', 'class' => 'form-control']) !!}       
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      
    <!--</div>
    <div class="row">-->
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="empresa">Cliente:</label>
          <div class="col-md-9">
            <select id="id_empresa" name="id_empresa" class="form-control" required="">
                <option value="">Selecione una opción</option>
                @foreach($clientes as $clie)
                  <option value="{{ $clie->id}}" 
                    @if(!empty($productos->id_empresa))
                      {{ ($productos->id_empresa== $clie->id) ? 'selected' : '' }}
                    @endif >
                    {{ $clie->nombre_corto}}</option>
                  @endforeach
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="familia">Familia:</label>
          <div class="col-md-9">
              <select id="familia" name="familia" class="form-control" required="">
                <option value="">Selecione una opción</option>
                @foreach($familias as $fam)
                  <option value="{{ $fam->id}}" 
                    @if(!empty($productos->familia))
                      {{ ($productos->familia== $fam->id) ? 'selected' : '' }}
                    @endif >
                    {{ $fam->familia}}</option>
                  @endforeach
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <input type="hidden" name="id_acero" value="0">
      <input type="hidden" name="id_estructura" value="0">
      {{-- <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Tipo de acero</label>
          <div class="col-md-9">
            <select id="id_acero" name="id_acero" class="form-control">
                <option value="">Selecione una opción</option>
                @foreach($tipoacero as $acero)
                  <option value="{{ $acero->id}}" 
                    @if(!empty($productos->id_acero))
                      {{ ($productos->id_acero== $acero->id) ? 'selected' : '' }}
                    @endif >
                    {{ $acero->acero}}</option>
                  @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Tipo estructura:</label>
          <div class="col-md-9">
            <select id="id_estructura" name="id_estructura" class="form-control" required="">
                <option value="">Selecione una opción</option>
                @foreach($tipoestructura as $estructura)
                  <option value="{{ $estructura->id}}" 
                    @if(!empty($productos->id_estructura))
                      {{ ($productos->id_estructura== $estructura->id) ? 'selected' : '' }}
                    @endif >
                    {{ $estructura->estructura}}</option>
                  @endforeach
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div> --}}
      <!--<div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Espesor</label>
          <div class="col-md-9">
           {{ Form::number('espesor', null, ['placeholder'=>'', 'class' => 'form-control','min'=>'0','step'=>'any']) }}       
          </div>
        </div>
      </div>--->
    <!--</div>
    <div class="row">--->
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Dias Manufactura:</label>
          <div class="col-md-9">
            {{ Form::number('tiempo_entrega', null, ['placeholder'=>'', 'class' => 'form-control','min'=>'0','required']) }}       
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1"></label>
          <div class="col-md-9">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Peso:</label>
          <div class="col-md-9">
            {{ Form::text('peso', null, ['placeholder'=>'', 'class' => 'form-control numeros','required']) }}   
            <div class="invalid-feedback">Este campo es requerido.</div>    
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Ancho:</label>
          <div class="col-md-9">
            {{ Form::text('ancho', null, ['placeholder'=>'', 'class' => 'form-control numeros','required']) }}       
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Costo U:</label>
          <div class="col-md-9">
            {{ Form::text('costo_material', null, ['placeholder'=>'', 'id'=>'costo_material', 'class' => 'form-control currency','min'=>'0','required','step'=>'any']) }}       
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>
      <!--<div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Planta</label>
          <div class="col-md-9">
            {{ Form::number('planta', null, ['placeholder'=>'', 'class' => 'form-control','min'=>'0','required']) }}       
            <div class="invalid-feedback">Este campo es requerido.</div>
          </div>
        </div>
      </div>-->
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Precio U:</label>
          <div class="col-md-9">
            {{ Form::text('costo_produccion', null, ['placeholder'=>'', 'class' => 'form-control currency','min'=>'0','step'=>'any']) }}       
          </div>
        </div>
      </div>
      
    </div>
    @if($editar ==1)
    <hr/>
    <div class="row">
      <div class="col-md-4">
        <table class="table table-striped table-bordered">
          <thead>
            <tr style="background: #518a87; color: white;">
              <td colspan="2">Costos por planta</td>
            </tr>
            <tr>
            <th>Planta</th>
            <th>Costo Unitario</th>
            </tr>
          </thead>
          <tbody>
            @foreach($plantas as $planta)
            <tr>
              <td>{{ $planta->nombre}}</td>
              <td>
                <input type="text" name="plantacosto{{$planta->id}}" id="plantacosto{{$planta->id}}" min="0" value="{{ $planta->costo }}" 
                step="any" class="form-control currency"  onchange="guarda_horas({{$planta->id}},{{ $productos->id }})"></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-8">
         @include('productos.costeo')
      </div>
    </div>
    @endif

  </div>
  @if($editar ==1)
  <div class="tab-pane" id="link32" role="tabpanel" aria-labelledby="link-tab32" aria-expanded="false">
    
    <div class="row">
      <div class="col-md-12">
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" onclick="nuevo_dibujo({{ $productos->id }})" data-toggle="modal" data-target="#large" style="margin-top: -10px;margin-bottom: 5px; color: white;" >+ Dibujo</a>
        </h1>
      </div>
      <div class="col-md-12" id="dibujos_table" >
          @include('producto_dibujos.table')
      </div>
    </div>

  </div>
  <div class="tab-pane" id="linkOpt2" role="tabpanel" aria-labelledby="linkOpt-tab2" aria-expanded="false" id="">
    <div id="listasubprocesos">
      @include('productos.productos_procesos')
    </div>
    
  </div>
  <div class="tab-pane" id="linkOpt3" role="tabpanel" aria-labelledby="linkOpt-tab3" aria-expanded="false" id="">
    <div class="col-md-8">
    <table class="table table-bordered table-striped">
      <tr>
        <td style="text-align: right;">Forma:</td>
        <td> 
          <select class="form-control" id="idforma" name="idforma">
            <option value="">Seleccione una forma</option>
              @foreach($formas as $forma)
              <option value="{{$forma->id}}">{{$forma->forma}}</option>
              @endforeach
          </select>
        </td>
        <td>
          <span class="btn btn-primary" onclick="agrega_material_forma({{ $productos->id }})">Agregar</span>
        </td>
      </tr>
    </table>
    </div>
    <div id="listamateriales" style="max-height: 600px; overflow-x: scroll;" class="col-md-12">
      @include('productos.productos_materiales')
    </div>
  </div>
  <!--<div class="tab-pane" id="linkOpt4" role="tabpanel" aria-labelledby="linkOpt-tab4" aria-expanded="false" id="">
    <div id="costeos">
      
    </div>
  </div>--->
  @endif
</div>
<br>

<div class="form-actions right">
  <a href="{{ route('productos.index') }}">
<button type="button" class="btn btn-warning mr-1">
  <i class="ft-x"></i> Cancel
</button>
</a>
<button type="submit" class="btn btn-primary">
  <i class="fa fa-check-square-o"></i> Guardar
</button>
</div>