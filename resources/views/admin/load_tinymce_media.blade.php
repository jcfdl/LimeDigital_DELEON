@if(count($medias) > 0)
	<div class="row">
		@foreach($medias AS $media)
			<div class="col-md-2 mb-1">
				<div class="media-wrapper">
					<img class="myImg" src="{{ $media->name }}" alt="{{ $media->name }}">
					<div class="media-name">
						{{ $media->name }}
					</div>
					<button class="btn btn-success delete-media use-media" data-id="{{ $media->id }}" data-name="{{ $media->name }}">
						<i class="fa fa-check"></i>
					</button>
				</div>
			</div>
		@endforeach
	</div>	
@else
	<p class="m-b-lg docs">No media found!</p>	
@endif