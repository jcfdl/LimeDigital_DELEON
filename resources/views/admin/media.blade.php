<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">Media Files</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<div class="row">
				@if(Session::has('media_uploaded'))
					<div class="alert alert-success" role="alert">
						<strong>Success!</strong> {{session('media_uploaded')}}
					</div>
				@elseif(Session::has('media_fail'))
					<div class="alert alert-danger" role="alert">
						<strong>Warning!</strong> {{session('media_fail')}}
					</div>
				@elseif(Session::has('media_deleted'))
					<div class="alert alert-danger" role="alert">
						<strong>Warning!</strong> {{session('media_deleted')}}
					</div>
				@endif
				<div class="col-md-12 mb-1">
					<button class="btn btn-success upload_media mb-1">
						<i class="zmdi zmdi-plus zmdi-hc-fw"></i>
						Upload Media
					</button>
					<div id="upload_media" class="row" style="display: none">
						<div class="col-md-4">
							{!! Form::open(['method'=>'post', 'route'=>'admin.uploadMedia', 'class'=>'form-page', 'files'=>true]) !!}
								<div class="input-group">
									{!! Form::file('media', ['class'=>'form-control', 'placeholder'=>'Put your file here']) !!}
									<span class="input-group-btn">
						        <button class="btn btn-success" type="submit">Upload</button>			        
						      </span>
								</div>
							{!! Form::close() !!}
						</div>
					</div>					
				</div>
				<div class="col-md-4 mb-2">
					<div class="input-group">
						{!! Form::text(null, session('media_search'), ['id'=>'search', 'class'=>'form-control', 'placeholder'=>'Search...']) !!}
						<span class="input-group-btn">
			        <button class="btn btn-success advsearch" type="button" data-page="media"><i class="fa fa-search"></i></button>			        
			        <button class="btn btn-dark advsearch-clear" data-page="media" type="button"><i class="fa fa-times"></i></button>
			      </span>
					</div>
				</div>
				<div class="col-md-12">
					<section class="load-data">
						@include('admin.load_media')
					</section>				
				</div>
			</div>
		</div>
	</div>
</div>