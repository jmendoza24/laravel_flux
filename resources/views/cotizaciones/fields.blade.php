<!-- Step 1 -->
<h6>General</h6>
<fieldset>
  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6"> 
      <div class="form-group">  
        <label for="firstName4"><b>Fecha :</b> {{ date('Y-m-d') }} -Cot: {{ $num_cotizacion }}</label>
        <input type="hidden" id="cotizacion_id" value="{{ $num_cotizacion }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Producto :</label>
        <select class="form-control custom-select required" name="producto" id="producto" onchange="cotizacion_info({{ $num_cotizacion }})">
            <option value="">Seleccione una opcion</option>
            @foreach($productos as $prod)
            <option value="{{ $prod->id}}" 
              @if(!empty($cotizacion->producto))
                {{ ($cotizacion->producto == $prod->id) ? 'selected' : '' }}
              @endif >
              {{ $prod->descripcion}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('numero_parte', 'Numero Parte:') !!}
        <input type="text" name="numero_parte" class="form-control" id="numero_parte" value="{{ $cotizacion->numero_parte}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Cliente :</label>
        <input type="text" name="cliente" id="cliente" class="form-control" value="{{ $cotizacion->nombre_corto }}" readonly="">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Dibujo :</label>
        <select class="form-control custom-select required" name="dibujo" id="dibujo" onchange="dibujo_info()">
            <option value="">Seleccione una opcion</option>
            @foreach($dibujos as $dibujo)
            <option value="{{ $dibujo->id}}" 
              @if(!empty($cotizacion->dibujo))
                {{ ($cotizacion->dibujo == $dibujo->id) ? 'selected' : '' }}
              @endif >
              {{ $dibujo->dibujo_nombre}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="form-group col-sm-6">
      {!! Form::label('descripcion', 'Tiempo entrega:') !!}
      <input type="text" name="tiempo" id="tiempo" class="form-control" value="{{ $cotizacion->tiempo }}" readonly="">
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Condiciones :</label>
        <select class="form-control custom-select required" name="id_notas" id="id_notas">
            <option value="">Seleccione una opcion</option>
            @foreach($condiciones as $cond)
            <option value="{{ $cond->id}}" 
              @if(!empty($cotizacion->id_notas))
                {{ ($cotizacion->id_notas == $cond->id) ? 'selected' : '' }}
              @endif >
              {{ 'Condiciones cotización'}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Income terms :</label>
        <select class="form-control custom-select required" name="income" id="income">
            <option value="">Seleccione una opcion</option>
            @foreach($income as $inco)
            <option value="{{ $inco->id}}" 
              @if(!empty($cotizacion->income))
                {{ ($cotizacion->income == $inco->id) ? 'selected' : '' }}
              @endif >
              {{ $inco->income}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    
    <div class="form-group col-sm-6">
      {!! Form::label('descripcion', 'Descripcion:') !!}
      <textarea class="form-control" id="descripcion" name="descripcion">{{ $cotizacion->descripcion}}</textarea>
    </div>
  </div>
</fieldset>
<!-- Step 2 -->
<h6>Cotizar</h6>
<fieldset>
  <div class="row">
    <div class="col-md-12">
      <h5 style="">Cotización <b> {{ $num_cotizacion }} </b></h5>
      <hr>
      <table class="table table-bordered">
        <thead class="" style="background: #518a87; border: 1px solid #518a87; color: white;">
          <tr>
            <th>Número parte</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td id="nparte">{{ $cotizacion->numero_parte }}</td>
            <td>{{ $cotizacion->descripcion }}</td>
            <td><input type="number"  name="cantida" id="cantidad" class="form-control required" value="{{ $cotizacion->cantidad }}"></td>
            <td>{{ number_format($cotizacion->costo) }}</td>
          </tr>
        </tbody>
      </table>
      <h5>Check List Información<hr/></h5>
      <div id="daily-activity" class="table-responsive height-350">
          <table class="table table-bordered table-hover mb-0">
            <tbody>
              @for($i=1; $i<=10; $i++)
              <tr>
                <td>
                  <div class="d-inline-block custom-control custom-checkbox">
                    <input type="checkbox" name="status4" class="custom-control-input required" required="">
                    <label class="custom-control-label" for="staffing4">Staffing</label>
                  </div>
                </td>
                <td>Bricks Walking</td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
    </div>
  </div>
</fieldset>
<!-- Step 3 -->
<h6>Check list</h6>
<fieldset>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="eventName4">Event Name :</label>
        <input type="text" class="form-control" id="eventName4">
      </div>
      <div class="form-group">
        <label for="eventType4">Event Type :</label>
        <select class="custom-select form-control" id="eventType4" data-placeholder="Type to search cities"
        name="eventType4">
          <option value="Banquet">Banquet</option>
          <option value="Fund Raiser">Fund Raiser</option>
          <option value="Dinner Party">Dinner Party</option>
          <option value="Wedding">Wedding</option>
        </select>
      </div>
      <div class="form-group">
        <label for="eventLocation4">Event Location :</label>
        <select class="custom-select form-control" id="eventLocation4" name="location">
          <option value="">Select City</option>
          <option value="Amsterdam">Amsterdam</option>
          <option value="Berlin">Berlin</option>
          <option value="Frankfurt">Frankfurt</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Event Date - Time :</label>
        <div class='input-group'>
          <input type='text' class="form-control datetime" />
          <div class="input-group-append">
            <span class="input-group-text">
              <span class="ft-calendar"></span>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="eventStatus4">Event Status :</label>
        <select class="custom-select form-control" id="eventStatus4" name="eventStatus">
          <option value="Planning">Planning</option>
          <option value="In Progress">In Progress</option>
          <option value="Finished">Finished</option>
        </select>
      </div>
      <div class="form-group">
        <label>Requirements :</label>
        <div class="c-inputs-stacked">
          <div class="d-inline-block custom-control custom-checkbox">
            <input type="checkbox" name="status4" class="custom-control-input" id="staffing4">
            <label class="custom-control-label" for="staffing4">Staffing</label>
          </div>
          <div class="d-inline-block custom-control custom-checkbox">
            <input type="checkbox" name="status4" class="custom-control-input" id="catering4">
            <label class="custom-control-label" for="catering4">Catering</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</fieldset>
<!-- Step 4 -->
<h6>Invoice</h6>
<fieldset>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="meetingName4">Name of Meeting :</label>
        <input type="text" class="form-control" id="meetingName4">
      </div>
      <div class="form-group">
        <label for="meetingLocation4">Location :</label>
        <input type="text" class="form-control" id="meetingLocation4">
      </div>
      <div class="form-group">
        <label for="participants4">Names of Participants</label>
        <textarea name="participants" id="participants4" rows="4" class="form-control"></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="decisions4">Decisions Reached</label>
        <textarea name="decisions" id="decisions4" rows="4" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Agenda Items :</label>
        <div class="c-inputs-stacked">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="agenda4" class="custom-control-input" id="item41">
            <label class="custom-control-label" for="item41">1st item</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="agenda4" class="custom-control-input" id="item42">
            <label class="custom-control-label" for="item42">2nd item</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="agenda4" class="custom-control-input" id="item43">
            <label class="custom-control-label" for="item43">3rd item</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="agenda4" class="custom-control-input" id="item44">
            <label class="custom-control-label" for="item44">4th item</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="agenda4" class="custom-control-input" id="item45">
            <label class="custom-control-label" for="item45">5th item</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</fieldset>
