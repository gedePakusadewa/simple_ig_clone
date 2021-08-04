@extends('layout/layout-homebase')

@section('content')
	<div>
		<h1>UPLAOD</h1>
	</div>

	<form action = "{{route('validate_save_post', ['account_name' => session('account_username')])}}" method = "post" enctype="multipart/form-data">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" />                 
                    
		<div class="form-group">
			<label>Caption:</label>
			<div id="alertFile" class="alert alert-danger">
				<strong>Wrong image format!</strong> Please upload file having extensions .jpeg or .jpg or .png only OR image size under 1Mb.
			</div>
			<input type = "text" name = "captionUpload" />
		</div>
		<div class="form-group">
			<label>Post to Uploaded</label>
			<div id="alertFile" class="alert alert-danger">
				<strong>Wrong image format!</strong> Please upload file having extensions .jpeg or .jpg or .png only OR image size under 1Mb.
			</div>
			<input type='file' id = "fileInput" class="form-control" name="filePost" />
		</div>
		<input type = "submit" class="btn btn-primary" value ="Post" />
	</form>
@endsection
