<div class="col-md-8" style="overflow-y: scroll; max-height: 600px;">
  <table class="table table-striped table-bordered">  
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
</table>
</div/>