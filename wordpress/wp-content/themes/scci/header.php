<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>The School Culture and Climate Initiative</title>
  <?php wp_head(); ?>
</head>
<body class="content">
  <div class="mobile_nav_bar"></div>
  <nav class="nav_menu">
    <a href="/"><img class="logo" src="<?php echo IMAGE_PATH; ?>/logo.svg" alt="The School Culture and Climate Initiative"></a>

    <?php 
      wp_nav_menu(
        array(
          'theme_location' => 'main-menu',
          'menu' => 'nav-menu',
          'container' => 'ul',
          'menu_class' => 'nav_menu__links'
        )
      );
    ?>
  </nav>