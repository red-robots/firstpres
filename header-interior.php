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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<div class="row-1 clear-bottom">
                <div class="new">
	                <?php $post = get_post(186);
	                setup_postdata($post);?>
                    <a href="<?php echo get_the_permalink();?>">
		                <?php the_title();?>
                    </a>
	                <?php wp_reset_postdata();?>
                </div><!--.new-->
                <div class="week">
	                <?php $post = get_post(258);
	                setup_postdata($post);?>
                    <a href="<?php echo get_the_permalink();?>">
		                <?php the_title();?>
                    </a>
	                <?php wp_reset_postdata();?>
                </div><!--.week-->
            </div><!--.row-1-->
			<?php if(is_home()): ?>
	            <h1 class="logo row-2">
	            <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo1.png";?>" alt="<?php bloginfo('name'); ?>"></a>
	            </h1>
	        <?php else: ?>
	            <div class="logo row-2">
	            <a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo1.png";?>" alt="<?php bloginfo('name'); ?>"></a>
	            </div><!--.logo .row-2-->
	        <?php endif; ?>

			<nav id="site-navigation" class="main-navigation row-3" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
	    </div><!-- wrapper -->
	</header><!-- #masthead -->
	<div id="content" class="site-content wrapper">
