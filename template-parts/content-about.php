<?php
/**
 * Template part for displaying page content in about sub pages.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about"); ?>>
    <div class="row-1">
	    <?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
    </div><!--.row-1-->
    <?php $image = get_field("banner");
    if($image):?>
        <div class="row-2">
            <img src="<?php echo $image['sizes']['full'];?>" alt="<?php echo $image['alt'];?>">
        </div><!--.row-2-->
    <?php endif;?>
    <div class="content-row row-3">
        <div class="column-1">
            <div class="title">
                <header>
                    <h1><?php the_title();?></h1>
                </header>
            </div><!--.title-->
            <?php if(get_the_content()):?>
                <div class="copy">
                    <?php the_content();?>
                </div><!--.copy-->
            <?php endif;?>
        </div><!--.column-1-->
        <div class="column-2">
        </div><!--.column-2-->
    </div><!--.row-3-->
</article><!-- #post-## -->
