<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Chico3001">

	<title>.: {{ env('APP_NAME', "") }} :.</title>
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon.png') }}">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/site.css') }}">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body class="">
	<div class="col-lg-8 mx-auto p-4 py-md-5">
		<header class="d-flex align-items-center pb-3 mb-5 border-bottom">
			<a href="/" class="d-flex align-items-center text-dark text-decoration-none">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img">
					<title>Bootstrap</title>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path>
				</svg>
				<span class="fs-4">Starter template</span>
			</a>
		</header>

		<main>
			<h1>Get started with Bootstrap</h1>
			<p class="fs-5 col-md-8">Quickly and easily get started with Bootstrap's compiled, production-ready files with this barebones example featuring some basic HTML and helpful links. Download all our examples to get started.</p>

			<div class="mb-5">
				<a href="/docs/5.2/examples/" class="btn btn-primary btn-lg px-4">Download examples</a>
			</div>

			<hr class="col-3 col-md-2 mb-5">

			<div class="row g-5">
				<div class="col-md-6">
					<h2>Starter projects</h2>
					<p>Ready to beyond the starter template? Check out these open source projects that you can quickly duplicate to a new GitHub repository.</p>
					<ul class="icon-list ps-0">
						<li class="d-flex align-items-start mb-1"><a href="https://github.com/twbs/bootstrap-npm-starter" rel="noopener" target="_blank">Bootstrap npm starter</a></li>
						<li class="text-muted d-flex align-items-start mb-1">Bootstrap Parcel starter (coming soon!)</li>
					</ul>
				</div>

				<div class="col-md-6">
					<h2>Guides</h2>
					<p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
					<ul class="icon-list ps-0">
						<li class="d-flex align-items-start mb-1"><a href="/docs/5.2/getting-started/introduction/">Bootstrap quick start guide</a></li>
						<li class="d-flex align-items-start mb-1"><a href="/docs/5.2/getting-started/webpack/">Bootstrap Webpack guide</a></li>
						<li class="d-flex align-items-start mb-1"><a href="/docs/5.2/getting-started/parcel/">Bootstrap Parcel guide</a></li>
						<li class="d-flex align-items-start mb-1"><a href="/docs/5.2/getting-started/vite/">Bootstrap Vite guide</a></li>
						<li class="d-flex align-items-start mb-1"><a href="/docs/5.2/getting-started/contribute/">Contributing to Bootstrap</a></li>
					</ul>
				</div>
			</div>
		</main>
		<footer class="pt-5 my-5 text-muted border-top">
			Created by the Bootstrap team &middot; &copy; 2022
		</footer>
	</div>
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