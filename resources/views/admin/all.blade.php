@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h4 class="m-b-lg">All Pages</h4>
		</div>
		<div class="col-md-12">
			<div class="widget p-lg"> 
				<a href="#" class="btn btn-success">
					<i class="zmdi zmdi-plus zmdi-hc-fw"></i>
					Add New
				</a>
				@if(count($articles) > 0)
					@include('load_articles.blade.php')
				@else
					<p class="m-b-lg docs">No articles found!</p>					
				@endif
			</div>
		</div>
	</div>
@stop