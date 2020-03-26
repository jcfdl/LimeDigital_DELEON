<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Create New Page</h4>
	</div>
	<div class="col-md-12"> 
		<div class="widget p-lg">
			<div class="row"> 
				{!! Form::open(['route' => 'admin.create', 'method' => 'post', 'class'=>'form-page']) !!}
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i>
							Save
						</button>
						<a href="#" class="show-page btn btn-danger" data-page="all">
							<i class="fa fa-times"></i>
							Cancel
						</a>
					</div>
					<div class="col-md-12 mb-2">
						<label>Title:</label>
						{!! Form::text('title', null, ['class'=>'form-control', 'required']) !!}
					</div>
					<div class="col-md-8">
						{!! Form::textarea('body', null, ['class'=>'tinymce']) !!}
					</div>
					<div class="col-md-4">
						<label>Category:</label>
						{!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@include('includes/tinymce')