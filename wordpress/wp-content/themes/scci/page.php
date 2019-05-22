<?php 
  get_header(); 
  $the_post = the_post();
  $page_items = get_field('page_items'); 
?>
<?php if ($page_items['image']): ?>
<style>
  .hero__image--page {
    background-image: url(<?php echo $page_items['image']; ?>);
  }
</style>
<?php endif ?>
<div class="hero">
  <div class="hero__image hero__image--page"></div>
  <h1 class="hero__title"><?php echo get_the_title(); ?></h1>
</div>
<div class="page_content page_content--standard">
  <h2 class="page_title"><?php echo $page_items['title']; ?></h2>
  <?php echo the_content(); ?>
</div>
<?php get_footer(); ?>
