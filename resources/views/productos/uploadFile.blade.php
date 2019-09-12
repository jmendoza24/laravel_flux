@extends('layouts.app')
@section('titulo')
    Productos 
@endsection

@section('content')

<div class="alert" id="message" style="display: none"></div>
	<form method="POST" id="upload_form" enctype="multipart/form-data">
	 {{ csrf_field() }}
<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
			<table class="table">
				<tr>
					<td width="40%" align="right"><label>Select File for Upload</label></td>
					<td width="30"><input type="file" name="select_file" id="select_file" /></td>
					<td width="30%" align="left"><input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload"></td>
				</tr>
				<tr>
					<td width="40%" align="right"></td>
					<td width="30"><span class="text-muted">jpg, png, gif</span></td>
					<td width="30%" align="left"></td>
				</tr>
			</table>
	</div>
	</form>

<br />
<span id="uploaded_image"></span>
</div>     
@endsection
<script type="text/javascript">
	$(document).ready(function(){

 $('#upload_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('ajaxupload.action') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
    $('#message').css('display', 'block');
    $('#message').html(data.message);
    $('#message').addClass(data.class_name);
    $('#uploaded_image').html(data.uploaded_image);
   }
  })
 });

});
</script>
