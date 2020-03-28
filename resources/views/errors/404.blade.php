<!DOCTYPE html>
<html>
<head>
	@include('blocks.head')
</head>
<body id="app" class="simple-page">
	<div id="back-to-home">
		<a href="{{ route('admin.home') }}" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			<a href="{{ route('admin.home') }}">
				<span><i class="fa fa-gg"></i></span>
				<span>Infinity</span>
			</a>
		</div><!-- logo -->
		<h1 id="_404_title" class="animated shake">404</h1>
		<h5 id="_404_msg" class="animated slideInUp">Oops, an error occur. The page can't be found</h5>
		<div id="_404_form" class="animated slideInUp">
			<form action="#">
				<div class="input-group">
					<input type="search" class="form-control" placeholder="search">
					<div class="input-group-addon"><i class="fa fa-search"></i></div>
				</div>
			</form>
		</div>
	</div><!-- .simple-page-wrap -->
	@include('blocks.footer')
</body>
</html>