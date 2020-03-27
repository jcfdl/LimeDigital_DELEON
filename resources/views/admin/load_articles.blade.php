@if(count($articles) > 0)
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Category</th>
				<th>Views</th>
				<th><i class="zmdi zmdi-settings zmdi-hc-fw"></i></th>
			</tr>
		</thead>
		<tbody>
			@foreach($articles AS $article)
				<tr>
					<td>
						@if($article->trashed())
							<span class="badge badge-danger"><i class="fa fa-times"></i></span>
						@endif
						{{ $article->id }}
					</td>
					<td>
						@if($article->trashed())
							{{ $article->title }}
						@else
							<a href="#" class="edit-item" data-page="edit" data-id="{{ $article->id }}">
								{{ $article->title }}
							</a>
						@endif
					</td>
					<td>
						@if($article->trashed())
							{{ $article->category->name }}
						@else
							<a href="#" class="show-category" data-page="category" data-id="{{ $article->category->id }}">
								{{ $article->category->name }}
							</a>
						@endif
					</td>
					<td>{{ $article->views }}</td>
					<td>
						@if($article->trashed())
							<a href="#" type="button" class="btn btn-success edit-item" data-page="restore" data-id="{{ $article->id }}">
								<i class="fa fa-check"></i>
							</a>
							<a href="#" type="button" class="btn btn-danger delete-item" data-page="permaDeleteArticle" data-id="{{ $article->id }}" onclick="return confirm('Are you sure you want to delete this article? Confirming will permanently delete this article!') ">
								<i class="zmdi zmdi-delete zmdi-hc-fw"></i>						
							</a>
						@else
							<a href="#" type="button" class="btn btn-success edit-item" data-page="edit" data-id="{{ $article->id }}">
								<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
							</a>
							<a href="#" type="button" class="btn btn-danger delete-item" data-page="deleteArticle" data-id="{{ $article->id }}" onclick="return confirm('Are you sure you want to delete this article? Confirming will move this article to trash!') ">
								<i class="zmdi zmdi-delete zmdi-hc-fw"></i>						
							</a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $articles->render() !!}
@else
	<p class="m-b-lg docs">No articles found!</p>
@endif