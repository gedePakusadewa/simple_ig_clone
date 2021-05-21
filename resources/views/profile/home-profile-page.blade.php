@extends('layout/layout-homebase')

@section('content')
	<div>
		<h1>PROFILE {{session('account_username')}}</h1>

		<div> {{$totalPost}} posts</div>
		<div> {{$totalFollower}} followers</div>
		<div> {{$totalFollowing}} following</div>

		@if(!empty($dataPostingan))
			@foreach($dataPostingan as $post)
				<div class="card" style="width:400px">
					<div><h4>{{$post->username}}</h4></div>
					<img src = "{{asset('storage/'.$post->path_src)}}" width = "100"/>
					<div>
						<a href = "{{route('add_liked_dta', [
							'account_name' => session('account_username'),
							'idPostingan' => $post->id
							])}}" class = "p-2">{{$post->totalliked}} like</a>
						<a href = "" class = "p-2">comment</a>
					</div>
					<div class="card-body"><p>{{$post->caption}}</p></div>
				</div>
				<br />
			@endforeach
		@else
		<h3>Data is not set</h3>
		@endif
	</div>
@endsection
