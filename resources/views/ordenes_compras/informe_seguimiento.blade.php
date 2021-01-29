@if($seguimiento_calidad->estatus==2)
<div class="row" style="height: 200px;">
<h4 class="col-md-12">Proceso finalizado, Si necesitas modifcar, solicitar desbloqueo al administrador </h4>

<label class="col-md-2">Ingresa tu correo</label>
<div class="col-md-3">
<input type="email" name="" class="form-control">
</div>
<div class="col-md-2">
  <span class="btn btn-primary">Enviar solicitud</span>
</div>

</div>
@else
<table class="table">
	<tr>
		<td>Comentarios:</td>
		<td><textarea class="form-control" id="comentario" onchange="seguimiento_calidad_proceso({{ $filtro->id_proceso}},{{ $filtro->id_detalle }},{{ $filtro->id_orden}},'comentario')">{{ $seguimiento_calidad->comentario }}</textarea></td>
    <td>
      Estatus:
    </td>
    <td>
      <select class="form-control" id="estatus" onchange="seguimiento_calidad_proceso({{ $filtro->id_proceso}},{{ $filtro->id_detalle }},{{ $filtro->id_orden}},'estatus')">
        <option value="0" {{ ($seguimiento_calidad->estatus==0)?'selected':''}}>Pendiente</option>
        <option value="1" {{ ($seguimiento_calidad->estatus==1)?'selected':''}}>Rechazado</option>
        <option value="2" {{ ($seguimiento_calidad->estatus==2)?'selected':''}}>Aceptado</option>
      </select>
    </td>
	</tr>
	<tr>
		<td colspan="4"> Cargar Archivos y Fotos<b class="red">*</b><br> 
      <form method="post" enctype="multipart/form-data" class="form-inline" id="formUpload">
              {!! csrf_field() !!}
        <input type="hidden" name="id_orden" value="{{ $filtro->id_orden}}">
        <input type="hidden" name="id_detalle" value="{{ $filtro->id_detalle }}">
        <input type="hidden" name="id_proceso" value="{{ $filtro->id_proceso}}">
        <input type="file" name="fotos_im" class="form-control"> &nbsp;&nbsp;
        <select class="form-control" name="tipo" required="">
          <option value="2">Archivos</option>
          <option value="1">Fotos</option>
        </select>&nbsp;&nbsp;
        <input type="text" name="nombre" id="nombre" class="form-control">&nbsp;&nbsp;
        <span class="btn btn-primary" onclick="carga_documentos(1)">Cargar</span>
      </form>
    </td>
	</tr>
	<tr>
		<td colspan="4">
			<div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
        <div class="row">
          @foreach($images_produccion as $images)
          <div class="col-md-3">
           <center> <span class="btn btn-danger" onclick="borra_ft({{ $images->id }},{{ $filtro->id_orden}},{{ $filtro->id_detalle }},{{ $filtro->id_proceso}})" style="margin-bottom: 5px;"><i class="fa fa-trash"></i></span></center>
          <figure class="col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="{{ url($images->archivo)}}" itemprop="contentUrl" data-size="480x360">
              <img class="img-thumbnail img-fluid" src="{{ url($images->archivo)}}"
              itemprop="thumbnail" alt="Image description" />
            </a>
            <label>{{ $images->nombre }}</label>
          </figure>
          </div>
          @endforeach
        </div>
      </div>
		</td>
	</tr>
</table>
<table class="table table-bordered compact" id="tbl_listado_doc">
	<thead>	
	<tr>
		<th>Documento</th>
		<th>Fecha</th>
		<th>Usuario</th>
	</tr>
	</thead>
	<tbody>
  @foreach($files_produccion as $files)
	<tr>
		<td><a href="{{ $files->archivo}}" target="_blank">{{ $files->nombre}}</td>
		<td>{{ substr($files->fecha, 0,10) }}</td>
		<td>{{ $files->user_name}}</td>
	</tr>
  @endforeach
	</tbody>
</table>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <!-- Background of PhotoSwipe. 
 It's a separate element as animating opacity is faster than rgba(). -->
  <div class="pswp__bg"></div>
  <!-- Slides wrapper with overflow:hidden. -->
  <div class="pswp__scroll-wrap">
    <!-- Container that holds slides. 
    PhotoSwipe keeps only 3 of them in the DOM to save memory.
    Don't modify these 3 pswp__item elements, data is added later on. -->
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <!--  Controls are self-explanatory. Order can be changed. -->
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <button class="pswp__button pswp__button--share" title="Share"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
        <!-- element will get class pswp__preloader-active when preloader is running -->
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
      </button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
      </button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>

@section('script')
<script type="text/javascript">
	$("#tbl_listado_doc").DatTable({
		"scrollY":        "200px",
        "scrollCollapse": true,
	})
</script>
@endsection
@endif
