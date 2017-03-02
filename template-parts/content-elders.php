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
	$elders = get_field("elders");
	$deacons = get_field("deacons");
	$elders_title = get_field("elders_title");
	$deacons_title = get_field("deacons_title");
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
                            <li><a href="<?php echo $sub_menu_link.'#'.sanitize_title_with_dashes($section['menu_title']);?>"><?php echo $section['menu_title'];?></a></li>
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
    <?php if($elders || $deacons):?>
        <div class="elders-deacons-wrapper row-5">
            <div class="elders">
                <?php if($elders_title):?>
                    <div class="title">
                        <h2><?php echo $elders_title;?></h2>
                    </div><!--.title-->
                <?php endif;?>
                <div class="cats clear-bottom">
                    <?php foreach($elders as $cat):
                        $cat_title = $cat['title'];
                        $list = $cat['list'];?>
                        <div class="cat">
                            <?php if($cat_title):?>
                                <div class="cat-title">
                                    <h3><?php echo $cat_title;?></h3>
                                </div><!--.cat-title-->
                            <?php endif;?>
                            <?php if(!empty($list)): ?>
                                <div class="list">
                                    <?php foreach($list as $item):?>
                                        <h4><?php echo $item['item'];?></h4>
                                    <?php endforeach;?>
                                </div>
                            <?php endif;?>
                        </div><!--.cat-->
                    <?php endforeach;?>
                </div><!--.cats-->
            </div><!--.elders-->
            <div class="deacons">
		        <?php if($deacons_title):?>
                    <div class="title">
                        <h2><?php echo $deacons_title;?></h2>
                    </div><!--.title-->
		        <?php endif;?>
                <div class="cats clear-bottom">
			        <?php foreach($deacons as $cat):
				        $cat_title = $cat['title'];
				        $list = $cat['list'];?>
                        <div class="cat">
					        <?php if($cat_title):?>
                                <div class="cat-title">
                                    <h3><?php echo $cat_title;?></h3>
                                </div><!--.cat-title-->
					        <?php endif;?>
					        <?php if(!empty($list)): ?>
                                <div class="list">
							        <?php foreach($list as $item):?>
                                        <h4><?php echo $item['item'];?></h4>
							        <?php endforeach;?>
                                </div>
					        <?php endif;?>
                        </div><!--.cat-->
			        <?php endforeach;?>
                </div><!--.cats-->
            </div><!--.deacons-->
        </div><!--.elders-deacons-wrapper row-5-->
    <?php endif;?>
</article><!-- #post-## -->
