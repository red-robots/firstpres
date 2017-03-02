<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about"); ?>>
    <?php $sections = get_field("sections");
    if($sections):?>
        <div class="row-1">
            <div class="wrapper sub-menu">
                <ul id="sub-menu">
                    <?php foreach($sections as $section):
                        if($section['menu_title']):?>
                            <li><a href="#<?php echo sanitize_title_with_dashes($section['menu_title']);?>"><?php echo $section['menu_title'];?></a></li>
                        <?php endif;
                    endforeach;?>
                    <li>
                        <?php $post = get_post(198);
                        setup_postdata($post);?>
                        <a href="<?php echo get_the_permalink();?>"><?php the_title();?></a>
                        <?php wp_reset_postdata(); ?>
                    </li>
                </ul>
            </div><!--.wrapper-->
        </div><!--.row-1-->
    <?php endif;?>
    <?php $image = get_field("banner");
    if($image):?>
        <div class="row-2">
            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
        </div><!--.row-2-->
    <?php endif;?>
    <div class="row-3 clear-bottom">
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
            <?php get_sidebar('staff-2');?>
        </div><!--.column-2-->
    </div><!--.row-3-->
    <?php if($sections):
        for($i=0;$i<count($sections);$i++):
            $title = $sections[$i]['title'];
            $copy = $sections[$i]['copy'];
            $menu_title = $sections[$i]['menu_title'];
            $image = $sections[$i]['image'];?>
            <a name="<?php echo sanitize_title_with_dashes($menu_title);?>"></a>
            <div class="content-row clear-bottom row-<?php echo $i+4;?>">
	            <?php if($title):?>
                    <div class="title">
                        <h2><?php echo $title;?></h2>
                    </div><!--.title-->
	            <?php endif;?>
                <div class="column-1 copy">
		            <?php if($copy):?>
                        <?php echo $copy?>
		            <?php endif;?>
                </div><!--.column-1-->
                <div class="column-2">
                    <?php if($image):?>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    <?php endif;?>
                </div><!--.column-2-->
            </div><!--.row-#-->
        <?php endfor;
    endif;//if for sections?>
</article><!-- #post-## -->
