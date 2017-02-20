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
            <div class="column column-1">
                <?php $events_title = get_field("events_title","option");?>
                <div class="title">
                    <h2><?php if($events_title) echo $events_title;?></h2>
                </div><!--.title-->
                <div class="list">
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
                </div><!--.list-->
            </div><!--.column-1-->
            <div class="column column-2">
                <?php $resources = get_field("resources_repeater","option");
                $resources_title = get_field("resources_title","option");?>
                <div class="title">
                    <h2><?php if($resources_title) echo $resources_title;?></h2>
                </div><!--.title-->
                <div class="list">
                    <?php if($resources):?>
                        <ul class="resources">
                            <?php foreach($resources as $resource):
                                $title = $resource['title'];
                                if($title && $resource['internal_or_external_link']):?>
                                    <li class="resource">
                                        <?php if(strcmp($resource['internal_or_external_link'],'internal')===0):
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
                                    </li><!--.resource-->
                                <?php endif;
                            endforeach;?>
                        </ul>
                    <?php endif;?>
                </div><!--.list-->
            </div><!--.column-2-->
            <div class="column column-3">
	            <?php $gives = get_field("give_repeater","option");
	            $give_title = get_field("give_title","option");?>
                <div class="title">
                    <h2><?php if($give_title) echo $give_title;?></h2>
                </div><!--.title-->
                <div class="list">
	                <?php if($gives):?>
                        <ul class="gives">
                            <?php foreach($gives as $give):
                                $title = $give['title'];
                                if($title && $give['internal_or_external_link']):?>
                                    <li class="give">
                                        <?php if(strcmp($give['internal_or_external_link'],'internal')===0):
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
                                    </li><!--.give-->
                                <?php endif;
                            endforeach;?>
                        </ul>
                    <?php endif;?>
                </div><!--.list-->
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
                <ul>
                    <li class="facebook">
                        <?php $facebook=get_field("facebook_link","option");
                        if($facebook):?>
                            <a href="<?php echo $facebook;?>"><img src="<?php echo get_template_directory_uri()."/images/social/facebook.png";?>" alt="facebook"></a>
                        <?php endif;?>
                    </li><!--.facebook-->
                    <li class="twitter">
                        <?php $twitter=get_field("twitter_link","option");
                        if($twitter):?>
                            <a href="<?php echo $twitter;?>"><img src="<?php echo get_template_directory_uri()."/images/social/twitter.png";?>" alt="twitter"></a>
                        <?php endif;?>
                    </li><!--.twitter-->
                    <li class="instagram">
                        <?php $instagram=get_field("instagram_link","option");
                        if($instagram):?>
                            <a href="<?php echo $instagram;?>"><img src="<?php echo get_template_directory_uri()."/images/social/instagram.png";?>" alt="instagram"></a>
                        <?php endif;?>
                    </li><!--.instagram-->
                    <li class="linkedin">
                        <?php $linkedin=get_field("linkedin_link","option");
                        if($linkedin):?>
                            <a href="<?php echo $linkedin;?>"><img src="<?php echo get_template_directory_uri()."/images/social/linkedin.png";?>" alt="linkedin"></a>
                        <?php endif;?>
                    </li><!--.linkedin-->
                    <li class="vimeo">
                        <?php $vimeo=get_field("vimeo_link","option");
                        if($vimeo):?>
                            <a href="<?php echo $vimeo;?>"><img src="<?php echo get_template_directory_uri()."/images/social/vimeo.png";?>" alt="vimeo"></a>
                        <?php endif;?>
                    </li><!--.vimeo-->
                </ul>
            </div><!--.column-2-->
	    </div><!-- .row-2 -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
