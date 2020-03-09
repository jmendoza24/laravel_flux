<div style="overflow-y: auto; max-height: 500px;">
<table class="table table-compact table-striped table-bordered">
	<thead>
		<tr>
			<td colspan="2"><b>Información del producto</b></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Descripción:</td>
			<td>{{$producto->descripcion}}</td>
		</tr>
		<tr>
			<td>Parte:</td>
			<td>{{$producto->numero_parte}}</td>
		</tr>
		<tr>
			<td>Peso:</td>
			<td>{{ number_format($producto->peso,2)}}</td>
		</tr>
		<tr>
			<td>Num. Dibujo:</td>
			<td>{{ $producto->revision}}</td>
		</tr>
    <tr>
      <td>OCC:</td>
      <td>{{ $producto->orden_compra}}</td>
    </tr>
    @if($producto->dibujo != '')
		<tr>
			<td colspan="2">
				<div class="card-body  my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
              	<div class="row">
                  @php( $tipo = explode('.',$producto->dibujo) )
                  @if($tipo[1] !='pdf')
        					<figure class="col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
  	                  <a href="{{ asset($producto->dibujo)}}" itemprop="contentUrl" data-size="480x360">
  	                    <img class="img-thumbnail img-fluid" src="{{ asset($producto->dibujo)}}"  
  	                    itemprop="thumbnail" alt="{{ $producto->dibujo_nombre}}" />
                      </a>
	                </figure>
                  @else 
                  <div class="embed-responsive embed-responsive-item embed-responsive-16by9">
                    <iframe class="img-thumbnail" src="{{$producto->dibujo}}"
                    width="640" height="360"></iframe>
                  </div>
                  @endif
            	</div>
        	</div>
			</td>
		</tr>
    @endif
	</tbody>
</table>
</div>
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
