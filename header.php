<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="page-width">

  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid py-0 px-0 m-0">

      <!-- Page logo -->
      <?php
      $custom_logo_id = get_theme_mod('custom_logo');
      $logo = wp_get_attachment_image_src($custom_logo_id, "full");

      if (has_custom_logo()):
        printf(
          '<a class="navbar-brand me-0 py-3" href="%1$s"><img class="header-logo w-100" width="170" src="%2$s"></a>',
          esc_url(home_url()),
          esc_url($logo[0])
        );
      else:
        printf(
          '<a class="navbar-brand" href="%1$s">%2$s</a>',
          esc_url(home_url()),
          bloginfo('name')
        );
      endif;
      ?>

      <!-- Page menu -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse relative-menu" id="navbarSupportedContent">
        <!-- Title menu -->
        <ul class="navbar-nav mb-2 mb-lg-0 w-100 justify-content-end">
          <?php
          $header_menu_id = get_menu_id('primary');
          $header_menus = wp_get_nav_menu_items($header_menu_id);
          if (!empty($header_menus)):
            foreach ($header_menus as $menu):

              if ($menu->menu_item_parent == '0'):
                $child_menu = get_child_menu_items($header_menus, $menu->ID);
                $has_child = !empty($child_menu);
                if (!$has_child):
                  ?>
                  <li class="nav-item">
                    <a class="nav-link text-uppercase pb-1 menu-title" href="<?php echo esc_url($menu->url); ?>"><?php esc_html_e($menu->title); ?></a>
                  </li>
                  <?php
                else:
                  ?>
                  <li class="nav-item dropdown">
                    <button class="btn btn-secondary bg-transparent text-uppercase border-0 menu-title" type="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <?php esc_html_e($menu->title); ?>
                      <div class="icon d-inline-block ps-1">
                        <i class="fa-solid fa-chevron-down slide-down"></i>
                      </div>
                    </button>
                    <ul class="dropdown-menu">
                      <?php
                      foreach ($child_menu as $child):
                        ?>
                        <li><a class="dropdown-item"
                            href="<?php echo esc_url($child->url); ?>"><?php esc_html_e($child->title); ?></a></li>
                        <?php
                      endforeach;
                      ?>

                    </ul>
                  </li>
                  <?php
                endif;
              endif;
            endforeach;
          endif;
          ?>
        </ul>

        <!-- Icon menu -->
        <div class="collapse navbar-collapse justify-content-end absolute-menu" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
            <?php
            $header_right_menu_id = get_menu_id('header-right');
            $header_right_menus = wp_get_nav_menu_items($header_right_menu_id);
            if (!empty($header_right_menus)):
              foreach ($header_right_menus as $right_menu):
                ?>
                <li class="nav-item">
                  <a href="<?php echo esc_url($right_menu->url); ?>" class="nav-link px-0 py-0">
                    <i class="header-icon <?php esc_html_e(implode(" ",$right_menu->classes)); ?>"></i>
                  </a>
                </li>
                <?php
              endforeach;
            endif;
            ?>
          </ul>
        </div>
      </div>

    </div>
  </nav>
</div>