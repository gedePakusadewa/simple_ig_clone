@extends('layout/layout-homebase')

@section('content')
	<div>
		<h1>XPLORE</h1>
	</div>
	<div>
		@if(!empty($searchResult))
			@foreach($searchResult as $data)
				<div>
					<p>{{$data->username}}</p>
				</div><br />
			@endforeach
		@else
			<p>SEARCH NAME FIRST</p>
		@endif
	</div>
@endsection
