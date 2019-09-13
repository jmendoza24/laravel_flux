@extends('layouts.app')
@section('titulo')
    Productos 
@endsection

@section('content')

<div class="alert" id="message" style="display: none"></div>
	<form method="post" action="{{ route('ajaxupload.action')}}" class="form-horizontal" enctype='multipart/form-data'>
		<input type="hidden" name="_token" value="{{ csrf_token()}}">
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
<span id="uploaded_image">
	{{ $url }}
	<img src="{{ url($url)}}" alt="" />
	
</span>
</div>     
@endsection
