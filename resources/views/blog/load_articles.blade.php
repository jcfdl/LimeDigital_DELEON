@if(count($articles) > 0)
	@foreach($articles AS $article)
		<div class="blog-post my-3">
			<h2>{{ $article->title }}</h2>			
			<p>{{ $article->created_at }} by {{ $article->user->name }}</p>
			<hr>
			<img src="{{ $article->media ? $article->media->name : 'http://placehold.it/900x300' }}" class="img-fluid">
			{!! $article->readMore() !!}
			<a class="btn btn-primary" href="{{ route('blog.show', $article->id) }}">Read more...</a>
		</div>
	@endforeach
	{{ $articles->render() }}
@else
	<h2>No articles!</h2>
@endif