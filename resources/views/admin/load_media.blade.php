@if(count($medias) > 0)
	<div class="row">
		@foreach($medias AS $media)
			<div class="col-md-2 mb-1">
				<div class="media-wrapper">
					<img class="myImg" src="{{ $media->name }}" alt="{{ $media->name }}">
					<div class="media-name">
						{{ $media->name }}
					</div>
					<button class="btn btn-danger delete-media delete-item" data-page="deleteMedia" data-id="{{ $media->id }}">
						<i class="fa fa-trash"></i>
					</button>
				</div>
			</div>
		@endforeach
	</div>
	{!! $medias->render() !!}	
	<div id="zoomModal" class="modal">
	  <!-- The Close Button -->
	  <span class="close">&times;</span>

	  <!-- Modal Content (The Image) -->
	  <img class="modal-content" id="imgModal">

	  <!-- Modal Caption (Image Text) -->
	  <div id="caption"></div>
	</div>
	<script>
		var modal = document.getElementById("zoomModal");

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		// var img = document.getElementById("myImg");
		var modalImg = document.getElementById("imgModal");
		var captionText = document.getElementById("caption");
		// img.onclick = function(){
		//   modal.style.display = "block";
		//   modalImg.src = this.src;
		//   captionText.innerHTML = this.alt;
		// }

		$('body').on('click', '.myImg', function() {
			modal.style.display = "block";
		  modalImg.src = $(this).attr('src');
		  captionText.innerHTML = $(this).attr('alt');
		})

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}
	</script>
@else
	<p class="m-b-lg docs">No media found!</p>	
@endif