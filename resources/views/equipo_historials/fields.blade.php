@if(!empty($eqHistofields->id))
<div class="modal-body">
@endif
<input type="text" name="id_tipo" id="id_tipo" value="{{ $eqHistofields->historial_tipo}}">

<input type="text" name="id_historia" id="id_historia" value="{{ $eqHistofields->id}}">
<input type="text" name="historia_tipo" id="historia_tipo" value="{{ $eqHistofields->historial_tipo}}">
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
        <input type="text" name="fecha" id="fecha" class="form-control pickadate-format" value="{{ $eqHistofields->fecha}}" >
        </div>
      </div>
  </div>      
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>{{ utf8_encode("Descripci?:") }}</label>
            <textarea name="descripcion" id="descripcion" placeholder="{{ utf8_encode("Descripci?:") }}" class="form-control">{{ $eqHistofields->descripcion}}</textarea>
        </div>
      </div>
  </div>       
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
            <label>Fecha vencimiento:</label>
        <input type="text" name="vencimiento" id="vencimiento" class="form-control pickadate-format" value="{{ $eqHistofields->vencimiento}}">
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
      <div class="form-group row">
        <div class="col-md-12">
         
        </div>
      </div>
  </div>       
</div>
<div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-4 label-control" for="userinput2">
            @if($eqHistofields->documento1 != '') <a id="doc1" href="{{ $eqHistofields->documento1}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a>@endif
            Documento 1: 
          </label>
          <div class="col-md-12">
                <input id="doc_prev1" name="doc_prev1" type="file" class="form-control" >
          </div>
        </div>   
    </div>
    <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-4 label-control" for="userinput2">
            @if($eqHistofields->documento2 != '') <a id="doc2" href="{{ $eqHistofields->documento2}}" target="_blank"> <span><i class="fa fa-file-pdf-o"></i></span></a>@endif

          Documento 2:</label>
          <div class="col-md-12">
                <input id="doc_prev2" name="doc_prev2" type="file"  class="form-control" >
          </div>
        </div>   
    </div>
</div>


        
@if(!empty($eqHistofields->id) && $a=1)


<div class="modal-footer">
  <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Cancelar</button>
  <button type="button" class="btn btn-primary" onclick="actualiza_historia({{$eqHistofields->id}},{{ $eqHistofields->historial_tipo}})">Guardar</button>
</div>
@else


          <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
              <button type="button"  class="btn btn-primary" onclick="guarda_historial({{$equipos->id}})">Guardar</button>
            </div>

@endif

@if($a=0)

          <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
              <button type="button"  class="btn btn-primary" onclick="guarda_historial({{$equipos->id}})">Guardar</button>
            </div>
@endif
