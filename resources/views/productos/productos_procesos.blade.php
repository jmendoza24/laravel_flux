<div style="height: 600px;">
  <div class="sidebar-left col-md-6" style="max-height: 450px;">
    <div class="sidebar" style=" border: 0px solid red; width: 100%;">
      <div class="sidebar-content card d-none d-lg-block">
        <div id="users-list" class="list-group position-relative ps-scrollbar-y" style=" overflow-y: scroll; max-height: 500px;">
          <div class="users-list-padding media-list" >
            <table class="table table-striped table-bordered table-procesos tableFixHead">   
            <thead>
              <tr>
                <th colspan="2">Procesos</th>
                <th>Horas</th>
              </tr>
            </thead>   
            <tbody>
              @foreach($procesos as $proc)
              <tr>

                <td style="{{ ($proc->asignado==1)?'color:#518a87; font-weight: bold;':'' }}">
                 <input type="checkbox" class="switch" id="switch5" data-group-cls="btn-group-sm" {{ ($proc->asignado ==1)? 'checked':'' }} 
                    onchange="@if($proc->asignado==1)
                                quitar_proceso({{$proc->id}},{{$id_producto}})
                              @else
                              agrega_proceso({{$proc->id}},{{$id_producto}})
                              @endif" 
                  >
                </td>
                <td style="text-align: left;">
                 <a onclick="ver_proceso({{$proc->id}},{{$id_producto}})">{{ $proc->procesos }}</a>
               </td>
                <td><input type="number" onchange="@if($proc->asignado==1) actualiza_proceso({{$proc->id}},{{$id_producto}}) @endif" style="width: 100px;" name="horas{{$proc->id}}" class="form-control"  id="horas{{$proc->id}}" value="{{ $proc->horasp}}" min="0"></td>
            </tr>
            @endforeach
            </tbody>   
          </table>
          </div>
        </div>
      </div>
    </div>
  </div/>
  <div class="content-right col-md-6" style="overflow-y: scroll; max-height:550px; padding-left: 3px; ">
      <div class="content-body">
        <table class="table table-striped table-bordered table-procesos tableFixHead">
          <thead>
            <tr>
              <th>Subprocesos</th>
            </tr>
          </thead>
          <tbody>            
            @foreach($subprocesos as $sub)
            <tr>
              <td>
                <input type="checkbox" class="switch" id="switch5" data-group-cls="btn-group-sm" {{ ($sub->asignado ==1)? 'checked':'' }} 
                  onchange="@if($sub->asignado==1)
                            quitar_subproceso({{$sub->id}},{{$sub->idproceso}},{{$id_producto}})
                          @else
                            agrega_subproceso({{$sub->id}},{{$sub->idproceso}},{{$id_producto}})
                          @endif"/>
<!--                <a onclick="@if($sub->asignado==1)
                            quitar_subproceso({{$sub->id}},{{$sub->idproceso}},{{$id_producto}})
                          @else
                            agrega_subproceso({{$sub->id}},{{$sub->idproceso}},{{$id_producto}})
                          @endif"  class='btn btn-float btn-outline-{{ ($sub->asignado ==1)? 'danger':'success' }} btn-round'><i class="fa fa-{{ ($sub->asignado ==1)? 'trash':'check' }}"></i></a>--->
              &nbsp; 
              <span style="{{ ($sub->asignado==1)?'color:#518a87; font-weight: bold;':'' }}">
              &nbsp;&nbsp;&nbsp;{{ $sub->subproceso}}
              </span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>