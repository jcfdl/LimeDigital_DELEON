<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Edit Page: {{ $article->title }}</h4>
	</div>
	<div class="col-md-12"> 
		<div class="widget p-lg">
			<div class="row"> 
				@if(Session::has('article_updated'))
					<div class="alert alert-success" role="alert">
						<strong>Success!</strong> {{session('article_updated')}}
					</div>
				@endif
				{!! Form::model($article, ['route' => 'admin.edit', 'method' => 'post', 'class'=>'form-page']) !!}
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
						{!! Form::select('category_id', $categories, null, ['class'=>'form-control mb-1']) !!}
						<label>Status:</label>
						{!! Form::select('status', ['1'=>'Live','0'=>'Trashed'], null, ['class'=>'form-control mb-1']) !!}						
						<label>Created By:</label>
						{!! Form::text('', $article->user->name, ['class'=>'form-control mb-1', 'disabled']) !!}
						<label>Modified By:</label>
						{!! Form::text('', $article->updatedBy ? $article->updatedBy->name : '', ['class'=>'form-control mb-1', 'disabled']) !!}
						<label>Views:</label>
						{!! Form::text('', $article->views, ['class'=>'form-control mb-1', 'disabled']) !!}
						{!! Form::hidden('id', $article->id) !!}
						{!! Form::hidden('update', $article->id) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@include('includes/tinymce')