  <table class="table table-striped table-bordered">  
    <thead>
      <tr>
        <th>Forma</th>
        <th>Espesor (Thickness)</th>
        <th>Ancho (Wide)</th>
        <th>Altura (Wide2)</th>
        <th>Peso por Distancia</th>
        <th>Ancho (Wide)</th>
        <th>Largo (Length)</th>
        <th>Peso (Weight)</th>
        <th>Precio</th>
      </tr>
    </thead>   
    <tbody>
      @foreach($materiales as $mat)
      <tr>
        <td>
            <label>Forma</label>
          </td>
        <td><input  type="number" id="cam{{ $mat->id}}1" class="form-control" step="any" min="0" name="a1"></td>
        <td><input  type="number" id="cam{{ $mat->id}}2" class="form-control" step="any" min="0" name="a2"></td>
        <td><input  type="number" id="cam{{ $mat->id}}3" class="form-control" step="any" min="0" name="a4"></td>
        <td><input  type="number" id="cam{{ $mat->id}}4" class="form-control" step="any" min="0" name="s2"></td>
        <td><input  type="number" id="cam{{ $mat->id}}5" class="form-control" step="any" min="0" name="ss"></td>
        <td><input  type="number" id="cam{{ $mat->id}}6" class="form-control" step="any" min="0" name="sss"></td>
        <td><input  type="number" id="cam{{ $mat->id}}7" class="form-control" step="any" min="0" name="ssss"></td>
        <td><input  type="number" id="cam{{ $mat->id}}8" class="form-control" step="any" min="0" name="ssss"></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- <table class="table table-striped table-bordered">  
  <thead>
    <tr>
      <th>Materiales</th>
    </tr>
  </thead>   
  <tbody>
    @foreach($materiales as $mat)
    <tr>
      <td style="{{ ($mat->asignado==1)?'color:#518a87; font-weight: bold;':'' }}">
        <input type="checkbox" class="switch" id="switch5" data-group-cls="btn-group-sm" {{ ($mat->asignado ==1)? 'checked':'' }} 
          onchange="@if($mat->asignado==1)
                      quitar_material({{$mat->id}},{{$id_producto}})
                    @else
                      agrega_material({{$mat->id}},{{$id_producto}})
                    @endif" 
        >
        <label>{{ $mat->material }}</label>
      </td>
  </tr>
  @endforeach
  </tbody>   
</table>-->
