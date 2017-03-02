<?php
/**
 * Template part for displaying page content in about sub pages.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-sitemap"); ?>>
    <div class="sitemap-404-row-1 clear-bottom">
        <div class="column-1">
            <div class="title">
                <header>
                    <h1><?php the_title();?></h1>
                </header>
            </div><!--.title-->
            <div class="copy">
                <?php the_content();?>
                <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
            </div><!--.copy-->
        </div><!--.column-1-->
        <div class="column-2">
	        <?php get_sidebar('staff-2');?>
        </div><!--.column-2-->
    </div><!--.row-1-->
</article><!-- #post-## -->
