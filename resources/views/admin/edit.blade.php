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
						<a href="#" class="edit-item btn btn-info" data-page="show" data-id="{{ $article->id }}">
							<i class="fa fa-eye"></i>
							Show
						</a>						
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
						<label>Intro Image:</label>
						<div class="input-group mb-1">
							{!! Form::text(null, $article->media ? $article->media->name : '', ['id'=>'selected-img','class'=>'form-control', 'placeholder'=>'Intro Image']) !!}
							{!! Form::hidden('media_id', null, ['id'=>'selected-media']) !!}
							<span class="input-group-btn">
				        <button class="btn btn-success upload_media" type="button" data-page="all"><i class="fa fa-upload"></i></button>	
				        <button class="btn btn-info select-img" type="button" data-page="all"><i class="fa fa-file-image-o"></i></button>		        
				        <button class="btn btn-dark clear-img" data-page="all" type="button"><i class="fa fa-times"></i></button>
				      </span>
						</div>
						{!! Form::file('media', ['id'=>'upload_media','class'=>'form-control mb-1', 'style'=>'display:none']) !!}
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
<div class="modal fade" id="selectImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select uploaded image</h4>
      </div>
      <div class="modal-body">
      	<div class="load-data">

      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@include('includes/tinymce')