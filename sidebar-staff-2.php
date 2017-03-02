<?php
$staff = get_field( "picker" );
if ( ! $staff ) {
	$staff = array( 0 );
}
$staff_2 = get_field( "picker_2" );
if ( ! $staff_2 ) {
	$staff_2 = array( 0 );
}
$post = get_post( 198 );
setup_postdata( $post );
$view_bio_text = get_field( "view_bio_text" );
$title         = get_field( "staff_title" );
wp_reset_postdata();
$args  = array(
	'post_type'      => "staff",
	'post__in'       => $staff,
	"posts_per_page" => - 1,
	"order"          => 'ASC',
	"orderby"        => 'menu_order'
);
$query = new WP_Query( $args ); ?>
<?php $args_2 = array(
	'post_type'      => "staff",
	'post__in'       => $staff_2,
	"posts_per_page" => - 1,
	"order"          => 'ASC',
	"orderby"        => 'menu_order'
);
$query_2      = new WP_Query( $args_2 ); ?>
<?php if ( $query->have_posts() || $query_2->have_posts() ): ?>
	<?php if ( $title ): ?>
        <div class="title">
            <h2><?php echo $title; ?></h2>
        </div><!--.title-->
	<?php endif; ?>
    <div class="staff-wrapper">
		<?php if ( $query->have_posts() ): ?>
			<?php $count = 0;
			while ( $query->have_posts() ):$query->the_post(); ?>
                <div class="staff count-<?php echo $count; ?>">
					<?php $image = get_field( "image" );
					$p_title     = get_field( "professional_title" );
					$phone       = get_field( "phone" );
					$email       = get_field( "email" ); ?>
                    <div class="row-1">
                        <div class="overlay">
                            <a class="staff-popup"
                               href="#<?php echo sanitize_title_with_dashes( preg_replace( '/[^a-zA-Z0-9]/', '', get_the_title() ) ); ?>">
								<?php if ( $view_bio_text ): ?>
                                    <span><?php echo $view_bio_text; ?></span>
								<?php endif; ?>
                            </a>
                        </div><!--.overlay-->
						<?php if ( $image ): ?>
                            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
						<?php endif; ?>
                    </div><!--.row-1-->
                    <div class="row-2">
                        <h3><?php the_title(); ?></h3>
						<?php if ( $p_title ): ?>
                            <div class="bar"></div>
                            <div class="p-title">
								<?php echo $p_title; ?>
                            </div><!--p-title-->
						<?php endif; ?>
                    </div><!--.row-2-->
                    <div class="row-3 clear-bottom">
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
                    </div><!--.row-3-->
                    <div class="hidden staff-popup"
                         id="<?php echo sanitize_title_with_dashes( preg_replace( '/[^a-zA-Z0-9]/', '', get_the_title() ) ); ?>">
                        <div class="row-1 clear-bottom">
                            <div class="column-1">
								<?php if ( $image ): ?>
                                    <img src="<?php echo $image['sizes']['large']; ?>"
                                         alt="<?php echo $image['alt']; ?>">
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
				<?php $count ++;
			endwhile; ?>
			<?php wp_reset_postdata();
		endif; ?>
		<?php if ( $query_2->have_posts() ): ?>
			<?php $count = 0; ?>
            <div class="staff-2-wrapper">
                <div class="wrapper">
					<?php while ( $query_2->have_posts() ):$query_2->the_post(); ?>
                        <div class="staff-2 count-<?php echo $count; ?>">
							<?php $image = get_field( "image" );
							$p_title     = get_field( "professional_title" );
							$phone       = get_field( "phone" );
							$email       = get_field( "email" ); ?>
                            <div class="row-1">
                                <div class="overlay">
                                    <a class="staff-popup"
                                       href="#<?php echo sanitize_title_with_dashes( preg_replace( '/[^a-zA-Z0-9]/', '', get_the_title() ) ); ?>">
										<?php if ( $view_bio_text ): ?>
                                            <span><?php echo $view_bio_text; ?></span>
										<?php endif; ?>
                                    </a>
                                </div><!--.overlay-->
                                <h3><?php the_title(); ?></h3>
								<?php if ( $p_title ): ?>
                                    <div class="bar"></div>
                                    <div class="p-title">
										<?php echo $p_title; ?>
                                    </div><!--p-title-->
								<?php endif; ?>
                            </div><!--.row-1-->
                            <div class="hidden staff-popup"
                                 id="<?php echo sanitize_title_with_dashes( preg_replace( '/[^a-zA-Z0-9]/', '', get_the_title() ) ); ?>">
                                <div class="row-1 clear-bottom">
                                    <div class="column-1">
										<?php if ( $image ): ?>
                                            <img src="<?php echo $image['sizes']['large']; ?>"
                                                 alt="<?php echo $image['alt']; ?>">
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
						<?php $count ++;
					endwhile; ?>
                </div><!--.wrapper-->
            </div><!--.staff-2-wrapper-->
			<?php wp_reset_postdata();
		endif; ?>
    </div><!--.staff-wrapper-->
<?php endif; ?>