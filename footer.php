  <!-- Begin footer.php -->
  </section>                                                                                                                                                        
  <footer class="main">                             
    <div class="copyright">
      &copy; <?= date('Y'); ?> <? bloginfo('name'); ?>
    </div>
    <div class="social">
      <a href="<? the_field('facebook_link', 'options'); ?>" class="facebook">Facebook</a>
      <a href="<? the_field('twitter_link', 'options'); ?>" class="twitter">Twitter</a>
      <a href="<? the_field('youtube_link', 'options'); ?>" class="youtube">YouTube</a>
    </div>
  </footer>                      
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/javascripts/jquery.cycle.js" type="text/javascript"></script>  
  <script src="<?php bloginfo( 'stylesheet_directory' ); ?>/javascripts/theroost.js" type="text/javascript"></script>  
</body>                                                                                             
</html>