function showIcon() {
	$('.load-icon').show();
}
function hideIcon() {
	$('.load-icon').fadeOut(1000);
}
$(function() {
	$('.load-icon').fadeOut('slow');
	var $section = $('#load-app');

	$('body').on('click', '.show-page', function(e) {
		e.preventDefault();
		var page = $(this).attr('data-page');
		showIcon();
		$section.empty();
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			url: '/administrator/' + page,
			dataType: 'html',
			success: function(data) {
				$section.html(data);
				hideIcon();
			}
		});
	});

	$('body').on('click', '.delete-item', function(e) {
		e.preventDefault();
		var page = $(this).attr('data-page');
		showIcon();
		$section.empty();
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			url: '/administrator/' + page,
			data: {id: $(this).attr('data-id')},
			dataType: 'html',
			success: function(data) {
				$section.empty();
				$section.html(data);
				hideIcon();
			}
		});
	});

	$('body').on('click', '.edit-item', function(e) {
		e.preventDefault();
		var page = $(this).attr('data-page');
		showIcon();
		$section.empty();
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			url: '/administrator/' + page,
			data: {id: $(this).attr('data-id')},
			dataType: 'html',
			success: function(data) {
				$section.html(data);
				hideIcon();
			}
		});
	});

	$('body').on('submit', '.form-page', function(e) {
		e.preventDefault();
		showIcon();		
		var formData = new FormData(this);
		$.ajax({
			method: 'POST',
			processData: false,
			contentType: false,
      cache: false,
			url: $(this).attr('action'),
			data: formData,
			success: function(data) {
				$section.empty();
				$section.html(data);
				hideIcon();
			}
		})
	});

	$('body').on('click', '.pagination a', function (e) {
    e.preventDefault();
    showIcon();
    var url = $(this).attr('href');
    // window.history.pushState("", "", url);
    $.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    	method: 'POST',
      url: url
    }).done(function (data) {
      $('.load-data').html(data);
			hideIcon();
    }).fail(function () {
      console.log("Failed to load data!");
    });
  });

  $('body').on('change', '.advsearch-select', function() {
  	var page = $(this).attr('data-page');
  	advsearch(page);
  })

  $('body').on('click', '.advsearch', function() {
  	var page = $(this).attr('data-page');
  	advsearch(page);
  })

  $('body').on('click', '.advsearch-clear', function() {
  	$('#search').val('');
  	$('#status').val('live');
  	var page = $(this).attr('data-page');
  	advsearch(page, clear = 1);
  })

  $('body').on('click', '.upload_media', function() {
  	$('#upload_media').toggle(100);
  })

	function advsearch(page, clear = null) {
		var search = $('#search').val();
		var status = $('#status').val();
		var data = {};
		data[page + '_search'] = search;
		data[page + '_status'] = status;
		data['clear'] = clear;
		showIcon();		
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'POST',
			data: data,
			url: '/administrator/' + page,
			success: function(data) {
      	$('.load-data').html(data);
      	hideIcon();
			}
		})
	}

	$('body').on('click', '.select-img', function() {
  	$('#upload_media').hide(100);
  	$('#upload_media').val('');

		var $_section = $('#selectImages .load-data');
		$_section.empty();
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			method: 'post',
			url: '/administrator/loadMedia',
			dataType: 'html',
			success: function(data) {
				$_section.html(data);
				$('#selectImages').modal('show');
			}
		})

		$('#selectImages').on('click', '.use-media', function() {
			var $_file = $(this).attr('data-name');
			var $_id = $(this).attr('data-id');

			$('#selected-img').val($_file);
			$('#selected-media').val($_id);
			$('#selectImages').modal('hide');
		})
	})

  $('body').on('click', '.clear-img', function() {
  	$('#upload_media').hide(100);
  	$('#upload_media').val('');
  	$('#selected-img').val('');
		$('#selected-media').val('');
  })

})