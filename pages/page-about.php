<?php
/**
 * Template Name: About
 */

get_header("interior"); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			<?php if(have_posts()): the_post();
				get_template_part( 'template-parts/content', 'about' );
			endif;?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
