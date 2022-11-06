@extends('back.layout')

@section('content')
<div class="row justify-content-around">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-purple">
			<div class="inner">
				<h3>{{ $total_users }}</h3>
				<p>Usuarios</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a href="{{route( 'users.index' )}}" class="small-box-footer">Ver Usuarios <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
@endsection