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
    <?php 
      if (get_the_title() == "Events") {
        $post_query = new WP_Query(array('post_type' => 'event'));
        if($post_query->have_posts() ) {
          echo '<div class="equal_section">';
          while($post_query->have_posts() ) {
            $post_query->the_post(); ?>
            <div class="event_details">
              <h2 class="page_subheading"><?php the_title(); ?></h2>
              <h3 class="event_details__date"><?php echo get_field('event_date'); ?></h3>
              <a class="event_details__link" href="<?php echo get_permalink(); ?>">Read More...</a>
            </div>
            <?php
          }
          echo '</div>';
        }
      }
    ?>
    <?php if (get_the_title() == "My Resources"): ?>
      <?php if (is_user_logged_in()): ?>
        <form class="upload_form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" enctype="multipart/form-data">
          <label class="upload_form__label" for="fileToUpload">Select file to upload:</label>
          <input class="upload_form__file" type="file" name="fileToUpload" id="fileToUpload"><br>
          <input class="upload_form__button" type="submit" value="Upload" name="submit">
          <input type="hidden" name="action" value="file_upload_form">
        </form> 
        <table class="file_table">
          <tbody>
            <?php
              $dir = wp_upload_dir()['basedir'] . "/user_uploads/" . 
                     wp_get_current_user()->user_login . "/*";
              foreach(glob($dir) as $file) {
                if(!is_dir($file)) { 
                  echo '<tr class="file_table__row"><td class="file_table__item">' . 
                       '<a href="' . home_url() . '/wp-content/uploads/user_uploads/' . 
                       wp_get_current_user()->user_login . '/' . basename($file) . '">' . 
                       basename($file) . '</a>' . 
                       '</td></tr>';
                }
              } 
            ?>
          </tbody>
        </table>
      <?php else: ?>
        <h2 class="page_title">
          <a href="/wp-login.php">Log in</a> or 
          <?php wp_register('', ''); ?>
        </h2>
      <?php endif; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
