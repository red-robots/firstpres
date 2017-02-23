<?php
/**
 * Template Name: This Week
 */

get_header("interior"); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			<?php if(have_posts()): the_post();
				get_template_part( 'template-parts/content', 'this-week' );
			endif;?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
