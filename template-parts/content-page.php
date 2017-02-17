<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page"); ?>>
    <?php $sections = get_field("sections");
    if($sections):?>
        <div class="row-1">
            <ul>
                <?php foreach($sections as $section):
                    if($section['menu_title']):?>
                        <li><a href="#<?php echo $section['menu_title'];?>"><?php echo $section['menu_title'];?></a></li>
                    <?php endif;
                endforeach;?>
            </ul>
        </div><!--.row-1-->
    <?php endif;?>
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
            <?php  $post = get_post(198);
            setup_postdata($post);
            $view_bio_text = get_field("view_bio_text");
            wp_reset_postdata();
            $args = array(
	            'post_type'      => "staff",
	            "posts_per_page" => 4,
	            "order"          => 'RAND',
            );
            $query = new WP_Query($args);
            if($query->have_posts()):?>
            <div class="staff-wrapper">
		        <?php while($query->have_posts()):$query->the_post();?>
                    <div class="staff">
				        <?php $image = get_field("image");
				        $p_title = get_field("professional_title");
				        $phone = get_field("phone");
				        $email = get_field("email");?>
                        <div class="row-1">
                            <div class="overlay">
                                <a href="<?php echo get_the_permalink();?>">
							        <?php if($view_bio_text):
								        echo $view_bio_text;
							        endif;?>
                                </a>
                            </div><!--.overlay-->
					        <?php if($image):?>
                                <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
					        <?php endif;?>
                        </div><!--.row-1-->
                        <div class="row-2">
                            <h2><?php the_title();?></h2>
					        <?php if($p_title):?>
                                <div class="bar"></div>
                                <div class="p-title">
							        <?php echo $p_title;?>
                                </div><!--p-title-->
					        <?php endif;?>
                        </div><!--.row-2-->
                        <div class="row-3">
					        <?php if($phone):?>
                                <div class="phone">
                                    <a href="tel:<?php echo $phone;?>">
								        <?php echo $phone;?>
                                    </a>
                                </div><!--.phone-->
					        <?php endif;?>
					        <?php if($email):?>
                                <div class="email">
                                    <a href="mailto:<?php echo $email;?>">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </div><!--.email-->
					        <?php endif;?>
                        </div><!--.row-3-->
                    </div><!--.staff-->
		        <?php endwhile;?>
            </div><!--.staff-wrapper-->
	        <?php wp_reset_postdata();
	        endif;?>
        </div><!--.column-2-->
    </div><!--.row-3-->
    <?php if($sections):
        for($i=0;$i<count($sections);$i++):
            $title = $sections['title'];
            $copy = $sections['copy'];
            $menu_title = $sections['menu_title'];
            $image = $sections['image'];?>
            <div class="content-row row-<?php echo $i+4;?>">
                <div class="column-1">
                    <?php if($title):?>
                        <div class="title">
                            <?php echo $title;?>
                        </div><!--.title-->
                    <?php endif;?>
		            <?php if($copy):?>
                        <div class="copy">
				            <?php echo $copy?>
                        </div><!--.copy-->
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
