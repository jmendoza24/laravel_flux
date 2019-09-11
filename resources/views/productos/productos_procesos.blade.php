<div style="height: 600px; background-color: #FAF7F7;">
  <div class="sidebar-left sidebar" style="max-height: 450px; padding: 5px;">
    <div class="sidebar">
      <div class="sidebar-content card d-none d-lg-block">
        <div class="card-body chat-fixed-search" style="background: #FAF7F7;">
          <fieldset class="form-group position-relative has-icon-left m-0" style="color: #518A87; text-align: center;  border-radius: 1px;  border: 3px solid #518A87;">
            <h4><b>Procesos</b></h4>
          </fieldset>
        </div>
        <div id="users-list" class="list-group position-relative ps-scrollbar-y" style="overflow-y: scroll; max-height: 500px;">
          <div class="users-list-padding media-list">
            @foreach($procesos as $proc)
            <div class="media border-0">
              <div class="media-left pr-1">
                  <button type="button" onclick="ver_proceso({{$proc->id}},{{$id_producto}})" class="btn btn-{{ ($proc->asignado==1)?'success':'secondary' }}"><i class="fa fa-{{ ($proc->asignado==1)?'check':'' }}"></i> {{ $proc->procesos }}</button>
              </div>
              <div class="media-body w-100">
                
                <h4 class="list-group-item-heading">
                <span class="list-group-item-text text-muted mb-0">
                  <a  onclick="@if($proc->asignado==1)
                                    quitar_proceso({{$proc->id}},{{$id_producto}})
                                  @else
                                  agrega_proceso({{$proc->id}},{{$id_producto}})
                                  @endif" 

                    class="float-right">
                    <i class="font-medium-1 icon-pin lighten-3" style="{{ ($proc->asignado==1)?'color:#008385':'color:silver' }}"></i>
                  </a>
                </span>
                </h4>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-right" style="overflow-y: scroll; height:550px; ">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="chat-app-window">
          <div class="badge badge-default mb-1"><b style="color:#518A87; "><h5>Subprocesos</h5></b></div>
          <div class="chats">
            <div class="chats">
              <ul class="list-group icheck-task row skin skin-flat">
                <li class="list-group-item">
                  <input type="checkbox" id="input-1"> Cras justo odio</li>
                <li class="list-group-item">
                  <input type="checkbox" id="input-2" checked> Dapibus ac facilisis in</li>
                <li class="list-group-item">
                  <input type="checkbox" id="input-3"> Morbi leo risus</li>
                <li class="list-group-item">
                  <input type="checkbox" id="input-4" disabled checked> Porta ac consectetur ac</li>
                <li class="list-group-item">
                  <input type="checkbox" id="input-5"> Vestibulum at eros</li>
              </ul>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>