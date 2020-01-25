$(function(){

	$('body')

	.delegate('.jSortEditable', 'click', function(){
		if (!$('.jSortEditableSave', this).length) {
			var t = $(this).html();
			$(this).html('<div class="jSortEditableSave" data-sort="' + t + '"><input type="text" size="5" value="' + t + '"></div>');
			$('input', this).focus();
		}
	})

	.delegate('.jSortEditableSave input', 'blur', function(){
		var v = $(this).val();
		var el = $(this).closest('.jSortEditable');
		var sv = $(this).closest('.jSortEditableSave');
		var tr = $(this).closest('tr');

		if (isNaN(v) || v.length == 0) {
			v = $(sv).data('sort');
			$(this).closest('.jSortEditableSave').replaceWith( v );
			return ;
		}

		$(this).closest('.jSortEditableSave').replaceWith( v );

		var d = {};
		d.module = $(el).data('module');
		d.action = 'sort';
		d.id = $(el).data('id');
		d.sort = v;
		d.data_type = 'json';

		$.getJSON('gateway.php', d, function(r){
			for (var v in r.result) {
				$("#sort" + v).html( r.result[v] );
			}
		});

		var min = 0;
		var id = '';

		$('tr .jSortEditable').each(function(){
			if (parseInt($(this).html()) < v) {
				id = $(this).attr('id');
				min = parseInt($(this).html());
			}
		});

		if (id) {
			$('#' + id).closest('tr').after( tr );
		}
		else {
			$(tr).closest('table').find('tr').first().after( tr );
		}
	})

	.delegate('.jSortEditableSave input', 'keydown', function(e){
		if(e.which == 13) {
			$(this).blur();
		}

		if(e.which == 27) {
			$(this).val('');
			$(this).blur();
		}
	})

	;

});

