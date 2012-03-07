jQuery(function($){

	$('#the-list')
		.find('td.plugin-title .row-actions-visible span.deactivate').each(function(i, o) {
			var a = $(this).find('a');
			var name = a.attr('href').match(/&plugin=([^&]*)/i);
			$(this).after('<span class=reload><a href=admin-ajax.php?action=plugin-reload&plugin='+name[1]+'>Reload</a> | </span>');
		});

});
