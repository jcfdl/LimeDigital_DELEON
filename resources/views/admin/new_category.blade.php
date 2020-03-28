<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Create New Category</h4>
	</div>
	<div class="col-md-12"> 
		<div class="widget p-lg">
			<div class="row"> 
				{!! Form::open(['route' => 'admin.createCategory', 'method' => 'post', 'class'=>'form-page']) !!}
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-check"></i>
							Save
						</button>
						<a href="#" class="show-page btn btn-danger" data-page="category">
							<i class="fa fa-times"></i>
							Cancel
						</a>
					</div>
					<div class="col-md-8">
						<label>Name:</label>
						{!! Form::text('name', null, ['class'=>'form-control mb-1', 'required', 'placeholder'=>'Category Name']) !!}
						<label>Description:</label>
						{!! Form::textarea('description', null, ['class'=>'form-control mb-1']) !!}
					</div>					
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>