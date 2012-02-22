<?
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'nav-menus' );
  add_theme_support( 'editor_style' );
}

function theroost_register_menus() {
  register_nav_menus( array( 'header-menu' => __( 'Header Menu' ) ) );
}
add_action( 'init', 'theroost_register_menus' );

function theroost_tinymce_css($wp) {
  $wp .= ',/wp-content/themes/theroost/stylesheets/css/screen.css';
  return $wp;
}
add_filter( 'mce_css', 'theroost_tinymce_css' );

function image_tag($src, $width, $height, $crop = false){
  $crop ? $crop = "&amp;cropratio=$width:$height" : '';

  return "/wp-content/image.php?width=$width&amp;height=$height$crop&amp;image=" . $src;
}

function slug($str) {
  $str = strtolower(trim($str));
  $str = preg_replace('/[^a-z0-9-]/', '-', $str);
  $str = preg_replace('/-+/', "-", $str);
  return $str;
}               

if ( function_exists('register_sidebar') ){
  register_sidebar();
}
    
?>