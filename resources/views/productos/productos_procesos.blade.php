<div style="height: 600px;">
  <div class="sidebar-left sidebar" style="max-height: 450px;">
    <div class="sidebar">
      <div class="sidebar-content card d-none d-lg-block">
        <div class="card-body chat-fixed-search" style="">
          <fieldset class="form-group position-relative has-icon-left m-0" >
              <h5 style="color:#518A87;"><b>Procesos</b></h5>
          </fieldset>
        </div>
        <div id="users-list" class="list-group position-relative ps-scrollbar-y" style="overflow-y: scroll; max-height: 500px;">
          <div class="users-list-padding media-list">
            <table style="width: 100%;">        
              @foreach($procesos as $proc)
              <tr>
                <td>
               <h4> {{ $proc->procesos }}</h4>
              </td>
              <td>
              <div style="float: right; text-align: right;">
                  <a onclick="ver_proceso({{$proc->id}},{{$id_producto}})" class='btn btn-xs btn-float btn-outline-info btn-round'><i class="fa fa-eye"></i></a>
                
                  <a  onclick="@if($proc->asignado==1)
                                quitar_proceso({{$proc->id}},{{$id_producto}})
                              @else
                              agrega_proceso({{$proc->id}},{{$id_producto}})
                              @endif" 
                    class="btn btn-float btn-xs btn-round btn-outline-{{ ($proc->asignado==1)?'danger':'success' }}" >
                    <i class="fa fa-{{ ($proc->asignado==1)?'trash':'check-square-o' }}"></i>
                  </a>
              </div>
              </td>
            </tr>
            @endforeach
          </table>
          </div>
        </div>
      </div>
    </div>
  </div/>
  <div class="content-right" style="overflow-y: scroll; max-height:550px; ">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="chat-app-window" >
          <div class="badge badge-default" style="width: 100%;">
            <b style="color:#518A87; "><h5>Subprocesos</h5></b>
          </div>
          <div class="chats">
            <div class="chats">
              <ul class="list-group icheck-task row skin skin-flat">
                @foreach($subprocesos as $sub)
                <li class="list-group-item">
                  <a onclick="@if($sub->asignado==1)
                                quitar_subproceso({{$sub->id}},{{$sub->idproceso}},{{$id_producto}})
                              @else
                                agrega_subproceso({{$sub->id}},{{$sub->idproceso}},{{$id_producto}})
                              @endif"  class='btn btn-float btn-outline-{{ ($sub->asignado ==1)? 'danger':'success' }} btn-round'><i class="fa fa-{{ ($sub->asignado ==1)? 'trash':'check' }}"></i></a>
                  &nbsp; {{ $sub->subproceso}}
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>