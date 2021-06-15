@extends('layout/layout-homebase')

@section('content')
	<div class = "d-flex flex-row">
		<div style = "width:70%;">
			@if(!empty($data))
				@foreach($data as $post)
					<div class="card mt-2" style="width:620px; border:1px solid #dbdbdb;">
						<div class = "p-3">
							<a href = "{{route('profile_page', ['account_name' => $post->username])}}"><img style = "border-radius: 50%;" src = "{{$post->selfie_path}}" width = "35px" /><strong style = "padding-left:10px;">{{$post->username}}</strong></a>
						</div>
						<!-- seberarnya makek asset fitur laravel, tapi gara2 keterbatasan dari heroku jadi semua gambar harus berada di folder public-->
						<img style = "width:100%; height:auto; object-fit: cover;" src = "{{$post->path_src}}" width = "600" loading = "lazy" /> 
						<div style = "padding:7px 10px">
							<a href = "{{route('add_liked_dta', [
								'account_name' => session('account_username'),
								'idPostingan' => $post->id
								])}}">
								@if($post->alreadyLiked === true)
								  <i class='fas fa-heart' style = "font-size:23px; color:red;"></i>
								@else
								  <i class='far fa-heart' style = "font-size:23px; color:black;"></i>
								@endif
							</a>
							<a href = "" class = "p-2"><i class='far fa-comment' style = "font-size:23px; color:black;"></i></a>
							<a href = "" class = "p-2"><i class='fas fa-location-arrow' style = "font-size:20px; color:black;"></i></a>
						</div>
						<div>
						  @if($post->totalLiked === 0)
						    Be the first to <strong>like this</strong>
						  @else
						    <strong>{{$post->totalLiked}} likes</strong>
						  @endif
						</div>
						<div style = "padding:7px 10px">
							<a href = "{{route('profile_page', ['account_name' => $post->username])}}"><strong>{{$post->username}}</strong></a> {{$post->caption}}
						</div>
						<div style = "padding:7px 10px">{{$post->when_its_uploaded}}</div>
						<div style = "border-top: 1px solid #dbdbdb; padding:10px 0;">
							<form method = "post" id = "commentForm">
								<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" />   
								<input type = "hidden" name = "username" value = "{{$post->username}}" />
								<input type = "hidden" name = "postingan_id" value = "{{$post->id}}" />
								<i class='far fa-smile' style='text-align:center; font-size:24px; width:10%; '></i>
								<input style = "width:69%;"  type = "text" name = "comment" placeholder = "Add a comment"/>
								<input style = "width:12%;"type = "submit" id = "buttonComment" class="btn btn-primary" value = "Post" />
							</form>
						</div>
					</div>
					<br />
				@endforeach
			@else
				<h3>Data is not set</h3>
			@endif
		</div>
		<div style = "width:22%;" class = "fixed-sidebar-timeline">
			<div style = "margin-top:10px;">
				@if(!empty($userData))
					<div class = "d-flex flex-row text-light" >
						<div>
							<img style = "border-radius: 50%;" src = "{{session('account_img_path')}}" width = "45px" />
						</div>
						<div class = "d-flex flex-column" style = "color:black; margin-left:10px;">
							<div class = "d-flex justify-content-between" style = "width:235px;">
								<div>
									{{$userData->username}}<br />
									<span class = "text-secondary">{{$userData->full_name}}</span>
								</div>
								<div>switch</div>
							</div>
						</div>
					</div>

					<div class = "d-flex flex-row text-light" style = "padding:10px 0;" >
						<div class = "d-flex flex-column" style = "color:black; margin-left:10px;">
							<div class = "d-flex justify-content-between" style = " width:280px;">
								<div>
									Suggestions For You
								</div>
								<div>See All</div>
							</div>
						</div>
					</div>

					@if(!empty($data))
						@foreach($suggestionData as $post)
							<div class = "d-flex flex-row text-light" style = "padding:3px 0;">
								<div>
									<img style = "border-radius: 50%;" src = "{{$post->selfie_path}}" width = "25px" />
								</div>
								<div class = "d-flex flex-column" style = "color:black; margin-left:10px;">
									<div class = "d-flex justify-content-between" style = "width:255px;">
										<div>
											{{$post->username}}<br />
											<span class = "text-secondary">{{$post->full_name}}</span>
										</div>
										<div>follow</div>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<h1>Something wrong here</h1>
					@endif
				@else
					<h1>Something wrong here</h1>
				@endif
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 

	<script>
		$(document).ready(function () {
			$("#buttonComment").click(function (event) {

				//stop submit the form, we will post it manually.
				event.preventDefault();

				// Get form
				var form = $('#commentForm')[0];

				// Create an FormData object 
				var data = new FormData(form);
				console.log(data.get('username'));

				// disabled the submit button
				// $("#buttonComment").prop("disabled", true);

				// $.ajax({
				// 	type: "POST",
				// 	url: "/",
				// 	data: data,
				// 	processData: false,
				// 	contentType: false,
				// 	cache: false,
				// 	timeout: 800000,
				// 	success: function (data) {

				// 		// $("#output").text(data);
				// 		// console.log("SUCCESS : ", data);
				// 		// $("#btnSubmit").prop("disabled", false);
				// 		console.log('sukses');

				// 	},
				// 	error: function (e) {
				// 		console.log('gagal');
				// 		// $("#output").text(e.responseText);
				// 		// console.log("ERROR : ", e);
				// 		// $("#btnSubmit").prop("disabled", false);

				// 	}
				// });

			});

		});		
	</script>

@endsection