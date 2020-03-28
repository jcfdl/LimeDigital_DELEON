<!DOCTYPE html>
<html>
<head>
	@include('blocks.home_head')
</head>
<body id="app">	
	@include('blocks.home_header')
	<div class="container">		
		<div class="row">
			<div class="col-md-8">
				@yield('content')
			</div>
			<div class="col-md-4">
				@include('blocks.home_sidebar')
			</div>
		</div>
	</div>
	@include('blocks.home_footer')
	@yield('scripts')
</body>
</html>