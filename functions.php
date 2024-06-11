<?php 

if(! function_exists('goodlight_setup')):
  /**
   *Sets up theme defaults and registers support for various WordPress features. 
   * Note that this function is hooked into the after_setup_theme hook, which runs before the init hook.
   * The init hook is too late for some features, such as indicating support for post thumbnails.
   */

  function goodlight_setup(){
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Crafty Press, use a find and replace
     * to change 'mytheme' to the nmae of your theme in all the template files.
     */
    load_theme_textdomain( 'goodlight', get_template_directory().'/languages' );

    //Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    
    /**
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
     */
    add_theme_support('title-tag');

    /**
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support('post-thumbnails');

    /**
     * Set up the WordPress core custom background features.
     */
    add_theme_support('custom-background', apply_filters('goodlight_custom_background_args',[
      'default-color' => 'ffffff',
      'default-image' => ''
    ]));

    /**
     * Switch default core markup for search form, comment form and comments
     * to output valid HTML5.
     */
    add_theme_support('html5',[
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    ]);

    /**
     * Add theme support for selective refresh for widgets.
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     */
    add_theme_support('custom-logo',[
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true
    ]);


    /**
     * Add support for Custom Page Header
     */
    add_theme_support('custom-header',[
      'flex-width' => true,
      'width' => 1600,
      'flex-height' => true,
      'height' => 450,
      'default-image' => ''
    ]);
    
    /**
     * Add Post Type Support
     */
    add_theme_support('post-formats',['aside','gallery','link','image','quote','video','audio']);

    //This theme uses wp_nav_menu() in one location.
    register_nav_menus([
      'primary' => esc_html__('Primary','goodlight'),
      'footer' => esc_html__('Footer-menu','goodlight'),
      'header-right' => esc_html__('Header-right','goodlight')
    ]);

    /**
     * filters whether to show the admin bar 
     */
    add_filter('show_admin_bar','__return_false');  
  }
endif;
add_action('after_setup_theme','goodlight_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * 
 * Priority 0 to make it available to these priority callbacks.
 * 
 * @global int $content_width 
 */
function goodlight_content_width(){
  //This variable is intended to be overruled from themes.
  $GLOBALS['content_width'] = apply_filters('goodlight_content_width',1170);
}
add_action('after_setup_theme','goodlight_content_width',0);

/**
 * Register Sidebar widget area
 * 
 * @since 1.0.0
 */
function goodlight_sidebar_widgets_init(){
  //Default sidebar
  register_sidebar( [
    'name' => esc_html__( 'Sidebar', 'goodlight' ),
    'id' => 'default-sidebar',
    'description' => esc_html__( 'Add widgets here.', 'goodlight' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
  ] );
}
add_action('widgets_init','goodlight_sidebar_widgets_init');

/**
 * Enqueue public scripts and styles.
 */
function goodlight_public_scripts() {
  wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/main.css', [], wp_rand(), 'all' );
}
add_action('wp_enqueue_scripts','goodlight_public_scripts');

/**
 * Enqueue admin scripts and styles.
 */
function goodlight_admin_scripts(){

}
add_action('admin_enqueue_scripts','goodlight_admin_scripts');


/**
 * to get the id of the menu location
 */
function get_menu_id($location){
  $loc = get_nav_menu_locations();
  return $loc[$location];
}

/**
 * to get the child menu items of a particular parent menu item
 */
function get_child_menu_items($menus, $parent_id){
  $child_menus = [];

  if(!empty($menus)):
    foreach($menus as $menu):
      if(intval($menu->menu_item_parent) === $parent_id):
        array_push($child_menus,$menu);
      endif;
    endforeach;
  endif;

  return $child_menus;
}


// function clean_wp_paragraph_blocks($content) {
//   // Remove extra spaces between blocks
//   $content = preg_replace('/<!-- \/wp:paragraph -->\s+<!-- wp:paragraph -->/', '<!-- /wp:paragraph --><!-- wp:paragraph -->', $content);
  
//   // Optionally, remove leading and trailing spaces from the content
//   $content = trim($content);
  
//   return $content;
// }

// add_filter('the_content', 'clean_wp_paragraph_blocks');