/*
 * ==== This is your JS code for your WHOLE app/website ====
 *
 * >> Note <<
 * Do not put individual pages' JS here. Use the pages/ folder for that purpose
 * We don't want unnecessary code in our webpages, right? 
 */

(function ($) {

	/* Menú movil */
	$(".menu-principal>ul").clone().prependTo("#off-canvas .menu-movil");
	$(document).trigger("enhance");


	var waypoints = $('.waypoint-marker').waypoint(function(direction) {
		if (direction==='down') {
			$('header').addClass('sticky')
		} else {
			$('header').removeClass('sticky');
		}	
	}, {
		offset: '-150px'
	})

	$('.btn').hover(
		function () {
			$(this).parent().addClass('animatedParent animateOnce');
			$(this).addClass('animated pulse go');
		},
		function () {
			$(this).parent().removeClass('animatedParent animateOnce');
			$(this).removeClass('animated pulse');
		}
	);

	$('[data-fancybox]').fancybox({
		animationEffect : "zoom"
	});

})(jQuery);