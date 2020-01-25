var header_visible = false;

$(function(){




	$('.menu-toggle').click(function(){
		$('ul.menu').slideToggle('slow');
		return false;
	});

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 767.98 && $('ul.menu').is(':hidden')) {
            $('ul.menu').removeAttr('style');
        }
    });

	$(".jPhoneMask").mask("+9(999)999-99-99");

	$('.jSearch').click(function(){
		$('.jSearchForm').addClass('opened');
		$('.jSearchForm input').focus();
	});
	
	$('.close-button').click(function(){
		$('.jSearchForm').removeClass('opened');
	});
	
	jQuery('.standard-wrapper').pajinate({
        item_container_id : '.standard-list',
        nav_panel_id: '.paginator',
		items_per_page: 4,
        nav_label_first : '<<',
        nav_label_prev : '<',
        nav_label_next : '>',
        nav_label_last : '>>'
    });


});

