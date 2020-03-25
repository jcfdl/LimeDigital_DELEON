<!DOCTYPE html>
<html>
<head>
	@include('blocks.head')
</head>
<body id="app" class="menubar-left menubar-unfold menubar-light theme-primary">
	@include('blocks.header')	
	<main id="app-main" class="app-main">
		<div class="wrap">
			<section class="app-content">
				@yield('content')				
			</section>
		</div>
	</main>
	@include('blocks.footer')
	@yield('scripts')
</body>
</html>