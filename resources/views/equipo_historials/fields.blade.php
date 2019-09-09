@if(!empty($eqHistofields->id))
<div class="modal-body">
@endif
<input type="text" id="id_historia" value="{{ $eqHistofields->id}}">
<input type="text" id="historia_tipo" value="{{ $eqHistofields->historial_tipo}}">
<input type="text" id="id_tipo" value="{{ $eqHistofields->tipo}}">
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Responsable:</label>
        <input type="text" name="responsable" id="responsable" class="form-control" value="{{ $eqHistofields->responsable}}" >
        </div>
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $eqHistofields->fecha}}" >
        </div>
      </div>
  </div>       
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Descripción:</label>
            <textarea name="descripcion" id="descripcion" placeholder="Descripción" class="form-control">{{ $eqHistofields->descripcion}}</textarea>
        </div>
      </div>
  </div>       
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Fecha vencimiento:</label>
        <input type="date" name="vencimiento" id="vencimiento" class="form-control" value="{{ $eqHistofields->vencimiento}}">
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Activo:</label>
            <select class="form-control" id="activo" name="activo">
                <option value="">Seleccione una opcion</option>
                <option value="1" @if($eqHistofields->activo=='1'){{ "selected"}} @endif>Si</option>
                <option value="0" @if($eqHistofields->activo=='0'){{ "selected"}} @endif>No</option>
            </select>
        </div>
      </div>
  </div>       
</div>
@if(!empty($eqHistofields->id))
</div>

<div class="modal-footer">
  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-outline-primary" onclick="actualiza_historia({{$eqHistofields->id}})">Guardar</button>
</div>
@endif
