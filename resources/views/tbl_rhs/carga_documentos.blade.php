 <form enctype="multipart/form-data" id="catalogos_forma" action="">
  @csrf
<input type="hidden" name="id_catalogo" value="3">
<input type="hidden" name="id" value="0">
<input type="hidden" name="id_empleado" value="{{ $documentos->id_empleado}}">
<input type="hidden" name="tipo" value="{{$documentos->tipo}}">
  <div class="row">
        <div class="col-md-12">
           <div class="form-group row">
            <label class="col-md-12">Tipo documento</label>
            <div class="col-md-12">
              <select class="form-control" name="tipo_archivo">
               @if($documentos->tipo ==1)
                <option value="1">Expediente</option>
                <option value="2">Accidente o Incidente</option>
                <option value="3">Reporte de Conducta</option>
                <option value="4">Reporte Médico</option>
                <option value="5">Entrenamiento y Certificación</option>
                @elseif($documentos->tipo ==2)
                <option value="6">Solicitud de trabajo</option>
                <option value="7">Contrato Individual de Trabajo</option>
                <option value="8">Hoja de Entrevista</option>
                <option value="9">Resultados Virtus</option>
                <option value="10">Resultados Myers Briggs </option>
                <option value="11">Evaluación de Periodo de Prueba</option>
                <option value="12">Evaluación Anual</option>
                @endif
              </select>
            </div> 
          </div>
        </div>
        <div class="col-md-12"> 
           <div class="form-group row">
            <label class="col-md-12">Descripción:</label>
            <div class="col-md-12">
              <textarea class="form-control" name="descripcion"></textarea>
            </div> 
          </div>
        </div>
        <div class="col-md-12">
           <div class="form-group row">
            <label class="col-md-12">Archivo:</label>
            <div class="col-md-12">
              <input type="file" name="archivo" class="form-control">
            </div> 
          </div>
        </div>
        <div class="col-md-12">
          <input type="button" name="" class="btn btn-primary pull-right" value="Cargar" onclick="guardar_catalogos(3,0,{{ $documentos->tipo}},'',{{ $documentos->id_empleado}})" >
        </div>
  </div>
  </form>