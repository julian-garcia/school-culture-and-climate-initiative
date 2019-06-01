<form class="search_form" action="<?php echo home_url('/'); ?>" method="get">
  <input class="search_form__input" 
    type="text" 
    name="s" 
    placeholder="Search" 
    value="<?php echo get_search_query() ?>">
</form>