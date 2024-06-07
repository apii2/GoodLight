<footer class="container-fluid px-0 w-100">
  <div class="row m-0">

    <!-- Footer logo -->
    <div class="col-2 px-0">
      <div class="container-fluid px-0">
        <div class="row mb-4">
          <div class="col">
            <?php
            $custom_logo_id = get_theme_mod('header_image');

            if (has_header_image()):
              printf(
                '<a class="navbar-brand footer-logo" href="%1$s"><img width="170" src="%2$s"></a>',
                esc_url(home_url()),
                esc_url($custom_logo_id)
              );
            else:
              printf(
                '<a class="navbar-brand" href="%1$s">%2$s</a>',
                esc_url(home_url()),
                bloginfo('name')
              );
            endif;
            ?>
          </div>
        </div>

        <div class="row text-white fs-2 mb-4">
          <div class="col">
            <i class="fa-brands fa-square-facebook"></i>
          </div>
          <div class="col">
            <i class="fa-brands fa-instagram"></i>
          </div>
        </div>

        <div class="row">
          <div class="col text-white fs-6 fw-light">
            &copy; <?php esc_html_e(date('Y')); ?>. <?php esc_html_e(bloginfo('name')); ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer links -->
    <div class="col px-0">
      <div class="container-fluid">
        <div class="row">
        <?php
        $footer_menu_id = get_menu_id('footer');
        $footer_menus = wp_get_nav_menu_items($footer_menu_id);

        if (!empty($footer_menus)):
          foreach ($footer_menus as $footer_menu):
            if ($footer_menu->menu_item_parent === '0'):
              ?>
              <div class="col pe-0">

                <div class="container-fluid">
                  <div class="row text-white">
                    <div class="col-12 mb-1 text-uppercase px-0">
                      <?php esc_html_e($footer_menu->title); ?>
                    </div>

                    <?php
                    $child_menu = get_child_menu_items($footer_menus, $footer_menu->ID);
                    $has_child = !empty($child_menu);

                    if ($has_child):
                      foreach ($child_menu as $menu):
                        ?>
                        <div class="col-12 nav-item ps-0 lh-sm">
                          <a href="<?php echo esc_url($menu->url) ?>" class="text-white nav-link">
                            <?php esc_html_e($menu->title) ?>
                          </a>
                        </div>
                      <?php
                      endforeach;
                    endif;
                    ?>
                  </div>
                </div>
              </div>

              <?php
            endif;
          endforeach;
        endif;
        ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="https://kit.fontawesome.com/fa8f243c11.js" crossorigin="anonymous"></script>

<?php wp_footer(); ?>
</body>
</html>