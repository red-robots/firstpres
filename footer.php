<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="row-1">
            <div class="column-1">
                <?php $args = array(
                        'post_type'=>'event',
                        'posts_per_page' => -1,
                        'order'=>'ASC',
                        'orderby'=>'menu_order',
                        'meta_query'=>array(
                                array(
                                    'key'=>'featured',
                                    'value'=>'featured',
                                    'compare'=>'LIKE',
                                ),
                        ),
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <?php while($query->have_posts()): $query->the_post();?>
                        <div class="event">
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
                        </div><!--.event-->
                    <?php endwhile;?>
                <?php endif;?>
            </div><!--.column-1-->
            <div class="column-2">
                <?php $resources = get_field("resources_repeater","option");
                if($resources):
                    foreach($resources as $resource):
                        $title = $resource['title'];
                        if($title && $resource['internal_or_external_link']):?>
                            <div class="resource">
                                <?php if(strcmp($resource['internal_or_external_link'],'internal')):
                                    if($resource['internal_link']):?>
                                        <a href="<?php echo get_the_permalink($resource['internal_link']);?>">
                                            <?php echo $title;?>
                                        </a>
                                    <?php endif;
                                else:
                                    if($resource['external_link']):?>
                                        <a href="<?php echo $resource['external_link'];?>">
                                            <?php echo $title;?>
                                        </a>
                                    <?php endif;
                                endif;?>
                            </div><!--.resource-->
                        <?php endif;
                    endforeach;
                endif;?>
            </div><!--.column-2-->
            <div class="column-3">
	            <?php $gives = get_field("give_repeater","option");
	            if($gives):
                    foreach($gives as $give):
                        $title = $give['title'];
                        if($title && $give['internal_or_external_link']):?>
                            <div class="resource">
                                <?php if(strcmp($give['internal_or_external_link'],'internal')):
                                    if($give['internal_link']):?>
                                        <a href="<?php echo get_the_permalink($give['internal_link']);?>">
                                            <?php echo $title;?>
                                        </a>
                                    <?php endif;
                                else:
                                    if($give['external_link']):?>
                                        <a href="<?php echo $give['external_link'];?>">
                                            <?php echo $title;?>
                                        </a>
                                    <?php endif;
                                endif;?>
                            </div><!--.resource-->
                        <?php endif;
                    endforeach;
                endif;?>
            </div><!--.column-3-->
        </div><!--.row-1-->
		<div class="row-2">
			<div class="column-1">
                <div class="column-1">
                    <?php $google_maps = get_field("google_maps","option");
                    if($google_maps):
                        echo $google_maps;
                    endif;?>
                </div><!--.column-1-->
                <div class="column-2">
                    <?php $address = get_field("address","option");
                    if($address):
                        echo $address;
                    endif;?>
                </div><!--.column-2-->
            </div><!-- .column-1 -->
            <div class="column-2">
                <div class="facebook">
		            <?php $facebook=get_field("facebook_link","option");
		            if($facebook):?>
                        <img src="<?php echo get_template_directory_uri()."/images/social/facebook.png";?>" alt="facebook">
		            <?php endif;?>
                </div><!--.facebook-->
                <div class="twitter">
		            <?php $twitter=get_field("twitter_link","option");
		            if($twitter):?>
                        <img src="<?php echo get_template_directory_uri()."/images/social/twitter.png";?>" alt="twitter">
		            <?php endif;?>
                </div><!--.twitter-->
                <div class="instagram">
		            <?php $instagram=get_field("instagram_link","option");
		            if($instagram):?>
                        <img src="<?php echo get_template_directory_uri()."/images/social/instagram.png";?>" alt="instagram">
		            <?php endif;?>
                </div><!--.instagram-->
                <div class="linkedin">
		            <?php $linkedin=get_field("linkedin_link","option");
		            if($linkedin):?>
                        <img src="<?php echo get_template_directory_uri()."/images/social/linkedin.png";?>" alt="linkedin">
		            <?php endif;?>
                </div><!--.linkedin-->
                <div class="vimeo">
		            <?php $vimeo=get_field("vimeo_link","option");
		            if($vimeo):?>
                        <img src="<?php echo get_template_directory_uri()."/images/social/vimeo.png";?>" alt="vimeo">
		            <?php endif;?>
                </div><!--.vimeo-->
            </div><!--.column-2-->
	    </div><!-- .row-2 -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
