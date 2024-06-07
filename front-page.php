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
  if(has_post_thumbnail()):
    the_post_thumbnail("full");
  endif;
  ?>

  <div class="main-content">
  <?php
  $content = get_the_content(); 
  $elements = explode("</p>", $content);
  ?> 
  </div>
</div>

<?php
get_footer();