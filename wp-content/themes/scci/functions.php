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

  // Menu support
  add_theme_support('menus');

  register_nav_menus(
    array(
      'main-menu' => __('Main Menu', 'theme'),
    )
  );


  function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
  }
  add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

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