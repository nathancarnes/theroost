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
      
/* Begin Post Types */
register_post_type('events', array(	'label' => 'Events','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'supports' => array('title','editor','custom-fields','thumbnail',),'labels' => array (
  'name' => 'Events',
  'singular_name' => 'Event',
  'menu_name' => 'Events',
  'add_new' => 'Add Event',
  'add_new_item' => 'Add New Event',
  'edit' => 'Edit',
  'edit_item' => 'Edit Event',
  'new_item' => 'New Event',
  'view' => 'View Event',
  'view_item' => 'View Event',
  'search_items' => 'Search Events',
  'not_found' => 'No Events Found',
  'not_found_in_trash' => 'No Events Found in Trash',
  'parent' => 'Parent Event',
),) );

register_post_type('artists', array(	'label' => 'Artists','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'supports' => array('title','custom-fields',),'labels' => array (
  'name' => 'Artists',
  'singular_name' => 'Artist',
  'menu_name' => 'Artists',
  'add_new' => 'Add Artist',
  'add_new_item' => 'Add New Artist',
  'edit' => 'Edit',
  'edit_item' => 'Edit Artist',
  'new_item' => 'New Artist',
  'view' => 'View Artist',
  'view_item' => 'View Artist',
  'search_items' => 'Search Artists',
  'not_found' => 'No Artists Found',
  'not_found_in_trash' => 'No Artists Found in Trash',
  'parent' => 'Parent Artist',
),) );   
/* End Post Types */

/* Begin ACF */
/**
 * Activate Add-ons
 * Here you can enter your activation codes to unlock Add-ons to use in your theme. 
 * Since all activation codes are multi-site licenses, you are allowed to include your key in premium themes. 
 * Use the commented out code to update the database with your activation code. 
 * You may place this code inside an IF statement that only runs on theme activation.
 */ 
if(!get_option('acf_options_ac')) update_option('acf_options_ac', "OPN8-FA4J-Y2LW-81LS");
// if(!get_option('acf_flexible_content_ac')) update_option('acf_flexible_content_ac', "xxxx-xxxx-xxxx-xxxx");


/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */
if(function_exists("register_field_group"))
{
register_field_group(array (
  'title' => 'Artist Info',
  'fields' => 
  array (
    0 => 
    array (
      'label' => 'Website',
      'name' => 'artist_website',
      'type' => 'text',
      'default_value' => '',
      'formatting' => 'none',
      'instructions' => 'Ex: http://example.com',
      'required' => '0',
      'key' => 'field_4f3f192cec03b',
      'order_no' => '0',
    ),
    1 => 
    array (
      'label' => 'Blurb',
      'name' => 'artist_blurb',
      'type' => 'textarea',
      'default_value' => '',
      'formatting' => 'br',
      'instructions' => '',
      'required' => '0',
      'key' => 'field_4f3f192cec3c3',
      'order_no' => '1',
    ),
    2 => 
    array (
      'label' => 'Small Photo',
      'name' => 'artist_small_photo',
      'type' => 'image',
      'save_format' => 'url',
      'preview_size' => 'thumbnail',
      'instructions' => 'Used for homepage features; should be 300 pixels x 150 pixels',
      'required' => '0',
      'key' => 'field_4f3f192cec6a5',
      'order_no' => '2',
    ),
    3 => 
    array (
      'label' => 'Medium Photo',
      'name' => 'artist_medium_photo',
      'type' => 'image',
      'save_format' => 'url',
      'preview_size' => 'thumbnail',
      'instructions' => 'Used for upcoming events; should be 480 pixels x 360 pixels',
      'required' => '0',
      'key' => 'field_4f3f192cec988',
      'order_no' => '3',
    ),
  ),
  'location' => 
  array (
    'rules' => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'artists',
        'order_no' => '0',
      ),
    ),
    'allorany' => 'all',
  ),
  'options' => 
  array (
    'position' => 'normal',
    'layout' => 'no_box',
    'show_on_page' => 
    array (
    ),
  ),
  'menu_order' => 0,
));

register_field_group(array (
  'title' => 'Event Info',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_4f3f1ac6ca482',
      'label' => 'Artists',
      'name' => 'event_artists',
      'type' => 'post_object',
      'post_type' => 
      array (
        0 => 'artists',
      ),
      'taxonomy' => 
      array (
        0 => 'all',
      ),
      'allow_null' => '0',
      'multiple' => '1',
      'instructions' => '',
      'required' => '1',
      'order_no' => '0',
    ),
    1 => 
    array (
      'key' => 'field_4f3f1a051d676',
      'label' => 'RVSP Link',
      'name' => 'event_rvsp_link',
      'type' => 'text',
      'default_value' => '',
      'formatting' => 'html',
      'instructions' => '',
      'required' => '0',
      'order_no' => '1',
    ),
    2 => 
    array (
      'key' => 'field_4f3f1ac6c9bfa',
      'label' => 'Date',
      'name' => 'event_date',
      'type' => 'date_picker',
      'date_format' => 'yy-mm-dd',
      'instructions' => '',
      'required' => '1',
      'order_no' => '2',
    ),
    3 => 
    array (
      'key' => 'field_4f3f1ac6c9886',
      'label' => 'Time',
      'name' => 'event_time',
      'type' => 'text',
      'default_value' => '8pm',
      'formatting' => 'none',
      'instructions' => 'Example: 8pm',
      'required' => '1',
      'order_no' => '3',
    ),
    4 => 
    array (
      'key' => 'field_4f3f1ac6c9ee6',
      'label' => 'Price',
      'name' => 'event_price',
      'type' => 'text',
      'default_value' => '',
      'formatting' => 'none',
      'instructions' => '',
      'required' => '0',
      'order_no' => '4',
    ),
    5 => 
    array (
      'key' => 'field_4f3f1ac6ca1ee',
      'label' => 'All Ages?',
      'name' => 'event_all_ages',
      'type' => 'true_false',
      'message' => '',
      'instructions' => '',
      'required' => '0',
      'order_no' => '5',
    ),
    6 => 
    array (
      'key' => 'field_4f3f1bc2b1807',
      'label' => 'Medium Photo',
      'name' => 'event_medium_photo',
      'type' => 'image',
      'save_format' => 'url',
      'preview_size' => 'full',
      'instructions' => 'Used for Events page. Should be 480 pixels x 360 pixels.',
      'required' => '0',
      'order_no' => '6',
    ),
    7 => 
    array (
      'key' => 'field_4f3f19e6df602',
      'label' => 'Banner Photo',
      'name' => 'event_banner_photo',
      'type' => 'image',
      'save_format' => 'url',
      'preview_size' => 'full',
      'instructions' => 'Used for home banners; should be 920 pixels x 360 pixels',
      'required' => '0',
      'order_no' => '7',
    ),
  ),
  'location' => 
  array (
    'rules' => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'events',
        'order_no' => '0',
      ),
    ),
    'allorany' => 'all',
  ),
  'options' => 
  array (
    'position' => 'normal',
    'layout' => 'no_box',
    'show_on_page' => 
    array (
    ),
  ),
  'menu_order' => 0,
));


register_field_group(array (
  'title' => 'Options',
  'fields' => 
  array (
    0 => 
    array (
      'label' => 'Facebook Link',
      'name' => 'facebook_link',
      'type' => 'text',
      'default_value' => '',
      'formatting' => 'none',
      'instructions' => '',
      'required' => '0',
      'key' => 'field_4f4578490cdc2',
      'order_no' => '0',
    ),
    1 => 
    array (
      'label' => 'YouTube Link',
      'name' => 'youtube_link',
      'type' => 'text',
      'default_value' => '',
      'formatting' => 'none',
      'instructions' => '',
      'required' => '0',
      'key' => 'field_4f4578490d22a',
      'order_no' => '1',
    ),
    2 => 
    array (
      'label' => 'Twitter Link',
      'name' => 'twitter_link',
      'type' => 'text',
      'default_value' => '',
      'formatting' => 'html',
      'instructions' => '',
      'required' => '0',
      'key' => 'field_4f4578490d5c9',
      'order_no' => '2',
    ),
  ),
  'location' => 
  array (
    'rules' => 
    array (
      0 => 
      array (
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'Options',
        'order_no' => '0',
      ),
    ),
    'allorany' => 'all',
  ),
  'options' => 
  array (
    'position' => 'normal',
    'layout' => 'default',
    'show_on_page' => 
    array (
      0 => 'the_content',
      1 => 'custom_fields',
      2 => 'discussion',
      3 => 'comments',
      4 => 'slug',
      5 => 'author',
    ),
  ),
  'menu_order' => 0,
));

register_field_group(array (
  'title' => 'Sidebar',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_4f457bd143257',
      'label' => 'Sidebar',
      'name' => 'sidebar',
      'type' => 'wysiwyg',
      'toolbar' => 'basic',
      'media_upload' => 'yes',
      'instructions' => '',
      'required' => '0',
      'order_no' => '0',
    ),
  ),
  'location' => 
  array (
    'rules' => 
    array (
      0 => 
      array (
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'default',
        'order_no' => '0',
      ),
      1 => 
      array (
        'param' => 'page',
        'operator' => '!=',
        'value' => '5',
        'order_no' => '1',
      ),
      2 => 
      array (
        'param' => 'page',
        'operator' => '!=',
        'value' => '9',
        'order_no' => '2',
      ),
      3 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'page',
        'order_no' => '3',
      ),
    ),
    'allorany' => 'all',
  ),
  'options' => 
  array (
    'position' => 'normal',
    'layout' => 'no_box',
    'show_on_page' => 
    array (
      0 => 'the_content',
      1 => 'slug',
    ),
  ),
  'menu_order' => 0,
));

register_field_group(array (
  'title' => 'Homepage Info',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_4f457e0970450',
      'label' => 'Tagline',
      'name' => 'tagline',
      'type' => 'text',
      'default_value' => 'We are an independently run
music venue that showcases artists in the intimacy
of a living room.',
      'formatting' => 'html',
      'instructions' => '',
      'required' => '0',
      'order_no' => '0',
    ),
    1 => 
    array (
      'key' => 'field_4f457e0970874',
      'label' => 'Featured Events',
      'name' => 'featured_events',
      'type' => 'relationship',
      'post_type' => 
      array (
        0 => 'events',
      ),
      'taxonomy' => 
      array (
        0 => 'all',
      ),
      'max' => '10',
      'instructions' => '',
      'required' => '1',
      'order_no' => '1',
    ),
    2 => 
    array (
      'key' => 'field_4f457e0970c19',
      'label' => 'Featured Artists',
      'name' => 'featured_artists',
      'type' => 'relationship',
      'post_type' => 
      array (
        0 => 'artists',
      ),
      'taxonomy' => 
      array (
        0 => 'all',
      ),
      'max' => '3',
      'instructions' => '',
      'required' => '1',
      'order_no' => '2',
    ),
  ),
  'location' => 
  array (
    'rules' => 
    array (
      0 => 
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '5',
        'order_no' => '0',
      ),
    ),
    'allorany' => 'all',
  ),
  'options' => 
  array (
    'position' => 'normal',
    'layout' => 'no_box',
    'show_on_page' => 
    array (
      0 => 'slug',
    ),
  ),
  'menu_order' => 0,
));

register_field_group(array (
  'title' => 'Event Page',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_4f4713b884c1f',
      'label' => 'Featured Events',
      'name' => 'featured_events',
      'type' => 'relationship',
      'post_type' => 
      array (
        0 => 'events',
      ),
      'taxonomy' => 
      array (
        0 => 'all',
      ),
      'max' => '',
      'instructions' => '',
      'required' => '0',
      'order_no' => '0',
    ),
  ),
  'location' => 
  array (
    'rules' => 
    array (
      0 => 
      array (
        'param' => 'page',
        'operator' => '==',
        'value' => '9',
        'order_no' => '0',
      ),
    ),
    'allorany' => 'all',
  ),
  'options' => 
  array (
    'position' => 'normal',
    'layout' => 'default',
    'show_on_page' => 
    array (
    ),
  ),
  'menu_order' => 0,
));
}
/* End ACF */
    
?>
