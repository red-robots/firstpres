<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131182447-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131182447-1');
</script>



<?php wp_head(); ?>
	
	<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/firstpres-new/images/favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/wp-content/themes/firstpres-new/images/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/wp-content/themes/firstpres-new/images/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/wp-content/themes/firstpres-new/images/favicons/manifest.json">
<link rel="mask-icon" href="/wp-content/themes/firstpres-new/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/wp-content/themes/firstpres-new/images/favicons/favicon.ico">
	
	
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <div id="hamburger">
        <div class="wrapper">
            <i class="fa fa-bars"></i>
            <div class="menu copy">
                <?php wp_nav_menu( array( 'theme_location' => 'menu' ) ); ?>
            </div><!--.menu-->
        </div><!--.wrapper-->
    </div><!--.hamburger-->
	<div id="content" class="site-content wrapper">
