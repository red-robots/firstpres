<?php
/**
 * The sidebar containing the archive area.
 *
 */

?>
<aside class="archive copy" role="complementary">
    <h2>Archives</h2>
    <ul>
		<?php wp_get_archives('type=monthly'); ?>
    </ul>
    <h2>Categories</h2>
    <ul>
        <?php wp_list_categories(array('title_li'=>""));?>
    </ul>
</aside><!-- #secondary -->
