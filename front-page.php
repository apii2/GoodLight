<?php

function dd($value){
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

get_header();
?>

<div>
  <?php
  if(have_posts()):
    while(have_posts()):
      the_post();
      get_template_part("/template-parts/content","page");
    endwhile;
  else:
    get_template_part("/template-parts/content","none");
  endif;

  ?>
</div>

<?php
get_footer();