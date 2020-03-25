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
				<td>{{ $article->id }}</td>
				<td>
					<a href="#" class="show-article" data-page="article" data-id="{{ $article->id }}">
						{{ $article->title }}
					</a>
				</td>
				<td>
					<a href="#" class="show-category" data-page="category" data-id="{{ $article->category->id }}">
						{{ $article->category }}
					</a>
				</td>
				<td>{{ $article->views }}</td>
				<td>
					<a href="#" type="button" class="btn btn-success show-page" data-page="article" data-id="{{ $article->id }}">
						<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
					</a>
					<a href="#" type="button" class="btn btn-danger delete-page" data-page="article" data-id="{{ $article->id }}" onclick="return confirm('Are you sure you want to delete this article? Confirming will move this article to trash!') ">
						<i class="zmdi zmdi-delete zmdi-hc-fw"></i>						
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $articles->render() !!}