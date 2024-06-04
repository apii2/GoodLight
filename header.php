<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- Page logo -->
  <?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src( $custom_logo_id, "full");

    if(has_custom_logo()):
      printf(
        '<a href="%1$s" class="logo"><img src="%2$s"></a>',
        esc_url(home_url()),
        esc_url($logo[0])
      );
    else:
      echo bloginfo('name');
    endif;
  ?>

  <!-- NavBar -->
  <?php
  if(has_nav_menu( 'primary' )):
    wp_nav_menu( [
      'theme_location' => 'primary',
      'container' => false,
      'menu_class' => '',
      'menu_id' => '',
      'depth' => 3
    ] );
  else:
    printf(
      '<a href="%1$s">%2$s</a>',
      esc_url(admin_url('/nav-menus.php')),
      esc_html__('Assign a menu','goodlight')
    );
  endif;

  $header_menu_id = get_menu_id('primary');
  $header_menus = wp_get_nav_menu_items($header_menu_id);

  if(!empty($header_menus)):
  ?>

    <ul>
      <?php
      foreach($header_menus as $menu){
        if(!$menu->menu_item_parent):
          $child_menu = get_child_menu_items($header_menus, $menu->ID);
          $has_child = ! empty($child_menu);
          if(!$has_child):
            ?>
            <li>
              <a href="#">LInk</a>
            </li>
            <?php
          else:
            ?>
            <li>
              <a href="#">Child</a>
            </li>
            <?php
          endif;
        endif;
      }
      ?>
    </ul>

  <?php  
  endif;
  ?>