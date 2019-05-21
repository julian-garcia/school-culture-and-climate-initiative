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
  <nav class="nav_menu">
    <img class="logo" src="<?php echo IMAGE_PATH; ?>/logo.svg" alt="The School Culture and Climate Initiative">

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

    <!-- <ul class="nav_menu__links" id="nav-menu">
      <li class="nav_menu__item">
        <a class="nav_menu__link" href="#">About</a>
      </li>
      <li class="nav_menu__item">
        <a class="nav_menu__link" href="#">Services</a>
      </li>
      <li class="nav_menu__item">
        <a class="nav_menu__link" href="#">Events</a>
      </li>
      <li class="nav_menu__item">
        <a class="nav_menu__link" href="#">Resources</a>
      </li>
      <li class="nav_menu__item">
        <a class="nav_menu__link" href="#">Contact</a>
      </li>
      <li class="nav_menu__item">
        <a class="nav_menu__link" href="#">Search</a>
      </li>
    </ul> -->
  </nav>