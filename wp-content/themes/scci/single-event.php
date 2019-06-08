<?php 
  get_header(); 
  $the_post = the_post();
  $event_date = get_field('event_date');
  $event_start_time = get_field('event_start_time');
  $event_end_time = get_field('event_end_time');
  $event_url = get_field('event_url');
  $event_address = get_field('event_address');
?>
<div class="hero">
  <div class="hero__image hero__image--page">
    <h1 class="hero__title"><?php echo get_the_title(); ?></h1>
  </div>
</div>
<div class="page_content page_content--standard">
  <div class="equal_section">
    <div class="event_details">
      <h2 class="event_details__date"><?php echo $event_date; ?></h2>
      <h3 class="event_details__time">From <?php echo $event_start_time; ?> to <?php echo $event_end_time; ?></h3>
      <h3 class="event_details__address"><?php echo $event_address; ?></h3>
      <?php echo the_content(); ?>
    </div>
    <iframe width="100%" height="300" src="https://maps.google.com/maps?width=100%&height=300&hl=en&q=<?php echo $event_address; ?>&z=13&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
  </div>
</div>
<?php get_footer(); ?>
