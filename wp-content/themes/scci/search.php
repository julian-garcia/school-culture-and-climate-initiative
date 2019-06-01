<?php  get_header(); ?>
<div class="hero">
  <div class="hero__image hero__image--page">
    <h1 class="hero__title">Search</h1>
  </div>
</div>
<div class="page_content page_content--standard">
  <?php 
    if (have_posts()):  
      while (have_posts()):the_post(); 
        get_template_part('content', 'search'); 
      endwhile;
    else:
      echo '<h2 class="page_subheading page_subheading__search">No Pages Found</h2>';
    endif; 
  ?>
</div>
<?php get_footer(); ?>
