<table class="table table-bordered">
	<tr>
		<td>
			Comentarios:
		</td>
		<td colspan="2">
			<textarea class="form-control"></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="3"> Cargar Fotos<br>
      <form method="post" enctype="multipart/form-data" class="form-inline" id="formUpload">
              {!! csrf_field() !!}
        <input type="file" name="fotos_im" class="form-control"> &nbsp;&nbsp;
        <span class="btn btn-primary" onclick="carga_documentos(1)">Cargar</span>
      </form>
    </td>
	</tr>
	<tr>
		<td colspan="3">
			<div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
              <div class="row">
                <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                  <a href="{{ url('app-assets/images/gallery/1.jpg')}}" itemprop="contentUrl" data-size="480x360">
                    <img class="img-thumbnail img-fluid" src="{{ url('app-assets/images/gallery/1.jpg')}}"
                    itemprop="thumbnail" alt="Image description" />
                  </a>
                </figure>
                <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                  <a href="{{ url('app-assets/images/gallery/2.jpg')}}" itemprop="contentUrl" data-size="480x360">
                    <img class="img-thumbnail img-fluid" src="{{ url('app-assets/images/gallery/2.jpg')}}"
                    itemprop="thumbnail" alt="Image description" />
                  </a>
                </figure>
                <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                  <a href="{{ url('app-assets/images/gallery/3.jpg')}}" itemprop="contentUrl" data-size="480x360">
                    <img class="img-thumbnail img-fluid" src="{{ url('app-assets/images/gallery/3.jpg')}}"
                    itemprop="thumbnail" alt="Image description" />
                  </a>
                </figure>
                <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                  <a href="{{ url('app-assets/images/gallery/4.jpg')}}" itemprop="contentUrl" data-size="480x360">
                    <img class="img-thumbnail img-fluid" src="{{ url('app-assets/images/gallery/4.jpg')}}"
                    itemprop="thumbnail" alt="Image description" />
                  </a>
                </figure>
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
		<th>PDF</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>Documento</td>
		<td>Fecha</td>
		<td>PDF</td>
	</tr>
	<tr>
		<td>Documento</td>
		<td>Fecha</td>
		<td>PDF</td>
	</tr>
	<tr>
		<td>Documento</td>
		<td>Fecha</td>
		<td>PDF</td>
	</tr>
	<tr>
		<td>Documento</td>
		<td>Fecha</td>
		<td>PDF</td>
	</tr>
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