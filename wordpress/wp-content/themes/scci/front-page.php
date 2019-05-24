<?php 
  get_header(); 
  $hero = get_field('hero'); 
  $logo_titles = get_field('logo_titles');
?>
<?php if ($hero['image']): ?>
<style>
  .hero__image--home {
    background-image: url(<?php echo $hero['image']; ?>);
  }
</style>
<?php endif ?>
<div class="hero">
  <div class="hero__image hero__image--home"></div>
  <p class="hero__text"><?php echo $hero['text']; ?></p>
</div>
<div class="page_content page_content--home">
  <object type="image/svg+xml" data="<?php echo IMAGE_PATH; ?>/home-buttons.svg" class="logo-img">
    Your browser does not support SVG
  </object>
  <div class="logo_circle logo_circle--1">
    <h2 class="logo_circle__text">
      <a class="logo_circle__link" href="#"><?php echo $logo_titles['logo_title_1']; ?></a>
    </h2>
  </div>
  <div class="logo_circle logo_circle--2">
    <h2 class="logo_circle__text">
      <a class="logo_circle__link" href="#"><?php echo $logo_titles['logo_title_2']; ?></a>
    </h2>
  </div>
  <div class="logo_circle logo_circle--3">
    <h2 class="logo_circle__text">
      <a class="logo_circle__link" href="#"><?php echo $logo_titles['logo_title_3']; ?></a>
    </h2>
  </div>
  <div class="logo_circle logo_circle--4">
    <h2 class="logo_circle__text">
      <a class="logo_circle__link" href="#"><?php echo $logo_titles['logo_title_4']; ?></a>
    </h2>
  </div>
</div>
<?php get_footer(); ?>
