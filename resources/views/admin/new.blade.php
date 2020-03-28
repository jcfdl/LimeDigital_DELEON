<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Create New Page</h4>
	</div>
	<div class="col-md-12"> 
		<div class="widget p-lg">
			<div class="row"> 
				{!! Form::open(['route' => 'admin.create', 'method' => 'post', 'class'=>'form-page', 'files'=>true]) !!}
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
						<label>Intro Image:</label>
						<div class="input-group mb-1">
							{!! Form::text(null, null, ['id'=>'selected-img','class'=>'form-control', 'placeholder'=>'Intro Image']) !!}
							{!! Form::hidden('media_id', null, ['id'=>'selected-media']) !!}
							<span class="input-group-btn">
				        <button class="btn btn-success upload_media" type="button" data-page="all"><i class="fa fa-upload"></i></button>	
				        <button class="btn btn-info select-img" type="button" data-page="all"><i class="fa fa-file-image-o"></i></button>		        
				        <button class="btn btn-dark clear-img" data-page="all" type="button"><i class="fa fa-times"></i></button>
				      </span>
						</div>
						{!! Form::file('media', ['id'=>'upload_media','class'=>'form-control mb-1', 'style'=>'display:none']) !!}
						<label>Category:</label>
						{!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
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