<?php
  if( !defined(IMAGE_PATH)){
    define( 'IMAGE_PATH', get_theme_file_uri() . '/common/images' );
  }

  function load_stylesheet() {
    wp_register_style('main', get_template_directory_uri() . '/common/style/main.min.css', array(), 1, 'all');
    wp_enqueue_style('main');
  }
  add_action('wp_enqueue_scripts', 'load_stylesheet');

  // Menu support
  add_theme_support('menus');

  register_nav_menus(
    array(
      'main-menu' => __('Main Menu', 'theme'),
    )
  );