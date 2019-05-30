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
  <div class="signin_bar">
    <span class="signin_bar__text">SUPPORTING, CONNECTING, AND EMPOWERING SCHOOLS</span>
    <a href="#" class="signin_bar__login">
      <img class="signin_bar__icon" src="<?php echo IMAGE_PATH; ?>/sign-in.svg" alt="Sign In">
      Sign In
    </a>
  </div>
  <div class="mobile_nav_bar">
    <img class="mobile_nav_bar__img" src="<?php echo IMAGE_PATH; ?>/bars.svg" alt="">
    <a href="#"><img class="mobile_nav_bar__signin" src="<?php echo IMAGE_PATH; ?>/sign-in.svg" alt="Sign In"></a>
  </div>
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