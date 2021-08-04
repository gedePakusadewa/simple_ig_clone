@extends('layout/layout-homebase')

@section('content')
	<div class = "d-flex flex-row">
		<div class = "left-home-timeline">
			@if(!empty($data))
				@foreach($data as $post)
					<div class="card mt-2 post-card-timeline">
						<div class = "p-3">
							<a class = "account-link" href = "{{route('profile_page', ['account_name' => $post->username])}}"><img style = "border-radius: 50%;" src = "{{$post->selfie_path}}" width = "35px" /><strong style = "padding-left:10px;">{{$post->username}}</strong></a>
						</div>
						
						<!-- seberarnya makek asset fitur laravel, tapi gara2 keterbatasan dari heroku jadi semua gambar harus berada di folder public-->
						<img style = "width:100%; height:auto; object-fit: cover;" src = "{{$post->path_src}}" width = "600" loading = "lazy" /> 

						<div style = "padding:5px 10px;">
							<a href = "{{route('add_liked_dta', [
								'account_name' => session('account_username'),
								'idPostingan' => $post->id
								])}}" class = "p-1 pr-3" style = "float:left">
								@if($post->alreadyLiked === true)
								  <i class='fas fa-heart' style = "font-size:23px; color:red;"></i>
								@else
								  <i class='far fa-heart' style = "font-size:23px; color:black;"></i>
								@endif
							</a>
							<a href = "" class = "p-1  pr-3" style = "float:left"><i class='far fa-comment' style = "font-size:23px; color:black;"></i></a>
							<a href = "" class = "p-1" style = "float:left"><i class='fas fa-location-arrow' style = "font-size:20px; color:black;"></i></a>
							<a href = "" class = "p-1" style = "float:right"><i class='far fa-bookmark' style = "font-size:20px; color:black;"></i></a>
						</div>
						<div style = "padding:5px 10px;">
						  @if($post->totalLiked === 0)
						    Be the first to <strong>like this</strong>
						  @else
						    <strong>{{$post->totalLiked}} likes</strong>
						  @endif
						</div>
						<div style = "padding:5px 10px">
							<a class = "account-link" href = "{{route('profile_page', ['account_name' => $post->username])}}"><strong>{{$post->username}}</strong></a> {{$post->caption}}
						</div>
						<div style = "padding:0px 10px" class = "text-secondary">
						  @if($post->totalComment > 0)
						    View all {{$post->totalComment}} comments
						  @endif
						</div>
						<div style = "padding:5px 10px">
							<a class = "account-link" href = ""><strong>{{$post->oneLastAccountComment}}</strong></a> {{$post->oneLastComment}}
						</div>
						<div style = "padding:5px 10px" class = "text-secondary">{{$post->when_its_uploaded}}</div>
						<div class = "comment-section-timeline">
							<form action = "{{route('save_comment', ['account_name' => session('account_username')])}}" method = "post" id = "commentForm">
								<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" />
								<input type = "hidden" name = "postingan_id" value = "{{$post->id}}" />
								<i class='far fa-smile' style='text-align:center; font-size:24px; width:10%;'></i>
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
		<div class = "fixed-sidebar-timeline right-home-timeline">
			<div style = "margin-top:10px;">
				@if(!empty($userData))
					<div class = "d-flex flex-row text-body" >
						<div style = "padding-right:10px;">
							<img style = "border-radius: 50%;" src = "{{session('account_img_path')}}" width = "45px" />
						</div>
						<div class = "d-flex flex-column">
							<div><strong>{{$userData->username}}</strong></div>
							<div class = "text-secondary" style = "font-size:14px;">{{$userData->full_name}}</div>
						</div>
						<div style = "width:100%;">
							<a href = "{{route('switch_account_page')}}"><span style = "float:right; font-weight:bold; font-size:12px;">Switch</span></a>
						</div>
					</div>

					<div class = "d-flex flex-row text-light justify-content-between" style = "padding:10px 0;" >
						<div class = "text-secondary" style = "font-size:15px;">
							<strong>Suggestions For You</strong>
						</div>
						<div style = "font-size:12px; color:black;"><strong>See All</strong></div>
					</div>

					@if(!empty($data))
						@foreach($suggestionData as $post)
							<div class = "d-flex flex-row text-body pb-1" >
								<div style = "width:10%;">
									<img style = "border-radius: 50%;" src = "{{$post->selfie_path}}" width = "27px" />
								</div>
								<div class = "d-flex flex-column" style = "padding-left:10px; width:70%;">
									<div><strong>{{$post->username}}</strong></div>
									<div class = "text-secondary" style = "font-size:14px;">{{$post->full_name}}</div>
								</div>
								<div style = "width:20%;">
									<a href = "#"><span style = "float:right; font-weight:bold; font-size:12px;">Follow</span></a>
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
	</script>

@endsection