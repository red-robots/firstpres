<?php
/**
 * The template for categories for staff.
 *
 */

get_header("interior"); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
			<?php if($wp_query->get_queried_object_id()===10):
                get_template_part( 'template-parts/content', 'elders');
            else :
                get_template_part( 'template-parts/content', 'staff' );
            endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
