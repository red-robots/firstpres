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
</aside><!-- #secondary -->
