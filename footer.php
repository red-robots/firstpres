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
                <?php $events_title = get_field("events_title","option");
                $events_link = get_field("events_link","option");?>
                <div class="title">
                    <?php if($events_link):?>
                        <a href="<?php echo $events_link;?>">
                    <?php endif;?>
                        <h2><?php if($events_title) echo $events_title;?></h2>
                    <?php if($events_link):?>
                        </a>
                    <?php endif;?>
                </div><!--.title-->
                <div class="list">
                    <?php $args = array(
                            'post_type'=>'event',
                            'posts_per_page' => 4,
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
                $resources_title = get_field("resources_title","option");
                $resources_link = get_field("resources_link","option");?>
                <div class="title">
	                <?php if($resources_link):?>
                        <a href="<?php echo $resources_link;?>">
                    <?php endif;?>
                        <h2><?php if($resources_title) echo $resources_title;?></h2>
                    <?php if($resources_link):?>
                        </a>
                    <?php endif;?>
                </div><!--.title-->
                <div class="list">
                    <?php if($resources):?>
                        <ul class="resources">
                            <?php foreach($resources as $resource):
                                $title = $resource['title'];
                                if($title && $resource['internal_or_external_link']):?>
                                    <?php if(strcmp($resource['internal_or_external_link'],'internal')===0):
                                        if($resource['internal_link']):?>
                                            <li class="resource">
                                                <a href="<?php echo get_the_permalink($resource['internal_link']);?>">
                                                    <?php echo $title;?>
                                                </a>
                                            </li><!--.resource-->
                                        <?php endif;
                                    elseif(strcmp($resource['internal_or_external_link'],'external')===0):
                                        if($resource['external_link']):?>
                                            <li class="resource">
                                                <a href="<?php echo $resource['external_link'];?>">
                                                    <?php echo $title;?>
                                                </a>
                                            </li><!--.resource-->
                                        <?php endif;
                                    else:
	                                    if($resource['pdf']):?>
                                            <li class="resource">
                                                <a href="<?php echo $resource['pdf']['url'];?>">
				                                    <?php echo $title;?>
                                                </a>
                                            </li><!--.resource-->
                                        <?php endif;
                                    endif;?>
                                <?php endif;
                            endforeach;?>
                        </ul>
                    <?php endif;?>
                </div><!--.list-->
            </div><!--.column-2-->
            <div class="column column-3">
	            <?php $gives = get_field("give_repeater","option");
	            $give_title = get_field("give_title","option");
	            $give_link = get_field("give_link","option");?>
                <div class="title">
	                <?php if($give_link):?>
                        <a href="<?php echo $give_link;?>">
                    <?php endif;?>
                        <h2><?php if($give_title) echo $give_title;?></h2>
                    <?php if($give_link):?>
                        </a>
                    <?php endif;?>
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
	                <?php $facebook=get_field("facebook_link","option");
	                if($facebook):?>
                    <li class="facebook">
                            <a href="<?php echo $facebook;?>"><i class="fa fa-facebook-f"></i></a>
                    </li><!--.facebook-->
	                <?php endif;?>
	                <?php $twitter=get_field("twitter_link","option");
	                if($twitter):?>
                    <li class="twitter">
                            <a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a>
                    </li><!--.twitter-->
	                <?php endif;?>
	                <?php $instagram=get_field("instagram_link","option");
	                if($instagram):?>
                    <li class="instagram">
                            <a href="<?php echo $instagram;?>"><i class="fa fa-instagram"></i></a>
                    </li><!--.instagram-->
	                <?php endif;?>
	                <?php $linkedin=get_field("linkedin_link","option");
	                if($linkedin):?>
                    <li class="linkedin">
                            <a href="<?php echo $linkedin;?>"><i class="fa fa-linkedin"></i></a>
                    </li><!--.linkedin-->
	                <?php endif;?>
	                <?php $vimeo=get_field("vimeo_link","option");
	                if($vimeo):?>
                    <li class="vimeo">
                            <a href="<?php echo $vimeo;?>"><i class="fa fa-vimeo"></i></a>
                    </li><!--.vimeo-->
	                <?php endif;?>
                </ul>
            </div><!--.column-2-->
	    </div><!-- .row-2 -->
        <div class="row-3">
	        <?php wp_nav_menu( array( 'theme_location' => 'sitemapBW') ); ?>
        </div><!--.row-3-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
