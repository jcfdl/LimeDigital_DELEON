<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Edit Category: {{ $category->name }}</h4>
	</div>
	<div class="col-md-12"> 
		<div class="widget p-lg">
			<div class="row"> 
				@if(Session::has('category_updated'))
					<div class="alert alert-success" role="alert">
						<strong>Success!</strong> {{session('category_updated')}}
					</div>
				@endif
				{!! Form::model($category, ['route' => 'admin.editCategory', 'method' => 'post', 'class'=>'form-page']) !!}
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
					<div class="col-md-4">	
						<label>Status:</label>
						{!! Form::select('status', ['1'=>'Live','0'=>'Trashed'], null, ['class'=>'form-control mb-1']) !!}	
						<label>Created By:</label>
						{!! Form::text('', $category->user->name, ['class'=>'form-control mb-1', 'disabled']) !!}
						<label>Modified By:</label>
						{!! Form::text('', $category->updatedBy ? $category->updatedBy->name : '', ['class'=>'form-control mb-1', 'disabled']) !!}
						{!! Form::hidden('id', $category->id) !!}
						{!! Form::hidden('update', $category->id) !!}
					</div>				
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>