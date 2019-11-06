 <div id="detalle_cotiza">
 @include('ordenes_compras.detalle')
 </div>
  <div class="row ">
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Notas : </label>
        <textarea class="form-control" id="notas" name="notas" readonly=""><?php  echo ($ordenesCompra->notas); ?></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Inco term : </label>
        <select class="form-control custom-select required" style="width: 100%;"name="income" id="income" disabled="">
            <option value="">Seleccione una opcion</option>
            @foreach($income as $inco)
            <option value="{{ $inco->id}}" 
              @if(!empty($ordenesCompra->income))
                {{ ($ordenesCompra->income == $inco->id) ? 'selected' : '' }}
              @endif >
              {{ $inco->income}}
            </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="lastName4">Lugar : </label>
        <textarea class="form-control" id="lugar" name="lugar" disabled=""><?php echo ($ordenesCompra->lugar);?></textarea>
      </div>
    </div>
    <br>
  </div>
  <hr>
  <div class="form-group col-sm-12" style="text-align: right;">
    <a href="" class="btn btn-warning mr-1">Cancelar</a>
    <a href=""  class="btn btn-primary">Enviar cotización</a>
</div>
