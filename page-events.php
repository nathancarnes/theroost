<? get_header(); ?>
<div class="left_column featured_events">  
  <? global $post; ?>  
  <? foreach(get_field('featured_events') as $post): ?>  
    <? setup_postdata($post); ?>  
    <div class="featured_event">
      <div class="date"><?= date('l, M j', strtotime(get_field('event_date'))); ?></div>
      <div class="time"><? the_field('event_time'); ?></div>
      <h4><? the_title(); ?></h4>       
      <div class="cost">
        <?= get_field('event_all_ages') ? 'All Ages &ndash; ' : ''; ?><? the_field('event_price'); ?>
      </div>               
      <img src="<? the_field('event_medium_photo'); ?>" alt="<? the_title(); ?>">
      <? if(get_field('event_rvsp_link')): ?><a href="<? the_field('event_rvsp_link'); ?>">RSVP</a><? endif; ?>
    </div> 
  <? endforeach; ?>
  <? wp_reset_postdata(); ?>
</div>                 

<div class="right_column">
  <h3>Upcoming Shows</h3>
  <ol class="upcoming_shows">     
    <? global $post; ?>  
    <? $events = get_posts( array( 
        'numberposts' => -1,
        'orderby' => 'meta_value',
        'meta_key' => 'event_date',
        'order' => 'ASC',
        'post_type' => 'events',
        'post_status' => 'publish'      
     )); ?>
    <? foreach($events as $post): ?>  
      <? setup_postdata($post); ?> 
      <? if(strtotime(get_field('event_date')) > time()): ?>
        <? $month = date('F', strtotime(get_field('event_date'))); ?>
        <? if($last_month != $month): ?>
          <li class="month"><h6><?= $month; ?></h6></li>
          <? $last_month = $month; ?>
        <? endif; ?>
        <li>   
          <div class="artist"><? the_title(); ?></div>
          <div class="date"><?= date('l, F j', strtotime(get_field('event_date'))); ?></div>          
          <div class="time"><? the_field('event_time'); ?></div>
        </li>                                               
      <? endif; ?>
    <? endforeach; ?>
    <? wp_reset_postdata(); ?>       
        
  </ol>
</div>

<div class="clear"></div>

<? get_footer(); ?>