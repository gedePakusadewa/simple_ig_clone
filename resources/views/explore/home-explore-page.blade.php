@extends('layout/layout-homebase')

@section('content')
	<div>
		<div class = "d-flex flex-wrap">
			@if(!empty($exploreData))
				@foreach($exploreData as $post)
					<div class="card" style = "width:300px; height:auto; margin:7px;">
						<img style = "object-fit:cover" src = "{{$post->path_src}}" width = "100%" loading = "lazy" />
					</div>
				@endforeach
			@else
				<h3>Data is not set</h3>
			@endif
		</div>
	</div>
@endsection
