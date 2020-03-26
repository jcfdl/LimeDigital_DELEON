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
	});
</script>