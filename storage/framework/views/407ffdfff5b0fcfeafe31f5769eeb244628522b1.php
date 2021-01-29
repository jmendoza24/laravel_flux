<?php if($seguimiento_calidad->estatus==2): ?>
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
<?php else: ?>
<table class="table">
	<tr>
		<td>Comentarios:</td>
		<td><textarea class="form-control" id="comentario" onchange="seguimiento_calidad_proceso(<?php echo e($filtro->id_proceso); ?>,<?php echo e($filtro->id_detalle); ?>,<?php echo e($filtro->id_orden); ?>,'comentario')"><?php echo e($seguimiento_calidad->comentario); ?></textarea></td>
    <td>
      Estatus:
    </td>
    <td>
      <select class="form-control" id="estatus" onchange="seguimiento_calidad_proceso(<?php echo e($filtro->id_proceso); ?>,<?php echo e($filtro->id_detalle); ?>,<?php echo e($filtro->id_orden); ?>,'estatus')">
        <option value="0" <?php echo e(($seguimiento_calidad->estatus==0)?'selected':''); ?>>Pendiente</option>
        <option value="1" <?php echo e(($seguimiento_calidad->estatus==1)?'selected':''); ?>>Rechazado</option>
        <option value="2" <?php echo e(($seguimiento_calidad->estatus==2)?'selected':''); ?>>Aceptado</option>
      </select>
    </td>
	</tr>
	<tr>
		<td colspan="4"> Cargar Archivos y Fotos<b class="red">*</b><br> 
      <form method="post" enctype="multipart/form-data" class="form-inline" id="formUpload">
              <?php echo csrf_field(); ?>

        <input type="hidden" name="id_orden" value="<?php echo e($filtro->id_orden); ?>">
        <input type="hidden" name="id_detalle" value="<?php echo e($filtro->id_detalle); ?>">
        <input type="hidden" name="id_proceso" value="<?php echo e($filtro->id_proceso); ?>">
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
          <?php $__currentLoopData = $images_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-3">
           <center> <span class="btn btn-danger" onclick="borra_ft(<?php echo e($images->id); ?>,<?php echo e($filtro->id_orden); ?>,<?php echo e($filtro->id_detalle); ?>,<?php echo e($filtro->id_proceso); ?>)" style="margin-bottom: 5px;"><i class="fa fa-trash"></i></span></center>
          <figure class="col-12" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="<?php echo e(url($images->archivo)); ?>" itemprop="contentUrl" data-size="480x360">
              <img class="img-thumbnail img-fluid" src="<?php echo e(url($images->archivo)); ?>"
              itemprop="thumbnail" alt="Image description" />
            </a>
            <label><?php echo e($images->nombre); ?></label>
          </figure>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
  <?php $__currentLoopData = $files_produccion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $files): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><a href="<?php echo e($files->archivo); ?>" target="_blank"><?php echo e($files->nombre); ?></td>
		<td><?php echo e(substr($files->fecha, 0,10)); ?></td>
		<td><?php echo e($files->user_name); ?></td>
	</tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$("#tbl_listado_doc").DatTable({
		"scrollY":        "200px",
        "scrollCollapse": true,
	})
</script>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/flux/laravel/resources/views/ordenes_compras/informe_seguimiento.blade.php ENDPATH**/ ?>