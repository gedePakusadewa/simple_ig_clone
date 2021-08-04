@extends('layout/layout-homebase')

@section('content')
	<div style = "margin-bottom:100px;">
		<div class="d-flex mb-3 pb-5" style = "border-bottom:1px solid black;">
			<div class = "ml-5">
				<img style = "border-radius: 50%;" src = "{{$accountData->selfie_path}}" width = "180px" />
			</div>
			<div class="p-2 pl-5" style = "">
				<div class="d-flex">
					<div class="p-2" style = "font-size:25px;">{{$accountData->username}}</div>
					<div class="p-2"><button style = "font-weight:bold;">edit profile</button></div>
					<div class="p-2"><i class="material-icons" style="font-size:36px">settings</i></div>
				</div>
				<div class="d-flex">
					<div class="p-2"><strong>{{$totalPost}}</strong> posts</div>
					<div class="p-2"><strong>{{$totalFollower}}</strong> followers</div>
					<div class="p-2"><strong>{{$totalFollowing}}</strong> following</div>
				</div>
				<div class="p-2"><strong>{{$accountData->full_name}}</strong></div>
			</div>
		</div>

		<div class = "d-flex justify-content-center">
			<div class = "p-2"><a href = "#posts">POSTS</a></div>
			<div class = "p-2"><a href = "#igtv">IGTV</a></div>
			<div class = "p-2"><a href = "#saved">SAVED</a></div>
			<div class = "p-2"><a href = "#tagged">TAGGED</a></div>
		</div>

		<div id = "posts" class = "d-block">
			<div class = "d-flex flex-wrap">
				@if(!empty($dataPostingan))
					@foreach($dataPostingan as $post)
						<div class="card" style = "width:300px; height:auto; margin:7px;">
							<img style = "object-fit:cover" src = "{{$post->path_src}}" width = "100%" loading = "lazy" />
						</div>
					@endforeach
				@else
					<h3>Data is not set</h3>
				@endif
			</div>
		</div>

		<div id = "igtv" class = "d-none">
			<div class = "d-flex flex-wrap">
				<h1>IGTV</h1>
			</div>
		</div>

		<div id = "saved" class = "d-none">
			<div class = "d-flex flex-wrap">
				<h1>SAVED</h1>
			</div>
		</div>

		<div id = "tagged" class = "d-none">
			<div class = "d-flex flex-wrap">
				<h1>TAGGED</h1>
			</div>
		</div>
	</div>
	<script>
		
	</script>
@endsection
