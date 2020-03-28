<!DOCTYPE html>
<html>
<head>
	@include('blocks.home_head')
</head>
<body id="app">	
	@include('blocks.home_header')
	<div class="container">
		<div class="jumbotron jumbotron-fluid mt-4">
			<div class="container">
			  <h1 class="display-4">{{ ucfirst($latest_article->title) }}</h1>
			  {!! ucfirst($latest_article->readMore()) !!}
			  <hr class="my-4">
			  <div class="mb-2">Latest article for you to read!</div>
			  <div class="lead">
			    <a class="btn btn-primary btn-lg" href="{{ route('blog.show', $latest_article->id) }}" role="button">Read more</a>
			  </div>
			 </div>
		</div>
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
</body>
</html>