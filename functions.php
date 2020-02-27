<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';


//ADD FONTS and VCU Brand Bar
add_action('wp_enqueue_scripts', 'alt_lab_scripts');
function alt_lab_scripts() {
	$query_args = array(
		'family' => 'Roboto:300,400,700|Old+Standard+TT:400,700|Oswald:400,500,700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style ( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_script( 'vcu_brand_bar', 'https:///branding.vcu.edu/bar/academic/latest.js', array(), '1.1.1', true );

	wp_enqueue_script( 'alt_lab_js', get_template_directory_uri() . '/js/alt-lab.js', array(), '1.1.1', true );
    }

//add footer widget areas
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left',
    'id' => 'footer-far-left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium left',
    'id' => 'footer-med-left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium right',
    'id' => 'footer-med-right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far right',
    'id' => 'footer-far-right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

//set a path for IMGS

  if( !defined('THEME_IMG_PATH')){
   define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/imgs/' );
  }


function bannerMaker(){
	global $post;
	 if ( get_the_post_thumbnail_url( $post->ID ) ) {
      //$thumbnail_id = get_post_thumbnail_id( $post->ID );
      $thumb_url = get_the_post_thumbnail_url($post->ID);
      //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        return '<div class="jumbotron custom-header-img" style="background-image:url('. $thumb_url .')"></div>';

    } 
}

/*
*
*
*ACF FRONT
*
*/
function alt_lab_lab_faculty_content($content) {
  global $post;
      if ($post->post_type == 'faculty') {
        $content = $content . alt_lab_lab_faculty_data($post);
      }
        return $content;
      }
  // add_filter('the_content', 'alt_lab_lab_faculty_content');
  
  
  function alt_lab_lab_faculty_data(){
    global $post;
    $post_id = $post->ID;
    $content = '<div class="lab-faculty-data" id="lab-faculty-holder">';
    $title = get_field('title', $post_id);
    $expertise = get_field('area_of_expertise', $post_id);
    $location = get_field('location', $post_id);
    $phone = get_field('phone', $post_id);
    $email = get_field('email', $post_id);
    $website_url = get_field('website_url', $post_id);
    $website_title = get_field('website_title', $post_id);
    if ($title){
      $content .= '<div class="lab-row"><div class="lab-label lab-title-label">Title:</div><div class="lab-content lab-title-content">' . $title . '</div></div>';
    } 
    if ($expertise){
      $content .= '<div class="lab-row"><div class="lab-label lab-expertise-label">Expertise:</div><div class="lab-content lab-expertise-content">' . $expertise . '</div></div>';
    } 
     if ($location){
      $content .= '<div class="lab-row"><div class="lab-label lab-location-label">Location:</div><div class="lab-content lab-location-content">' . $location . '</div></div>';
    } 
     if ($phone){
      $content .= '<div class="lab-row"><div class="lab-label lab-phone-label">Phone:</div><div class="lab-content lab-phone-content">' . $phone . '</div></div>';
    } 
    if ($email){
      $content .= '<div class="lab-row"><div class="lab-label lab-email-label">Email:</div><div class="lab-content lab-email-content"><a href="mailto:'.$email.'">' . $email . '</a></div></div>';
    }
    if ($website_url){
      $content .= '<div class="lab-row"><div class="lab-label lab-website-label">Website:</div><div class="lab-content lab-website-content"><a href="' . $website_url . '">' . $website_title . '</a></div></div>';
    }
    return $content . '</div>';
  }
  
  
  add_shortcode( 'faculty-info', 'alt_lab_lab_faculty_data' );
  
function showFaculty(){
  $args = array(
    'posts_per_page' => -1,
    'post_type'   => 'faculty', 
    'post_status' => 'publish', 
    'order' => 'ASC',
    'orderby' => 'name',
    );
  // $html = '';
  $content = '<div class="about-us-grid" id="lab-faculty-holder">';
  $the_query = new WP_Query( $args );
  
                  if( $the_query->have_posts() ): 
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                          global $post;
                          $post_id = $post->ID;
                          $title = get_field('title', $post_id);
                          $expertise = get_field('area_of_expertise', $post_id);
                          $courses = get_field('courses_taught', $post_id);
                          $location = get_field('location', $post_id);
                          $phone = get_field('phone', $post_id);
                          $email = get_field('email', $post_id);
                          $website_url = get_field('website_url', $post_id);
                          $website_title = get_field('website_title', $post_id);

                          $content .= '<div class="card">';
                            if ($post_id){
                              $content .= '<div class="lab-row"><div class="card-img-top">' . get_the_post_thumbnail() . '</div></div>';
                            }
                              $content .= '<div class="card-body card-info">';
                                if ($post_id){
                                  $content .= '<div class="lab-row"><div class="card-title">' . get_the_title() . '</div></div>';
                                }
                                if ($title){
                                  $content .= '<div class="lab-row"><div class="lab-content lab-title-content">' . $title . '</div></div>';
                                } 
                                if ($expertise){
                                  $content .= '<div class="lab-row"><div class="lab-label lab-expertise-label">Expertise:</div><div class="lab-content lab-expertise-content">' . $expertise . '</div></div>';
                                } 
                                if ($courses){
                                  $content .= '<div class="lab-row"><div class="lab-label lab-location-label">Courses:</div><div class="lab-content lab-course-content">' . $courses . '</div></div>';
                                } 
                                if ($location){
                                  $content .= '<div class="lab-row"><div class="lab-label lab-location-label">Location:</div><div class="lab-content lab-location-content">' . $location . '</div></div>';
                                } 
                                if ($phone){
                                  $content .= '<div class="lab-row"><div class="lab-label lab-phone-label">Phone:</div><div class="lab-content lab-phone-content">' . $phone . '</div></div>';
                                } 
                                if ($email){
                                  $content .= '<div class="lab-row"><div class="lab-label lab-email-label">Email:</div><div class="lab-content lab-email-content"><a href="mailto:'.$email.'">' . $email . '</a></div></div>';
                                }
                                if ($website_url){
                                  $content .= '<div class="lab-row"><div class="lab-label lab-website-label">Research link:</div><div class="lab-content lab-website-content"><a href="' . $website_url . '">' . $website_title . '</a></div></div>';
                                }
                              $content .= '</div>';
                          $content .= '</div>';
                        // return $content . '</div>';
                    endwhile;
                  endif;
    wp_reset_query();  // Restore global post data stomped by the_post().
  return $content;
  }
  
  /*
  *
  *
  *ACF FOUNDATION
  *
  */
  
  
   
   //ACF JSON SAVER
    add_filter('acf/settings/save_json', 'alt_lab_lab_json_save_point');
     
    function alt_lab_lab_json_save_point( $path ) {
        
        // update path
        $path = plugin_dir_path(__FILE__) . '/acf-json';
        
        // return
        return $path;
        
    }
  
    //ACF JSON LOADER
    add_filter('acf/settings/load_json', 'alt_lab_lab_acf_json_load_point');
  
    function alt_lab_lab_acf_json_load_point( $paths ) {
        
        // remove original path (optional)
        unset($paths[0]);    
        
        // append path
        $path = plugin_dir_path(__FILE__) . '/acf-json';
        
        // return
        return $paths;
        
    }
  
  
  /*
  *
  *
  *CUSTOM POST TYPES
  *
  */
  
  // Register Custom Post Type faculty
  // Post Type Key: faculty
  function create_faculty_cpt() {
  
    $labels = array(
      'name' => __( 'Faculty', 'Post Type General Name', 'textdomain' ),
      'singular_name' => __( 'Faculty', 'Post Type Singular Name', 'textdomain' ),
      'menu_name' => __( 'Faculty', 'textdomain' ),
      'name_admin_bar' => __( 'Faculty', 'textdomain' ),
      'archives' => __( 'Faculty Archives', 'textdomain' ),
      'attributes' => __( 'Faculty Attributes', 'textdomain' ),
      'parent_item_colon' => __( 'Parent faculty:', 'textdomain' ),
      'all_items' => __( 'All faculty', 'textdomain' ),
      'add_new_item' => __( 'Add New Faculty', 'textdomain' ),
      'add_new' => __( 'Add New', 'textdomain' ),
      'new_item' => __( 'New Faculty', 'textdomain' ),
      'edit_item' => __( 'Edit Faculty', 'textdomain' ),
      'update_item' => __( 'Update Faculty', 'textdomain' ),
      'view_item' => __( 'View Faculty', 'textdomain' ),
      'view_items' => __( 'View Faculty', 'textdomain' ),
      'search_items' => __( 'Search Faculty', 'textdomain' ),
      'not_found' => __( 'Not found', 'textdomain' ),
      'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
      'featured_image' => __( 'Featured Image', 'textdomain' ),
      'set_featured_image' => __( 'Set featured image', 'textdomain' ),
      'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
      'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
      'insert_into_item' => __( 'Insert into faculty', 'textdomain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this faculty', 'textdomain' ),
      'items_list' => __( 'faculty list', 'textdomain' ),
      'items_list_navigation' => __( 'faculty list navigation', 'textdomain' ),
      'filter_items_list' => __( 'Filter faculty list', 'textdomain' ),
    );
    $args = array(
      'label' => __( 'faculty', 'textdomain' ),
      'description' => __( 'the great people we work with', 'textdomain' ),
      'labels' => $labels,
      'menu_icon' => '',
      'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
      'taxonomies' => array(),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'can_export' => true,
      'has_archive' => true,
      'hierarchical' => false,
      'exclude_from_search' => false,
      'show_in_rest' => true,
      'publicly_queryable' => true,
      'capability_type' => 'post',
      'menu_icon' => 'dashicons-universal-access-alt',
    );
    register_post_type( 'faculty', $args );
    
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
  }
  add_action( 'init', 'create_faculty_cpt', 0 );  
