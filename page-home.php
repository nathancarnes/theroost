<? get_header(); ?>
  <p id="masthead">
    <? the_field('tagline'); ?>    
  </p>
   
  <!-- Start Slider -->         
  <div id="slider">  
    <? global $post; ?>  
    <? foreach(get_field('featured_events') as $post): ?>  
      <? setup_postdata($post); ?>
      <div class="slide" style="background-image: url(<? the_field('event_banner_photo'); ?>);">
        <div class="info">
          <h4><? the_title(); ?></h4>       
          <div class="date"><?= date('l, M j', strtotime(get_field('event_date'))); ?></div>
          <div class="time"><? the_field('event_time'); ?></div>
          <? if(get_field('event_rvsp_link')): ?><a href="<? the_field('event_rvsp_link'); ?>">RSVP</a><? endif; ?>
        </div>         
      </div>     
    <? endforeach; ?>
    <? wp_reset_postdata(); ?>
  </div>    
  <div class="slider_nav"></div>          
  <div class="clear"></div>
  <!-- End Slider -->
  
  <!-- Start Featured --> 
  <div id="featured">
    <h3>Featured Artists</h3>  
    <? $positions = array('first', 'middle', 'last'); $i = 0; ?>         
    <? foreach(get_field('featured_artists') as $post): ?>  
      <? setup_postdata($post); ?>
      <div class="<?= $positions[$i]; ?> featured_artist">
        <img src="<? the_field('artist_small_photo'); ?>" alt="<? the_title(); ?>">    
        <h4><? the_title(); ?></h4>                   
        <p><? the_field('artist_blurb'); ?></p>
        <? if(get_field('artist_website')): ?>
          <p><a href="<? the_field('artist_website'); ?>">website &gt;</a></p>
        <? endif; ?>
      </div>    
      <? $i++; ?>                          
    <? endforeach; ?>
    <? wp_reset_postdata(); ?>  
  </div>
  <!-- End Featured -->  

<? get_footer(); ?>