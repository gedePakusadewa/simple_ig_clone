@extends('layout/layout-homebase')

@section('content')
	<div>
		@if(!empty($data))
			@foreach($data as $account)
				<div class="card" style="width:400px">
					<img src = "{{asset('storage/'.$account->path_src)}}" width = "100"/>
					<div class="card-body"><p>{{$account->caption}}</p></div>
				</div>
				<br />
			@endforeach
		@else
		<h3>Data is not set</h3>
		@endif
	</div>
@endsection
