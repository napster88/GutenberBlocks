<?php
/**
 * Block Name: My Header
 *
 * This is the template that displays the header block.
 */

?>
<section class="banner">
	<div class="banner_container">
		<div class="banner_info">
			<h1><?php the_field('heading'); ?></h1>
			<p class="banner_container_text">
				<?php the_field('content'); ?>
			</p>
		</div>
	</div>
</section>
