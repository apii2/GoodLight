<div class="posts-carousel px-5">
	<?php
	if ( $post_query->have_posts() ) :
		while ( $post_query->have_posts() ) :
			$post_query->the_post();
			?>
			<div class="card">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_custom_thumbnail(
						get_the_ID(),
						'featured-thumbnail',
						[
							'sizes' => '(max-width: 350px) 350px, 233px',
							'class' => 'w-100',
						]
					);
				} else {
					?>
					<img src="https://via.placeholder.com/510x340" class="w-100" alt="Card image cap">
					<?php
				}
        ?>
      </div>
      <?php
    endwhile;
  endif;