<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Article: {{ $article->id }}</h4>
	</div>
	<div class="col-md-12"> 
		<div class="widget p-lg">
			<div class="row"> 
				<div class="col-md-12 text-right">
					<a href="#" class="edit-item btn btn-danger" data-page="edit" data-id="{{ $article->id }}">
						<i class="fa fa-times"></i>
						Cancel
					</a>	
				</div>
				<h1>{{ $article->title }}</h1>
				<div class="article-description">
					<p><small><i class="fa fa-book"></i> Category: {{ $article->category->name }}</small></p>
					<p><small><i class="fa fa-user"></i> Created By: {{ $article->user->name }}</small></p>
					<p><small><i class="fa fa-eye"></i> Views: {{ $article->views }}</small></p>			
					<p><small><i class="fa fa-calendar"></i> Created At: {{ $article->created_at }}</small></p>			
				</div>
				<hr />
				{!! $article->body !!}
			</div>
		</div>
	</div>
</div>