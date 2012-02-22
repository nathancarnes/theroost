<? get_header(); ?>
<div class="left_column">
<? if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article <? post_class(); ?> id="post-<? the_ID(); ?>">
    <header>
      <h2><? the_title(); ?></h2>
      <div class="date"><? the_date(); ?></div>  
    </header>
    <section class="excerpt">
      <? the_content(); ?>
    </section>
    <footer>
      <ul>
    	  <? if ( count( get_the_category() ) ) : ?>
    	    <li class="categories">Filed under <?= get_the_category_list( ', ' ); ?></li>   
    		<? endif; ?>
    		<? if ( get_the_tag_list( '' ) ): ?>      
    	    <li class="tags">Taggged <?= get_the_tag_list( '', ', ' ); ?></li>
    		<? endif; ?>       
    	</ul>
    </footer>
  </article>

  <? comments_template( '', true ); ?>
<? endwhile; // end of the loop. ?>   
</div>

<div class="right_column">
  <? get_sidebar(); ?>
</div>
<div class="clear"></div>
<? get_footer(); ?>