<?php
/**
 * Template for page content
 */
?>

<article id="post-<?php the_ID(); ?>" class="">
	<div class="">
		<?php
		the_content();
		?>

	</div>
</article>