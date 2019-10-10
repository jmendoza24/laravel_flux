@section('titulo')
    Cotización FX-000{{ $num_cotizacion }} | <b>Fecha :</b> {{ date('Y-m-d') }}
@endsection

<!-- Step 1 -->
<h6>Cotizar</h6>
<fieldset>
  <div class="row ">
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
        <select class="form-control custom-select" style="width: 100%;"name="producto" id="producto">
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
        <a class="btn btn-info" style="margin-top: 25px; color: white;" onclick="agrega_producto()" >Agregar</a>
    </div>
    <br>
    
  </div>
  <hr>

  <div class="row" style="margin-top: 5px;" id="detalle_cotiza">
    @include('cotizaciones.detalle')
  </div>
  <hr>
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <select class="custom-select required form-control" style="width: 100%;" name="notas" id="notas">
            <option value="1">Cotizacion</option>
          </select>
          <br/><br/>
          <label id="notas_lbl">
            <?php  echo nl2br($cotizacion->notas) ?>
          </label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Income terms : </label>
        <select class="form-control custom-select required" style="width: 100%;"name="income" id="income">
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
    <br>
    
  </div>
  
</fieldset>
<!-- Step 2 -->
<h6>Check List</h6>
<fieldset>
  <div class="row">
    
    <div class="col-md-12">
      {{ var_dump($info_producto)}}
      @include('cotizaciones.costeo')
      
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
