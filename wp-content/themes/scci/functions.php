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

  // Custom post types
  function create_posttype() {
    register_post_type( 'event',
      array(
        'labels' => array('name' => __( 'Events' ),
                          'singular_name' => __( 'Event' )),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'show_in_menu' => 'edit.php',
        'rewrite' => array('slug' => 'event'),
      )
    );
  }
  // Hooking up our function to theme setup
  add_action( 'init', 'create_posttype' );

  function upload_file() {
    $target_file = wp_upload_dir()['basedir'] . "/user_uploads/" . 
                   wp_get_current_user()->user_login . '/' . 
                   basename($_FILES['fileToUpload']['name']);

    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
    header("Location:/my-resources");
  }

  // Use your hidden "action" field value when adding the actions
  add_action( 'admin_post_file_upload_form', 'upload_file' );

  // Customise log in / register screen logo and link
  function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo IMAGE_PATH; ?>/logo.svg);
        height:100px;
        width:300px;
        background-size: 300px 100px;
        background-repeat: no-repeat;
        padding-bottom: 10px;
        }
    </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

  function wpb_login_logo_url() {
    return home_url();
  }
  add_filter( 'login_headerurl', 'wpb_login_logo_url' );
  
  function wpb_login_logo_url_title() {
    return 'SCCI';
  }
  add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

  // Redirect non-admins to the homepage after logging into the site.
  function login_redirect( $redirect_to, $request, $user  ) {
    return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url() : site_url('my-resources');
  }
  add_filter( 'login_redirect', 'login_redirect', 10, 3 );
  add_filter( 'registration_redirect', 'login_redirect' );

  // Allow Contributors to Add Media
  function allow_subscriber_media( ) {
    if(!current_user_can('subscriber') || current_user_can('upload_files')) return;
    $subscriber = get_role('subscriber');
    $subscriber->add_cap('upload_files');
  } 
  add_action('admin_init', 'allow_subscriber_media');

  add_action('after_setup_theme', 'remove_admin_bar');

  // Disable Admin Bar for All Users Except for Administrators
  function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
  }
  add_action('after_setup_theme', 'remove_admin_bar');