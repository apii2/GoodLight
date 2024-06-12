<?php

function dd($value){
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

get_header();
?>

<div class="main-front page-width">
  <?php
  if(have_posts()):
    while(have_posts()):
      the_post();
      get_template_part("/template-parts/content","page");
    endwhile;
  else:
    get_template_part("/template-parts/content","none");
  endif;

  get_template_part("/template-parts/post-carousel");
  ?>
  
  </div>
</div>

<?php
get_footer();