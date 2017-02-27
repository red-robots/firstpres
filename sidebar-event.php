<?php
/**
 * The sidebar containing the archive area.
 *
 */

?>
<aside class="event copy" role="complementary">
    <?php $args = array(
        'post_type'=>'event',
        'posts_per_page'=>10,
        'orderby'=>'menu_order',
        'order'=>'ASC',
    );
    $query = new WP_Query($args);
    if($query->have_posts()):?>
	    <?php while($query->have_posts()): $query->the_post();?>
            <div class="event clear-bottom">
                <a href="<?php echo get_the_permalink();?>">
				    <?php $date = get_field("date");
				    if($date):
					    $date_array = explode(",",$date);
					    if(!empty($date_array)):?>
                            <div class="column-1 date">
                                <div class="row-1 month">
								    <?php echo $date_array[0].".";?>
                                </div><!--.row-1-->
                                <div class="row-2 day">
								    <?php echo $date_array[1];?>
                                </div><!--.row-2-->
                            </div><!--.column-1-->
					    <?php endif;
				    endif;?>
                    <div class="column-2 title">
					    <?php the_title();?>
                    </div><!--.column-2-->
                </a>
            </div><!--.event-->
	    <?php endwhile;?>
    <?php endif;?>
</aside><!-- #secondary -->
