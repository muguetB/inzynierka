<?php 
/**
* Ładowanie CSS i JS
*/
function load_styles_and_scripts() {
  
  // loading CSS
  wp_enqueue_style(
      'bootstrap-styles',
      'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'
  );

  wp_enqueue_style(
      'font-awesome',
      'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'
    );

  wp_enqueue_style(
      'main-styles',
      get_template_directory_uri().'/style.css'
  );

  // loading bootstrap js
  wp_enqueue_script(
    'bootstrap-js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js',
    false,
    '3.2.0',
    true
  );
    
  // loading js
  wp_enqueue_script(
    'jquery',
    'http://code.jquery.com/jquery.min.js',
    false,
    '1.11.1',
    true
  );
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');


/**
* Uruchamianie górnego i dolnego menu na stronie
**/
register_nav_menus(array(

    'main-nav' => 'Gorne menu strony'

));

register_nav_menus(array(

    'footer-nav' => 'Menu w stopce'

));

/**
 * Tworzenie sidebara
 */
register_sidebar ( array(
  'name'          => 'main-sidebar',
  'description'   => 'Pasek boczny',
  'before_widget' => '<div class="col-md-12"><div class="panel panel-default no-corners">',
  'after_widget'  => '</div></div></div>',
  'before_title'  => '<div class="panel-heading"><h3 class="panel-title">',
  'after_title'   => '</h3></div><div class="panel-body">'
));

register_sidebar ( array(
  'name'          => 'languages',
  'description'   => 'Widget z zmiana jezykow',
));

/**
 * Włączenie wspierania miniaturek postów
 */
add_theme_support( 'post-thumbnails');

function add_image_class($class){
    $class .= ' additional-class';
    return $class;
}
add_filter('get_image_tag_class','add_image_class');


/**
 * Templatka wyglądu pola komentarzy
 */
function comments_feed_template_callback($comment, $args, $depth) {

  $GLOBAL['comment'] = $comment;

  ?>
    <div class="media">
      <a href="<?php get_comment_author_url(); ?>" class="pull-left">
        <!--<?php echo get_avatar( get_the_author_meta( 'user_email' ), $size = '96', $default = '', $alt = false ) ?> -->
      </a>
      <div class="media-body">
        <h5 class="media-heading">
          <a href="<?php get_comment_author_url(); ?>"><?php echo get_comment_author(); ?></a>
          <small><?php comment_date(); ?> o <?php comment_time(); ?></small>
        </h5>
        <?php comment_text(); ?>
        <?php comment_reply_link(array_merge($args, array(
          'reply_text' => __('<strong>Odpowiedz </strong><i class="icon-share-alt"></i>'),
          'depth' => $depth,
          'max_depth' => $args['max_depth']
        ))); ?>
      </div>
    </div>
    <hr>
  <?php
}

if ( ! function_exists( 'pwr_branding' ) ) :
function pwr_branding() {
  if ( get_theme_mod('site_logo') && get_theme_mod('logo_style', 'hide-title') == 'hide-title' ) :
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>';
  elseif ( get_theme_mod('logo_style', 'hide-title') == 'show-title' ) : //Show logo, site-title, site-description
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr(get_bloginfo('name')) . '"><img class="site-logo show-title" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></a>';
    echo '<h2><a class="pwr" href="' . esc_url(home_url( '/' )) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h2>';
    echo '<h4 class="pwr2">' . esc_html(get_bloginfo( 'description' )) . '</h4>';      
  else : //Show only site title and description
    echo '<h2><a class="pwr" href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a></h2>';
    echo '<h4 class="pwr2">' . esc_html(get_bloginfo( 'description' )) . '</h4>';
  endif;
}
endif;

/**
 * filtry 
 */

//Przycisk dla odpowiedzi w komentarzu
add_filter('comment_reply_link', 'add_reply_link_class');

function add_reply_link_class($class) {
  $class = str_replace("class='comment-reply-link", "class='btn btn-default pull-right", $class);
  return $class;
}

/**
 * Extended Walker class for use with the
 * Twitter Bootstrap toolkit Dropdown menus in Wordpress.
 * Edited to support n-levels submenu.
 * @author johnmegahan https://gist.github.com/1597994, Emanuele 'Tex' Tessore https://gist.github.com/3765640
 */
class BootstrapNavMenuWalker extends Walker_Nav_Menu {
 
 
  function start_lvl( &$output, $depth ) {
 
    $indent = str_repeat( "\t", $depth );
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output    .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
 
  }
 
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
 
 
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
    $li_attributes = '';
    $class_names = $value = '';
 
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
    // managing divider: add divider class to an element to get a divider before it.
    $divider_class_position = array_search('divider', $classes);
    if($divider_class_position !== false){
      $output .= "<li class=\"divider\"></li>\n";
      unset($classes[$divider_class_position]);
    }
    
    $classes[] = ($args->has_children) ? 'dropdown' : '';
    $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
    $classes[] = 'menu-item-' . $item->ID;
    if($depth && $args->has_children){
      $classes[] = 'dropdown-submenu';
    }
 
 
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';
 
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
    $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
 
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ($args->has_children)      ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
 
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
    $item_output .= $args->after;
 
 
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  
 
  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
    //v($element);
    if ( !$element )
      return;
 
    $id_field = $this->db_fields['id'];
 
    //display this element
    if ( is_array( $args[0] ) )
      $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
    else if ( is_object( $args[0] ) )
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    $cb_args = array_merge( array(&$output, $element, $depth), $args);
    call_user_func_array(array(&$this, 'start_el'), $cb_args);
 
    $id = $element->$id_field;
 
    // descend only when the depth is right and there are childrens for this element
    if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
 
      foreach( $children_elements[ $id ] as $child ){
 
        if ( !isset($newlevel) ) {
          $newlevel = true;
          //start the child delimiter
          $cb_args = array_merge( array(&$output, $depth), $args);
          call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
        }
        $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
      }
      unset( $children_elements[ $id ] );
    }
 
    if ( isset($newlevel) && $newlevel ){
      //end the child delimiter
      $cb_args = array_merge( array(&$output, $depth), $args);
      call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
    }
 
    //end this element
    $cb_args = array_merge( array(&$output, $element, $depth), $args);
    call_user_func_array(array(&$this, 'end_el'), $cb_args);
 
  }
 
}

/**
 * PONIŻEJ, PÓKI CO NIE WAŻNE!
 */

/**
 * Moduł dodawania styli CSS podczas edycji postów
 */

//add_action('admin_menu', 'custom_css_hooks');
//
//add_action('save_post', 'save_custom_css');
//
//add_action('wp_head','insert_custom_css');
//
//function custom_css_hooks() {
//
//  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'post', 'normal', 'high');
//
//  add_meta_box('custom_css', 'Custom CSS', 'custom_css_input', 'page', 'normal', 'high');
//
//}
//
//function custom_css_input() {
//
//  global $post;
//
//  echo '<input type="hidden" name="custom_css_noncename" id="custom_css_noncename" value="'.wp_create_nonce('custom-css').'" />';
//
//  echo '<textarea name="custom_css" id="custom_css" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_custom_css',true).'</textarea>';
//
//}
//
//function save_custom_css($post_id) {
//
//  if (!wp_verify_nonce($_POST['custom_css_noncename'], 'custom-css')) return $post_id;
//
//  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
//
//  $custom_css = $_POST['custom_css'];
//
//  update_post_meta($post_id, '_custom_css', $custom_css);
//
//}
//
//function insert_custom_css() {
//
//  if (is_page() || is_single()) {
//
//    if (have_posts()) : while (have_posts()) : the_post();
//
//      echo '<style type="text/css">'.get_post_meta(get_the_ID(), '_custom_css', true).'</style>';
//
//    endwhile; endif;
//
//    rewind_posts();
//
//  }

/**
 * Filtr okrągłego obrazka w komentarzach
 */
//add_filter('get_avatar', 'add_avatar_class');
//
//function add_avatar_class($class) {
//  $class = str_replace("class='avatar", "class='img-circle", $class);
//  return $class;
//}


