@extends('layout/layout-homebase')

@section('content')
	<div>
		@if(!empty($data))
			@foreach($data as $post)
				<div class="card mt-2" style="width:650px">
					<div><p><a href = "{{route('profile_page', ['account_name' => $post->username])}}"><strong>{{$post->username}}</strong></a></p></div>
					<img src = "{{asset('storage/'.$post->path_src)}}" width = "600"/>
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
@endsection