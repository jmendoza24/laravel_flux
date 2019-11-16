@extends('layouts.app')
@section('titulo') Catálogo formas @endsection
@section('content')
<div class="col-md-12">
    <form method="post">
        <div class="form-row">
            <div class="col-md-3">
              <label for="validationDefault01">Forma:</label>
              <select class="form-control" id="forma" name="forma" required="" onchange="filtra_forma()">
                    <option value="">Seleccione una opción...</option>
                    @foreach($formas as $forma)
                    <option value="{{$forma->id}}">{{$forma->forma}}</option>
                    @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <label for="validationDefault02">Identificador:</label>
              <select class="form-control" id="identificador" name="identificador" required="">
                    <option value=""  >Seleccione una opción...</option>
                    <option value="1" id="cam1" >Espesor (Thickness)</option>
                    <option value="2" id="cam2">Ancho (Wide)</option>
                    <option value="3" id="cam3">Altura (Wide2)</option>
                    <option value="4" id="cam4">Peso por Distancia</option>
                   <!-- <option value="5">(OM)Ancho (Wide)</option>
                    <option value="6">(OM)Largo (Length)</option>
                    <option value="7">(OM)Peso (Weight)</option>
                    <option value="8">Precio</option>--->
              </select>
            </div>
            <div class="col-md-3">
              <label for="validationDefaultUsername">Valor</label>
              <div class="input-group">
                <input type="text" class="form-control" name="valor" id="valor" required="">
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationDefaultUsername">&nbsp;</label>
              <div class="input-group">
                <button type="submit" class="btn btn-primary pull-right" onclick="guarda_catalogo()"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              </div>
            </div>
        </div>
    </form>
</div>
<br>
<div class="col-md-12" id="cat_formas">
    @include('catalogo_formas.table')
</div>
@endsection

