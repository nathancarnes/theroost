<? get_header(); ?> 
  <h2><? the_title(); ?></h2>
              
  <div class="left_column">
    <div class="content">
      <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <? the_content(); ?> 
      <? endwhile; endif; ?>              
    </div>
  </div>
  
  <div class="right_column"> 
    <div class="content">
      <? the_field('sidebar'); ?>
    </div>
  </div>

  <div class="clear"></div>
<? get_footer(); ?>