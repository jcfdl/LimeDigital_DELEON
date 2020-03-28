<!-- Modal -->
<div class="modal fade" id="myImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

<script type="text/javascript">	
	tinymce.init({
	  selector: "textarea.tinymce",
	  plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker image',
	  toolbar: 'a11ycheck casechange checklist code formatpainter pageembed permanentpen table image',
	  toolbar_mode: 'floating',
	  height: 500,
	  images_upload_base_path: '{{ url('uploads') }}',
	  images_upload_url: '{{ route('admin.upload') }}',
		automatic_uploads: true,
		paste_data_images: false,
		powerpaste_block_drop: false,
		auto_focus: 'body',
		images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData, token;

			xhr = new XMLHttpRequest();
			token = document.querySelector('meta[name="csrf-token"]').content;
			xhr.withCredentials = false;
			xhr.open('POST', '{{ route('admin.upload') }}');
			xhr.setRequestHeader('X-CSRF-TOKEN', token);
			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.file_path != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.file_path);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
		},
		file_picker_callback: function(callback, value, meta) {
			if(meta.filetype == 'image') {
				var $_section = $('.load-data');
				$_section.empty();
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					method: 'post',
					url: '{{ route('admin.loadMedia') }}',
					dataType: 'html',
					success: function(data) {
						$_section.html(data);
						$('#myImages').modal('show');
					}
				})

				$('#myImages').on('click', '.use-media', function() {
					var $_file = $(this).attr('data-name');
					callback($_file, { title: $_file });
					$('#myImages').modal('hide');
				})
			}
		}
	});
</script>