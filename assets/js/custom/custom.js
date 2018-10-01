/**
 *    Custom jQuery Scripts
 *
 *    Developed by: Austin Crane
 *    Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {

    /*
     *
     *	Current Page Active
     *
     ------------------------------------*/
    $("[href]").each(function () {
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
        rel: 'gal',
        width: '80%',
        height: '80%'
    });

    /*
     *
     *	Isotope with Images Loaded
     *
     ------------------------------------*/
    var $container = $('#container').imagesLoaded(function () {
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

    $('button.menu-toggle').click(function () {
        var $primary_menu = $('#primary-menu');
        var $sub_menu = $('#sub-menu');
        if ($primary_menu.hasClass('toggled')) {
            $primary_menu.removeClass('toggled');
            $sub_menu.removeClass('toggled');
        } else {
            $primary_menu.addClass('toggled');
            $sub_menu.addClass('toggled');
        }
    });

    $('a.staff-popup').click(function (e) {
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
    $(window).on('resize', function () {
        var width = window.innerWidth * 0.9 > 960 ? '960px' : '90%';
        $.colorbox.resize({
            width: width,
        });
    });
    $('#hamburger >.wrapper > i').click(function () {
        var $hamburger = $('#hamburger');
        if ($hamburger.hasClass('toggled')) {
            $hamburger.removeClass('toggled');
        } else {
            $hamburger.addClass('toggled');
        }
    });
    if ($('.wrapper.main-menu').length > 0) {
        var $html = $('html');
        var $main_menu = $('.wrapper.main-menu');
        var $main_menu_parent = $main_menu.parent();
        var $sub_menu = $('.wrapper.sub-menu');
        var $sub_menu_parent = $sub_menu.parent();
        var $hamburger = $('#hamburger');
        var $window = $(window);
        $window.on('scroll', check);
        $window.on('resize', check);
        check();
        function check() {
            var $anchor = $main_menu_parent.offset().top;
            var html_margin = $html.length ? parseFloat($html.css('marginTop')) : 0;
            if ($anchor <= $window.scrollTop() + html_margin && window.innerWidth >= 600) {
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
                var main_menu_height = parseFloat($main_menu.outerHeight());
                $main_menu_parent.css({
                    height: main_menu_height + "px"
                });
                $sub_menu.css({
                    position: "fixed",
                    top: html_margin + main_menu_height + "px",
                    left: "0",
                    width: "100%",
                    padding: "10px 10%",
                    backgroundColor: "#05264d",
                    margin: "0",
                    zIndex: 3
                });
                $sub_menu_parent.css({
                    height: $sub_menu.outerHeight(),
                });

            }
            else if ($anchor > $window.scrollTop() + html_margin || window.innerWidth < 600) {

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
                    height: "",
                });
            }
            if ($anchor <= $window.scrollTop() + html_margin ) {
                $hamburger.css({
                    top: html_margin + "px",
                    display: "block",
                });
            } else if ($anchor > $window.scrollTop() + html_margin ) {
                $hamburger.css({
                    top: "",
                    display: "",
                });
            }
        }
    }

    //accounting for fixed elements when linking
    function anchor_scroll_capsule(e) {
        var $sub_menu = $('.wrapper.sub-menu');
        var $main_menu = $('.wrapper.main-menu');
        var $window = $(window);
        var $html = $('html');
        $window.imagesLoaded(function () {
            var hash = window.location.hash;
            if (e) {
                hash = e.target.hash;
            }
            if (hash.length > 0) {
                var $hash = $('[name="' + hash.substr(1) + '"]');
                if ($hash.length > 0) {
                    var $anchor = $main_menu.parent().offset().top;
                    var html_margin = $html.length ? parseFloat($html.css('marginTop')) : 0;
                    var offset = $sub_menu.outerHeight() + $main_menu.outerHeight();
                    var baseScroll = $hash.offset().top;
                    var scroll = baseScroll - offset - html_margin;
                    if ($anchor > scroll || window.innerWidth < 600) {
                        scroll = baseScroll;
                    }
                    scroll = scroll > 0 ? scroll : 0;
                    $('html').animate({
                        scrollTop: scroll
                    }, 0);
                }
            }
        });
    }

    $('a').click(anchor_scroll_capsule);
    $(window).load(function () {
        anchor_scroll_capsule();
    });
    /*
    *
    *   Find the "@" and change the font family
    *
    ------------------------------------*/
    
    $('.js-at-word').html(function(i, v) {
        return v.replace(/\s(@)\s/, ' <span class=change-at>$1</span> ');
    });
});// END #####################################    END
