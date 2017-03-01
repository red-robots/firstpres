<?php
/**
 * Template part for displaying page content in page-about.php.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-this-week"); ?>>
    <?php $sections = get_field("sections");
    $blog_title = get_field("blog_title");
    if($sections):?>
        <div class="row-1">
            <div class="wrapper sub-menu">
                <ul id="sub-menu">
                    <?php if($blog_title):?>
                        <li><a href="#<?php echo $blog_title;?>"><?php echo $blog_title;?></a></li>
                    <?php endif;
                    foreach($sections as $section):
                        if($section['menu_title']):?>
                            <li><a href="#<?php echo sanitize_title_with_dashes($section['menu_title']);?>"><?php echo $section['menu_title'];?></a></li>
                        <?php endif;
                    endforeach;?>
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
            <?php $image = get_field("event_image");
            if($image):?>
                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
            <?php endif;?>
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
    <?php if($blog_title):?>
        <a name="<?php echo $blog_title;?>"></a>
        <div class="row-blog clear-bottom">
            <?php $image = get_field("blog_image");
            $picker = get_field("blog_picker");?>
            <div class="title">
                <header>
                    <h2><?php echo $blog_title;?></h2>
                </header>
            </div><!--.title-->
            <div class="column-1 copy <?php if($image) echo "two-column";?>">
                <?php if($picker):
                    $post = get_post($picker);
                    setup_postdata($post);?>
                    <h3><a href="<?php echo get_the_permalink();?>"><?php echo the_title();?></a></h3>
                    <p><?php echo the_date();?></p>
                    <?php the_content('. . . <span class="read-more">Read More</span>');?>
                    <?php wp_reset_postdata();
                endif;?>
            </div><!--.column-1-->
            <?php if($image):?>
                <div class="column-2">
                    <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                </div><!--.column-2-->
            <?php endif;?>
        </div><!--.row-4-->
    <?php endif;?>
</article><!-- #post-## -->
