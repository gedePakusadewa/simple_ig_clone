@extends('layout/layout-homebase')

@section('content')
	<div class = "d-flex" style = "height:500px;">
        <div class = "w-25 border border-primary overflow-auto">
			@for($i = 0; $i < 100; $i++)
				<h3>Nama {{$i}}</h3>
				<p>Ulala</p>
			@endfor
		</div>
		<div class = "w-75 border border-warning overflow-auto">
			<h1>This is Empty</h1>
		</div>
	</div>
@endsection
