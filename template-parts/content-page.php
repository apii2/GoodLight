
<article id="post-<?php the_ID(); ?>" class="">
	<div class="entry-content">
		<?php
		the_content();

    if(has_post_thumbnail()):
      the_post_thumbnail("full");
    endif;
		?>
	</div>
</article>