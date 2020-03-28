<div class="row">
	<div class="col-md-12">
		<h4 class="m-b-lg">All Categories</h4>
	</div>
	<div class="col-md-12">
		<div class="widget p-lg">
			<div class="row"> 
				@if(Session::has('category_created'))
					<div class="alert alert-success" role="alert">
						<strong>Success!</strong> {{session('category_created')}}
					</div>
				@elseif(Session::has('category_trashed'))
					<div class="alert alert-info" role="alert">
						<strong>Warning!</strong> {{session('category_trashed')}}
					</div>
				@elseif(Session::has('category_restored'))
					<div class="alert alert-success" role="alert">
						<strong>Success!</strong> {{session('category_restored')}}
					</div>
				@elseif(Session::has('category_delete'))
					<div class="alert alert-danger" role="alert">
						<strong>Warning!</strong> {{session('category_delete')}}
					</div>
				@elseif(Session::has('category_fail'))
					<div class="alert alert-danger" role="alert">
						<strong>Warning!</strong> {{session('category_fail')}}
					</div>
				@endif
				<div class="col-md-12 mb-2">
					<a href="#" class="btn btn-success show-page" data-page="newCategory">
						<i class="zmdi zmdi-plus zmdi-hc-fw"></i>
						Add New
					</a>
				</div>
				<div class="col-md-4 mb-2">
					<div class="input-group">
						{!! Form::text(null, session('category_search'), ['id'=>'search', 'class'=>'form-control', 'placeholder'=>'Search...']) !!}
						<span class="input-group-btn">
			        <button class="btn btn-success advsearch" type="button" data-page="category"><i class="fa fa-search"></i></button>			        
			        <button class="btn btn-dark advsearch-clear" data-page="category" type="button"><i class="fa fa-times"></i></button>
			      </span>
					</div>
				</div>
				<div class="col-md-2 mb-2">					
					{!! Form::select(null, ['live'=>'Live','trashed'=>'Trashed'], session('category_status'), ['class'=>'form-control advsearch-select', 'data-page'=>'category', 'id'=>'status']) !!}
				</div>
				<div class="col-md-12">
					<section class="load-data">
						@include('admin.load_categories')
					</section>				
				</div>
			</div>
		</div>
	</div>
</div>