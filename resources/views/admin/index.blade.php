@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
					<h3 class="widget-title">Welcome to Infinity</h3>
					<small class="text-color">Number of views</small>
				</div>
				<span class="pull-right fz-lg fw-500 counter" data-plugin="counterUp">{{ $view_count->count }}</span>
			</div><!-- .widget -->
		</div>

		<div class="col-md-6 col-sm-6">
			<div class="widget p-md clearfix">
				<div class="pull-left">
					<h3 class="widget-title">Active</h3>
					<small class="text-color">Articles</small>
				</div>
				<span class="pull-right fz-lg fw-500 counter" data-plugin="counterUp">{{ $active_count->count }}</span>
			</div><!-- .widget -->
		</div>
	</div><!-- .row -->

	<div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp">{{ $article_count->count }}</span></h3>
						<small class="text-color">Total Articles</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
				</div>
				<footer class="widget-footer bg-primary">
					<small>% charge</small>
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
				</footer>
			</div><!-- .widget -->
		</div>

		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp">{{ $category_count->count }}</span></h3>
						<small class="text-color">Total Categories</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
				</div>
				<footer class="widget-footer bg-danger">
					<small>% charge</small>
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
				</footer>
			</div><!-- .widget -->
		</div>

		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp">{{ $media_count->count }}</span></h3>
						<small class="text-color">Total Media</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
				</div>
				<footer class="widget-footer bg-success">
					<small>% charge</small>
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
				</footer>
			</div><!-- .widget -->
		</div>

		<div class="col-md-3 col-sm-6">
			<div class="widget stats-widget">
				<div class="widget-body clearfix">
					<div class="pull-left">
						<h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp">{{ $user_count->count }}</span></h3>
						<small class="text-color">Total Users</small>
					</div>
					<span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
				</div>
				<footer class="widget-footer bg-warning">
					<small>% charge</small>
					<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
				</footer>
			</div><!-- .widget -->
		</div>
	</div><!-- .row -->

	<div class="row">
		<div class="col-md-12">
			<div class="widget p-lg">
				<h3 class="widget-title">Articles</h3>
				<section class="load-data">
					@include('admin.load_articles')
				</section>		
			</div>		
		</div>
	</div>
@stop