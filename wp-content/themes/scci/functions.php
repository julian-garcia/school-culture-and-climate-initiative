<?php
  if( !defined(IMAGE_PATH)){
    define( 'IMAGE_PATH', get_theme_file_uri() . '/common/images' );
  }

  function load_stylesheet() {
    wp_register_style('main', get_template_directory_uri() . '/common/style/main.min.css', array(), 1, 'all');
    wp_enqueue_style('main');
  }
  add_action('wp_enqueue_scripts', 'load_stylesheet');

  wp_enqueue_script( 'script', get_template_directory_uri() . '/common/scripts/ui.js', array(), 1, true);

  // Add menu support to the theme 
  add_theme_support('menus');
  add_theme_support('html5', array('search-form'));

  register_nav_menus(
    array(
      'main-menu' => __('Main Menu', 'theme'),
    )
  );

  // Append a site search box to the end of the menu
  function add_search_form( $items, $args ) {
    $items .= '<li class="nav_menu__item nav_menu__search">' . get_search_form( false ) . '</li>';
    return $items;
  }

  add_filter( 'wp_nav_menu_items','add_search_form', 10, 2 );

  function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
  }
  add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

  // Custom formats used to apply custom css classes to page content
  function insert_formats( $init_array ) {  
    $style_formats = array(  
      array(  
        'title' => 'Page Title',  
        'block' => 'h2',  
        'classes' => 'page_title',
        'wrapper' => false,
      ),  
      array(  
        'title' => 'Subheading',  
        'block' => 'h3',  
        'classes' => 'page_subheading',
        'wrapper' => false,
      ),  
      array(  
        'title' => 'Bold',  
        'block' => 'p',  
        'classes' => 'bold-text',
        'wrapper' => false,
      ),  
      array(  
        'title' => 'Link',  
        'block' => 'a',  
        'classes' => 'text_link',
        'wrapper' => false,
      ),
    );  
    $init_array['style_formats'] = json_encode( $style_formats );  
      
    return $init_array;  
    } 

  // Attach callback to 'tiny_mce_before_init' 
  add_filter( 'tiny_mce_before_init', 'insert_formats' ); 

  function wps_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'wps_mime_types' );