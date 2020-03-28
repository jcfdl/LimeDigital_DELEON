@extends('layouts.articles')
@section('content')
	<h1 class="mt-2">{{ $article->title }}</h1>
	<p>{{ $article->created_at }} by {{ $article->user->name }}</p>
	<hr>
	<img src="{{ $article->media ? $article->media->name : 'http://placehold.it/900x300' }}" class="img-fluid">
	{!! $article->body !!}	
@stop
