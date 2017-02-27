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
    });
    if ($('.wrapper.main-menu').length > 0) {
        $html = $('html');
        $main_menu = $('.wrapper.main-menu');
        $main_menu_parent = $main_menu.parent();
        $sub_menu = $('.wrapper.sub-menu');
        $sub_menu_parent = $sub_menu.parent();
        $window = $(window);
        $window.on('scroll', check);
        $window.on('resize', check);
        check();
        function check() {
            $anchor = $main_menu_parent.offset().top;
            html_margin = $html.length ? parseFloat($html.css('marginTop')) : 0;
            if ($anchor <= $window.scrollTop() + html_margin && window.innerWidth > 600) {
                $main_menu.css({
                    position: "fixed",
                    top: html_margin+"px",
                    left: "0",
                    width: "100%",
                    padding: "10px 10%",
                    backgroundColor: "white",
                    margin: "0",
                    zIndex: 3
                });
                main_menu_height = parseFloat($main_menu.outerHeight());
                $main_menu_parent.css({
                    "height": main_menu_height+"px"
                });
                $sub_menu.css({
                    position: "fixed",
                    top: html_margin+main_menu_height+"px",
                    left: "0",
                    width: "100%",
                    padding: "10px 10%",
                    backgroundColor: "#05264d",
                    margin: "0",
                    zIndex: 3
                });
                $sub_menu_parent.css({
                    "height": $sub_menu.outerHeight()
                });
            }
            if ($anchor > $window.scrollTop() + html_margin || window.innerWidth < 600) {
                $main_menu.css({
                    position: "",
                    top: "",
                    left: "",
                    width: "",
                    padding: "",
                    backgroundColor: "",
                    margin: "",
                    zIndex: ""
                });
                $main_menu_parent.css({
                    height: ""
                });
                $sub_menu.css({
                    position: "",
                    top: "",
                    left: "",
                    width: "",
                    padding: "",
                    backgroundColor: "",
                    margin: "",
                    zIndex: ""
                });
                $sub_menu_parent.css({
                    height: ""
                });
            }
        }
    }
});// END #####################################    END