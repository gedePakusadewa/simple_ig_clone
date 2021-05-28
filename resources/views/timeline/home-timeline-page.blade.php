@extends('layout/layout-homebase')

@section('content')

	<div id = "result">
		update here<br />
	</div>
	<div class = "d-flex flex-row bg-secondary">
		<div style = "width:70%;">
			@if(!empty($data))
				@foreach($data as $post)
					<div class="card mt-2" style="width:620px">
						<div><p><a href = "{{route('profile_page', ['account_name' => $post->username])}}"><strong>{{$post->username}}</strong></a></p></div>
						<img src = "{{asset('storage/'.$post->path_src)}}" width = "600" loading = "lazy" />
						<div>
							<a href = "{{route('add_liked_dta', [
								'account_name' => session('account_username'),
								'idPostingan' => $post->id
								])}}" class = "p-2">like</a>
							<a href = "" class = "p-2">comment</a>
						</div>
						<div class="card-body"><p><a href = "{{route('profile_page', ['account_name' => $post->username])}}"><strong>{{$post->username}}</strong></a> {{$post->caption}}</p></div>
						<div>{{$post->when_its_uploaded}}</div>
					</div>
					<br />
				@endforeach
			@else
				<h3>Data is not set</h3>
			@endif
		</div>
		<div style = "width:30%;" class = "fixed-sidebar-timeline">
			<div>
				@if(!empty($userData))
					<div class = "d-flex flex-row text-light">
						<div>
							<h5>ISINYA GAMBAR</h5>
						</div>
						<div class = "d-flex flex-column">
							<div>
								{{$userData->username}}
							</div>
							<div>
								{{$userData->full_name}}
							</div>
						</div>
					</div>
				@else
					<h1>Something wrong here</h1>
				@endif
			</div>
			<div>
				<h1>Make some suggestion account here</h1>
			</div>
		</div>
	</div>
@endsection