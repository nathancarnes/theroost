<? get_header(); ?>

<div class="left_column">
  <? /* If there are no posts to display, such as an empty archive page */ ?>
  <? if ( ! have_posts() ) : ?>
		<h1>Nothing to see here, folks</h1>
		<p>Move it along.</p>
  <? elseif( is_archive() ): ?>		
    <h1><? wp_title('', true); ?></h1>
  <? endif; ?>           

  <? while ( have_posts() ) : the_post(); ?>  
    <article <? post_class(); ?> id="post-<? the_ID(); ?>">
  	  <header>
  	    <h2><a href="<? the_permalink(); ?>" title="Permalink to <? the_title(); ?>" rel="bookmark"><? the_title(); ?></a></h2>
  	    <div class="date"><? the_date(); ?></div>  
  	  </header>
      <section class="excerpt">
        <? the_excerpt(); ?>
      </section>
      <footer>
        <ul>
      	  <? if ( count( get_the_category() ) ) : ?>
      	    <li class="categories">Filed under <?= get_the_category_list( ', ' ); ?></li>   
      		<? endif; ?>
      		<? if ( get_the_tag_list( '' ) ): ?>      
      	    <li class="tags">Taggged <?= get_the_tag_list( '', ', ' ); ?></li>
      		<? endif; ?>       
      		<? if( comments_open() ):?>
      	  <li class="comments">
      	    <? comments_popup_link( 'No Comments', 'One Comment', '# Comments' ); ?>
      	  </li>    
      	  <? endif; ?>
      	</ul>
      </footer>
    </article>
  <? endwhile; ?>

  <div class="pagination">
    <? if ( $wp_query->max_num_pages > 1 ) : ?>
        <? next_posts_link('&laquo; Older'); ?>
        <? previous_posts_link('Newer &raquo;'); ?>
    <? endif; ?>
  </div>
</div>

<div class="right_column">
  <? get_sidebar(); ?>
</div>        
<div class="clear"></div>

<? get_footer(); ?>