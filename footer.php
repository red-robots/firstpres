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
                <!--events-->
            </div><!--.column-1-->
            <div class="column-2">
                <!--resources-->
            </div><!--.column-2-->
            <div class="column-3">
                <!--give-->
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
