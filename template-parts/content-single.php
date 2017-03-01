<?php
/**
 * Template part for displaying page content in single.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single"); ?>>
    <?php $image = get_field("banner");
    if($image):?>
        <div class="row-1">
            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
        </div><!--.row-2-->
    <?php endif;?>
    <div class="row-2 clear-bottom">
        <div class="column-1">
            <div class="title">
                <header>
                    <h1><?php the_title();?></h1>
                </header>
            </div><!--.title-->
            <?php if(get_the_content()):?>
                <div class="copy">
                    <p><?php echo the_date();?></p>
                    <?php the_content();?>
                    <p class="links">
	                    <?php previous_post_link('%link','&laquo; Previous Blog Post');?> &nbsp;
                        <?php next_post_link('%link','Next Blog Post &raquo;');?>
                    </p><!--.links-->
                </div><!--.copy-->
            <?php endif;?>
        </div><!--.column-1-->
        <div class="column-2">
	        <?php get_sidebar('archive');?>
        </div><!--.column-2-->
    </div><!--.row-3-->
</article><!-- #post-## -->
