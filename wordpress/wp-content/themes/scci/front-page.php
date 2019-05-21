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
  <div class="page_content__logo">
    <img class="page_content__image" src="<?php echo IMAGE_PATH; ?>/logo-img-white.svg" alt="">
    <h2 class="page_content__text page_content__text--1">
      <span class="page_content__title"><?php echo $logo_titles['logo_title_1']; ?></span>
    </h2>
    <h2 class="page_content__text page_content__text--2">
      <span class="page_content__title"><?php echo $logo_titles['logo_title_2']; ?></span>
    </h2>
    <h2 class="page_content__text page_content__text--3">
      <span class="page_content__title"><?php echo $logo_titles['logo_title_3']; ?></span>
    </h2>
    <h2 class="page_content__text page_content__text--4">
      <span class="page_content__title"><?php echo $logo_titles['logo_title_4']; ?></span>
    </h2>
  </div>
</div>
<?php get_footer(); ?>
