<?php
/**
 * Template part for displaying page content in single-event.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single-event"); ?>>
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
            <div class="copy">
                <?php $date = get_field('date');?>
                <?php if($date):?>
                    <p><?php echo $date;?></p>
                <?php endif;?>
                <?php the_content();?>
            </div><!--.copy-->
        </div><!--.column-1-->
        <div class="column-2">
	        <?php get_sidebar('event');?>
        </div><!--.column-2-->
    </div><!--.row-3-->
</article><!-- #post-## -->
