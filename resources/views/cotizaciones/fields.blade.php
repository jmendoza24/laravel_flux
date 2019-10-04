@section('titulo')
    Cotización FX-000{{ $num_cotizacion }} | <b>Fecha :</b> {{ date('Y-m-d') }}
@endsection
<!-- Step 1 -->
<h6>Cotizar</h6>
<fieldset>
  <div class="row form-inline">
    <div class="col-md-5">
      <div class="form-group">
        <label for="lastName4">Cliente : </label>
        <input type="hidden" id="cliente_cot" value="{{$cotizacion->cliente}}">
        <select class="custom-select required form-control" style="width: 100%;" name="cliente" id="cliente" onchange="obtiene_producto()">
            <option value="">Seleccione una opcion</option>
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id}}" 
              @if(!empty($cotizacion->cliente))
                {{ ($cotizacion->cliente == $cliente->id) ? 'selected' : '' }}
              @endif >
              {{ $cliente->nombre_corto}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label for="lastName4">Producto : </label>
        <select class="form-control custom-select required" style="width: 100%;"name="producto" id="producto" onchange="cotizacion_info({{ $num_cotizacion }})">
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
    <div class="col-md-2">
      
        <button class="btn btn-info" style="margin-top: 20px;" >Agregar</button>
      

    </div>
    <br>
    
  </div>
  <hr>

  <div class="row" style="margin-top: 5px;">
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
            <td id="nparte"></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    
    
  </div>
</fieldset>
<!-- Step 2 -->
<h6>Check List</h6>
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

<h6>Invoice</h6>
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
            <td id="nparte"></td>
            <td></td>
            <td></td>
            <td></td>
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
