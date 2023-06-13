<?php
/**
 * Block Name: Feed
 *
 * This is the template that displays the Feed block.
 */

?>
<section class="layout">
	<div class="layout_container">
		<?php
		$args = array(
			'numberposts'	=> -1,
		);
		$my_posts = get_posts( $args );
		if( ! empty( $my_posts ) ){
			foreach ( $my_posts as $post ){
				$post_id =  $post->ID;
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
				$article_data = substr($post->post_content, 0, 300);
				$taxonomy = 'category'; 
				$terms = get_the_category($post_id);
				$tags = get_the_tags($post_id);
				$primary_term = intval(get_post_meta( $post_id, '_primary_term_' . $taxonomy, true ));
				?>
				<div class="card">
					<div class="card_image">
						<img src=" <?= $image[0];?>" />
						<p class="card_image_tag">
							<?php 
							foreach($terms as $term) {
								/* if( $primary_term == $term->term_id ) { */
								echo $term->name;
								/* } */
							} 
							?>
						</p>
					</div>
					<div class="card_info">
						<div class="card_info_tag"> <?= $post->post_date;?> | <?= get_field('read_time',$post_id);?></div>
						<h3 class="card_info_title">
							<?= $post->post_title;?>
						</h3>
						<p class="card_info_text">
							<?= $article_data;?>
						</p>
					</div>
					<div class="card_buttons"> <?php 
						foreach($tags as $tag) {	?> 
							<a href="#"><?= $tag->name;?></a><?php
						} ?>
					</div>
				</div>
			<?php 
			}
		}
		?>
    </div>
</section>