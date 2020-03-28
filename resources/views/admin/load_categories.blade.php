@if(count($categories) > 0)
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Category</th>
				<th><i class="zmdi zmdi-settings zmdi-hc-fw"></i></th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories AS $category)
				<tr>
					<td>
						@if($category->trashed())
							<span class="badge badge-danger"><i class="fa fa-times"></i></span>
						@endif
						{{ $category->id }}
					</td>
					<td>
						@if($category->trashed())
							{{ $category->name }}
						@else
							<a href="#" class="edit-item" data-page="editCategory" data-id="{{ $category->id }}">
								{{ $category->name }}
							</a>
						@endif
					</td>
					<td>
						@if($category->trashed())
							<a href="#" type="button" class="btn btn-success edit-item" data-page="restoreCategory" data-id="{{ $category->id }}">
								<i class="fa fa-check"></i>
							</a>
							<a href="#" type="button" class="btn btn-danger delete-item" data-page="permaDeleteCategory" data-id="{{ $category->id }}" onclick="return confirm('Are you sure you want to delete this category? Confirming will permanently delete this category!') ">
								<i class="zmdi zmdi-delete zmdi-hc-fw"></i>						
							</a>
						@else
							<a href="#" type="button" class="btn btn-success edit-item" data-page="editCategory" data-id="{{ $category->id }}">
								<i class="zmdi zmdi-edit zmdi-hc-fw"></i>
							</a>
							<a href="#" type="button" class="btn btn-danger delete-item" data-page="deleteCategory" data-id="{{ $category->id }}" onclick="return confirm('Are you sure you want to delete this category? Confirming will move this category to trash!') ">
								<i class="zmdi zmdi-delete zmdi-hc-fw"></i>						
							</a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{!! $categories->render() !!}
@else
	<p class="m-b-lg docs">No categories found!</p>
@endif