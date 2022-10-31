<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Chico3001">

	<title>.: {{ $menu->header->title }} :.</title>
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</head>

<body class="layout-fixed sidebar-mini sidebar-collapse">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<div class="container-fluid">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
					@forelse ($menu->navbar as $item)
					<li class="nav-item d-none d-sm-inline-block">
						<a href="{{ $item->link }}" class="nav-link">{{ $item->name }}</a>
					</li>
					@empty
					@endforelse
					@if (Auth::user()->level > 200)
					@env('local')
					<li class="nav-item">
						<a class="nav-link"><span class="badge badge-primary">Sitio de Pruebas</span></a>
					</li>
					@endenv
					@env('staging', 'production')
					<li class="nav-item">
						<a class="nav-link"><span class="badge badge-danger">Sitio de Producción</span></a>
					</li>
					@endenv
					@endif
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="#" role="button">
							{{ Auth::user()->full_name }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="{{ route('home') }}" class="brand-link">
				<img src="{{ asset('img/logo_white.png') }}" alt="Teknia CDMX" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
			</a>

			<div class="sidebar">
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">{{ Auth::user()->full_name }}</a>
					</div>
				</div>

				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						@foreach ($menu->sidemenu as $item)
						<li class="nav-item">
							@if (isset($item->is_active))
							<a class="nav-link active" href="{{ $item->link }}">
								@else
								<a class="nav-link" href="{{ $item->link }}">
									@endif
									<i class="nav-icon fas {{ $item->icon }}"></i>
									<p>{{ $item->name }}</p>
								</a>
						</li>
						@endforeach
					</ul>
				</nav>
			</div>
		</aside>

		<div class="content-wrapper">
			<section class="content-header">
				@if (session('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					<p class="text-center mb-1">{{ session('error') }}</p>
				</div>
				@elseif(session('warning'))
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					<p class="text-center mb-1">{{ session('warning') }}</p>
				</div>
				@elseif(session('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					<p class="text-center mb-1">{{ session('success') }}</p>
				</div>
				@elseif(session('info'))
				<div class="alert alert-info alert-dismissible fade show" role="alert">
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					<p class="text-center mb-1">{{ session('info') }}</p>
				</div>
				@elseif(session('toastr-error'))
				<script>
					$(document).ready(function () {
						toastr.error("{{ session('toastr-error') }}");
					});
				</script>
				@elseif(session('toastr-warning'))
				<script>
					$(document).ready(function () {
						toastr.warning("{{ session('toastr-warning') }}");
					});
				</script>
				@elseif(session('toastr-success'))
				<script>
					$(document).ready(function () {
						toastr.success("{{ session('toastr-success') }}");
					});
				</script>
				@elseif(session('toastr-info'))
				<script>
					$(document).ready(function () {
						toastr.info("{{ session('toastr-info') }}");
					});
				</script>
				@endif

				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							@isset($menu->content_title)
							<h1>{{ $menu->content_title }}</h1>
							@endisset
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-end">
								@foreach ($menu->breadcrumbs as $item) @if ($loop->last)
								<li class="breadcrumb-item active">{{ $item->name }}</li>
								@else
								<li class="breadcrumb-item"><a href="{{ $item->link }}">{{ $item->name }}</a></li>
								@endif @endforeach
							</ol>
						</div>
					</div>
				</div>
			</section>

			<section class="content">
				@yield('content')
			</section>
		</div>
		<footer class="main-footer">
			<div class="float-end d-none d-sm-block">Versión {{ env('APP_VERSION', 0.1) }}</div>
			Copyright © 2021 <a href="https://miempresaenlanube.com">Mi empresa en la nube</a>
		</footer>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{ asset('js/common.js') }}"></script>

	@if (Auth::check())
	<script>
		var timeout = ({{ config('session.lifetime')}} * 60000) - 10;
		setTimeout(function () {
			window.location.reload(1);
		}, timeout);
	</script>
	@endif
</body>

</html>