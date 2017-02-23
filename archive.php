<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header("interior"); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php if(have_posts()):?>
                <section <?php post_class("template-archive"); ?>>
                    <div class="row-2 clear-bottom">
                        <div class="column-1">
                            <div class="title">
                                <header>
                                    <h1>Archive</h1>
                                    <?php echo the_archive_title( '<h2>', '</h2>' );?>
                                </header><!-- .page-header -->
                            </div><!--.title-->
                            <div class="posts">
                                <?php while(have_posts()):the_post();?>
                                    <div class="post">
                                        <div class="title">
                                            <header>
                                                <h2>
                                                    <a href="<?php echo get_the_permalink();?>">
                                                        <?php the_title();?>
                                                    </a>
                                                </h2>
                                            </header>
                                        </div><!--.title-->
                                        <div class="date">
                                            <?php echo the_date();?>
                                        </div><!--.date-->
	                                    <?php if(get_the_content()):?>
                                            <div class="copy">
			                                    <?php the_content('. . . <span class="read-more">Read More</span>');?>
                                            </div><!--.copy-->
	                                    <?php endif;?>
                                    </div><!--.post-->
                                <?php endwhile;?>
                            </div><!--.posts-->
                        </div><!--.column-1-->
                        <div class="column-2">
                            <?php get_sidebar('archive');?>
                        </div><!--.column-2-->
                    </div><!--.row-3-->
                </section><!-- #post-## -->
            <?php endif;?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
