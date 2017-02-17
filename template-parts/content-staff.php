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
	<?php $args    = array(
		'taxonomy'   => "staff_type",
		'order'      => 'ASC',
		'orderby'    => 'term_order',
		'hide_empty' => 0
	);
	$category_name = get_query_var( "term", null );
	$terms         = get_terms( $args );
	if ( ! is_wp_error( $terms ) && is_array( $terms ) && ! empty( $terms ) ): ?>
        <nav class="staff-cat row-1">
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
	<?php $this_term;
	$args = array(
		'post_type'      => "staff",
		"posts_per_page" => - 1,
		"orderby"        => 'menu_order',
		"order"          => 'ASC',
		"paged"          => $paged
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
	$post = get_post(198);
	setup_postdata($post);
	$view_bio_text = get_field("view_bio_text");
	wp_reset_postdata();
	$query = new WP_Query($args);
	if($query->have_posts()):?>
        <div class="staff-wrapper row-2">
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
</article><!-- #post-## -->
