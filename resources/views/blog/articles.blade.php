@extends('layouts.articles')
@section('content')
	<h1 class="mt-2">Articles</h1>
	<section class="load-data">
		@include('blog.load_articles')
	</section>	
@stop
@section('scripts')
	<script>
		$('body').on('click', '.pagination a', function (e) {
	    e.preventDefault();
	    var url = $(this).attr('href');
	    window.history.pushState("", "", url);
	    $.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	    	method: 'GET',
	      url: url
	    }).done(function (data) {
	      $('.load-data').html(data);
	    }).fail(function () {
	      console.log("Failed to load data!");
	    });
	  });
	</script>
@stop