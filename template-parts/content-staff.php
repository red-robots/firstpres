<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "template-staff" ); ?>>
	<?php if(get_the_ID() !== 198):
		$post = get_post(198);
		setup_postdata($post);
	endif;
	$view_bio_text = get_field("view_bio_text");
	$image = get_field("banner");
	$title = get_the_title();
	$link = get_the_permalink();
	if(get_the_ID() !== 198):
		wp_reset_postdata();
	endif;
	$post = get_post(13);
	setup_postdata($post);
	$sections = get_field("sections");
	$sub_menu_link = get_the_permalink();
	wp_reset_postdata();
	if($sections):?>
        <div class="row-1">
            <div class="wrapper sub-menu">
                <ul id="sub-menu">
                    <?php foreach($sections as $section):
                        if($section['menu_title']):?>
                            <li><a href="<?php echo $sub_menu_link.'#'.$section['menu_title'];?>"><?php echo $section['menu_title'];?></a></li>
                        <?php endif;
                    endforeach;?>
                    <li>
                        <a href="<?php echo $link;?>"><?php echo $title;?></a>
                    </li>
                </ul>
            </div><!--.wrapper-->
        </div><!--.row-1-->
	<?php endif;?>
	<?php if($image):?>
        <div class="row-2">
            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
        </div><!--.row-2-->
	<?php endif;?>
    <div class="row-3">
        <header>
            <h1><?php echo $title;?></h1>
        </header>
    </div><!--.row-3-->
	<?php $args    = array(
		'taxonomy'   => "staff_type",
		'order'      => 'ASC',
		'orderby'    => 'term_order',
		'hide_empty' => 0
	);
	$category_name = get_query_var( "term", null );
	$terms         = get_terms( $args );
	if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ): ?>
        <nav class="staff-cat row-4">
            <ul>
				<?php for ( $i = 0; $i < count( $terms ); $i ++ ):
					$term = $terms[ $i ]; ?>
                    <li>
                        <a <?php if ( ( $category_name === null || empty( $category_name ) ) && $i === 0 ):
							echo 'class="active"';
						endif; ?>
                                href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
                    </li>
				<?php endfor; ?>
            </ul>
        </nav><!--.staff-cat-->
	<?php endif;//endif ?>
	<?php $this_term = null;
	$args = array(
		'post_type'      => "staff",
		"posts_per_page" => - 1,
		"orderby"        => 'menu_order',
		"order"          => 'ASC',
	);
	if ( $category_name !== null && ! empty( $category_name ) ):
		$this_term         = $category_name;
		$args['tax_query'] =
			array(
				array(
					'taxonomy' => 'staff_type',
					'field'    => 'slug',
					'terms'    => $category_name
				),
			);
	elseif ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ):
		$this_term         = $terms[0]->slug;
		$args['tax_query'] =
			array(
				array(
					'taxonomy' => 'staff_type',
					'field'    => 'slug',
					'terms'    => $terms[0]->slug
				),
			);
	endif;
	$query = new WP_Query($args);
	if($query->have_posts()):?>
        <div class="staff-wrapper row-5">
            <?php $count = 0;
            while($query->have_posts()):$query->the_post();?>
                <div class="staff count-<?php echo $count;?>">
                    <?php $image = get_field("image");
                    $p_title = get_field("professional_title");
                    $phone = get_field("phone");
                    $email = get_field("email");?>
                    <div class="row-1">
                        <div class="overlay">
                            <a class="staff-popup" href="#<?php echo sanitize_title_with_dashes( get_the_title() ); ?>">
                                <?php if($view_bio_text):?>
                                    <span><?php echo $view_bio_text;?></span>
                                <?php endif;?>
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
                    <div class="row-3 clear-bottom">
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
                    <div class="hidden staff-popup" id="<?php echo sanitize_title_with_dashes( get_the_title() ); ?>">
                        <div class="row-1 clear-bottom">
                            <div class="column-1">
				                <?php if ( $image ): ?>
                                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
				                <?php endif; ?>
                            </div><!--.column-1-->
                            <div class="column-2">
                                <div class="row-1">
                                    <div class="row-1">
                                        <h1><?php the_title(); ?></h1>
						                <?php if ( $p_title ): ?>
                                            <div class="p-title">
								                <?php echo $p_title; ?>
                                            </div><!--p-title-->
						                <?php endif; ?>
                                    </div><!--.row-1-->
                                    <div class="row-2 clear-bottom">
						                <?php if ( $phone ): ?>
                                            <div class="phone">
                                                <a href="tel:<?php echo $phone; ?>">
									                <?php echo $phone; ?>
                                                </a>
                                            </div><!--.phone-->
						                <?php endif; ?>
						                <?php if ( $email ): ?>
                                            <div class="email">
                                                <a href="mailto:<?php echo $email; ?>">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div><!--.email-->
						                <?php endif; ?>
                                    </div><!--.row-2-->
                                </div><!--.row-1-->
                                <div class="row-2">
					                <?php if ( get_the_content() ): ?>
                                        <div class="copy">
							                <?php the_content(); ?>
                                        </div><!--.copy-->
					                <?php endif; ?>
                                </div><!--.row-2-->
                            </div><!--.column-2-->
                        </div><!--.row-1-->
                    </div><!--.staff-popup-->
                </div><!--.staff-->
                <?php $count++;
            endwhile;?>
        </div><!--.staff-wrapper-->
        <?php wp_reset_postdata();
    endif;?>
</article><!-- #post-## -->
