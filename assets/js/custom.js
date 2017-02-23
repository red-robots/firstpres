/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Smooth Scroll to Anchor
	*
	------------------------------------*/
	/* $('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	    return false;
	});
	*/

	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

	$('button.menu-toggle').click(function(){
	    var $primary_menu = $('#primary-menu');
	    var $sub_menu = $('#sub-menu');
	    if($primary_menu.hasClass('toggled')){
            $primary_menu.removeClass('toggled');
            $sub_menu.removeClass('toggled');
        } else {
            $primary_menu.addClass('toggled');
            $sub_menu.addClass('toggled');
        }
    });

	$('a.staff-popup').click(function(e) {
	    e.preventDefault();
        $.colorbox({
            className: "staff-popup",
            inline: true,
            href: this.hash,
            width: '90%',
            maxWidth: '960px',
            close: '<i class="fa fa-close"></i>',
        });
    });
	$(window).on('resize',function(){
	    var width = window.innerWidth*0.9 > 960 ? '960px': '90%';
	    $.colorbox.resize({
	        width: width,
        });
    })
});// END #####################################    END