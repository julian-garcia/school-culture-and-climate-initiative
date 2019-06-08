<?php 
  get_header(); 
  $the_post = the_post();
?>
<div class="hero">
  <div class="hero__image hero__image--page">
    <h1 class="hero__title"><?php echo get_the_title(); ?></h1>
  </div>
</div>
<div class="page_content page_content--standard">
  <?php echo the_content(); ?>
</div>
<?php get_footer(); ?>
