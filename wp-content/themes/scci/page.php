<?php 
  get_header(); 
  $the_post = the_post();
  $page_items = get_field('page_items'); 
  $resources = get_field('resources_column'); 
  $organizations = get_field('organizations_column'); 
?>
<?php if ($page_items['image']): ?>
<style>
  .hero__image--page {
    background-image: url(<?php echo $page_items['image']; ?>);
  }
</style>
<?php endif ?>
<div class="hero">
  <div class="hero__image hero__image--page">
    <h1 class="hero__title"><?php echo get_the_title(); ?></h1>
  </div>
</div>
<div class="page_content page_content--standard">
  <?php if ($page_items['title']): ?>
    <h2 class="page_title"><?php echo $page_items['title']; ?></h2>
  <?php endif ?>
    <?php if ($resources): ?>
      <div class="resources_section">
        <div>
          <?php echo $resources; ?>
        </div>
        <div>
          <?php echo $organizations; ?>
        </div>
      </div>
    <?php endif ?>
    <?php
      echo the_content();
      if( have_rows('staff_section') ): ?>
      <h2 class="page_title">Staff</h2>
      <?php 
        while ( have_rows('staff_section') ) : the_row(); 
        $staff_image = get_sub_field('staff_image');  ?>
        <div class="split_section">
          <img class="split_section__image" 
            src="<?php echo $staff_image['url']; ?>"
            alt="<?php echo $staff_image['alt']; ?>">
          <div class="split_section__text">
            <?php the_sub_field('staff_description'); ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : endif; ?>
    <?php
      if( have_rows('consultants_section') ): ?>
      <h2 class="page_title">Consultants</h2>
      <?php 
        while ( have_rows('consultants_section') ) : the_row(); 
        $consultant_image = get_sub_field('consultants_image'); ?>
        <div class="split_section">
          <img class="split_section__image" 
            src="<?php echo $consultant_image['url']; ?>"
            alt="<?php echo $consultant_image['alt']; ?>">
          <div class="split_section__text">
            <?php the_sub_field('consultants_description') ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : endif; ?>
</div>
<?php get_footer(); ?>
