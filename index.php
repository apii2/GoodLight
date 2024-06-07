<?php

function dd($value){
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}

get_header();
?>


<?php
get_footer();