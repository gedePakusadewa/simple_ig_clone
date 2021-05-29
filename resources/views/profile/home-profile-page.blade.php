@extends('layout/layout-homebase')

@section('content')
	<div>
		<div class="d-flex bg-secondary mb-3">
			<div>
				<img style = "border-radius: 50%;" src = "{{session('account_img_path')}}" width = "180px" />
			</div>
			<div class="p-2 bg-warning w-75">
				<div class="d-flex mb-3">
					<div class="p-2 bg-info">{{session('account_username')}}</div>
					<div class="p-2 bg-warning">edit profile</div>
					<div class="p-2 bg-warning">setting</div>
				</div>
				<div class="d-flex mb-3">
					<div class="p-2 bg-info">{{$totalPost}} posts</div>
					<div class="p-2 bg-warning">{{$totalFollower}} followers</div>
					<div class="p-2 bg-warning">{{$totalFollowing}} following</div>
				</div>
				<div>Full name (not set yet)</div>
				<div>bio (not set yet)</div>
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
						<div class="card" style="width:300px">
							<div><h4>{{$post->username}}</h4></div>
							<img src = "{{asset('storage/'.$post->path_src)}}" width = "100" loading = "lazy" />
							<div>
								<a href = "{{route('add_liked_dta', [
									'account_name' => session('account_username'),
									'idPostingan' => $post->id
									])}}" class = "p-2">{{$post->totalliked}} like</a>
								<a href = "" class = "p-2">comment</a>
							</div>
							<div class="card-body"><p>{{$post->caption}}</p></div>
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
