<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.xolluteon.com/
 * @since      1.0.0
 *
 * @package    Xox_Woo_Carousel
 * @subpackage Xox_Woo_Carousel/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Xox_Woo_Carousel
 * @subpackage Xox_Woo_Carousel/public
 * @author     Arung Isyadi <arungisyadi@outlook.com>
 */
class Xox_Woo_Carousel_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Xox_Woo_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Xox_Woo_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xox-woo-carousel-public.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'font-awesome/css/font-awesome.min.css', array(), '4.2.0', 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Xox_Woo_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Xox_Woo_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name . '_cycle', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.min.js', array( 'jquery' ), 2.0, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_caption2', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.caption2.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_carousel', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.carousel.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_center', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.center.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_flip', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.flip.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_ie-fade', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.ie-fade.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_scrollVert', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.scrollVert.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_shuffle', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.shuffle.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_swipe', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.swipe.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_tile', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.tile.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name . '_cycle_video', plugin_dir_url( __FILE__ ) . 'js/cycle/jquery.cycle2.video.min.js', array( $this->plugin_name . '_cycle' ),$this->version, false );
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xox-woo-carousel-public.js', array( 'jquery' ), $this->version, false );

	}
    
    public static function xoxslider( $atts ) {
        // Attributes
        extract( shortcode_atts(
            array(
                'name' => 'slider-xxx',
            ), $atts )
        );

        //$output = $name;
        $args = array(
            'posts_per_page' => 1,
            'name' => $name,
            'post_type' => 'xox-carousel-slider',
            'post_status' => "publish"
        );
        $slider = get_posts($args);
        if($slider){
            $sliderID = $slider[0]->ID;
        }

        //$output = $sliderID;
        $xtype = get_post_meta( $sliderID, '_xoxcs_radio_cs', true );
        $navigation = get_post_meta( $sliderID, '_xoxcs_nav_navigation', true );
        $pager = get_post_meta( $sliderID, '_xoxcs_nav_pager', true );
        $pager_type = get_post_meta( $sliderID, '_xoxcs_nav_pager_type', true );
        $pager_color = get_post_meta( $sliderID, '_xoxcs_nav_pager_color', true );
        $nav_color = get_post_meta( $sliderID, '_xoxcs_nav_navcolor', true );
        //$gprefix = $xtype == 'slider' ? '_xoxslider_' : '_xoxcarousel_';
        //$output = $gprefix;
        if( $xtype == 'slider' ){
            $genopts = self::sliderGeneralOPt( $sliderID );
            $dir = '/slider/';
            $slider_opts .= ' data-cycle-fx="' . $genopts['effect'] . '"';
            $slider_opts .= ' data-cycle-speed="' . $genopts['speed'] . '"';
            $slider_opts .= ' data-cycle-pause-on-hover="true"';
            $slider_opts .= ' data-cycle-loader="wait"';
            $slider_opts .= ' data-cycle-swipe="true"';
            $slider_opts .= ' data-cycle-swipe-fx="scrollHorz"';
        }elseif( $xtype == 'carousel' ){
            $genopts = self::carGeneralOpt( $sliderID );
            $dir = '/carousel/';
            $slider_opts .= ' data-cycle-fx="carousel"';
            $slider_opts .= ($genopts['scroll'] == 'vertical' ? ' data-cycle-carousel-vertical="true"' : '');
            $slider_opts .= ' data-cycle-timeout="' . $genopts['timeout'] . '"';
            $slider_opts .= ' data-cycle-carousel-visible="' . $genopts['visible'] . '"';
            $slider_opts .= ($genopts['scroll'] == 'vertical' ? '' : ' data-cycle-carousel-fluid="true"');
        }
        $slider_opts .= ' data-cycle-slides="div.item-'.$sliderID.'"';//set the one need to be slide
        $slider_opts .= ' data-cycle-prev=".prevNav-'.$sliderID.'"';
        $slider_opts .= ' data-cycle-next=".nextNav-'.$sliderID.'"';
        if($navigation == 'yes'){
            $prev_img = get_post_meta( $sliderID, '_xoxcs_nav_nav_prev_img', true );
            $next_img = get_post_meta( $sliderID, '_xoxcs_nav_nav_next_img', true );
            $default_prev = $prev_img != '' ? '<img src="'.$prev_img.'">' : '<i class="fa fa-chevron-left"></i>';
            $default_next = $next_img != '' ? '<img src="'.$next_img.'">' : '<i class="fa fa-chevron-right"></i>';
        }
        if($pager == 'yes'){
            $slider_opts .= ' data-cycle-pager=".item_pager-'.$sliderID.'"';
            if($pager_type == 'number'){
                $slider_opts .= ' data-cycle-pager-template="<strong><a href=# style=color: '.$pager_color.';> {{slideNum}} </a></strong>"';
            }elseif($pager_type == 'bullet'){
                $slider_opts .= ' data-cycle-pager-template="<strong><a href=# style=\'color: '.$pager_color.'\';> &bull; </a></strong>"';
            }
        }
        
        $background = ( $genopts['bgimage'] != '' ? ' background: url("'. $genopts['bgimage'] .'") repeat top left;' : '' );//background image
        $style = ' style="background-color: ' . $genopts['bgcolor'] .';'. $background .'"';//background stuffs
        
        $output .= '<div id="'. $genopts['bgimage'] .'" class="cycle-slideshow"'.$slider_opts.$style.'>'."\n";
        
        $dataType = get_post_meta( $sliderID, '_xox_group_source', true );
        //$catType = get_post_meta( $sliderID, '_xox_group_taxonomy_pcat', true );
        $loops = self::get_loop($dataType, $sliderID, $xtype); //echo $catType;
        if($loops && is_array($loops)){
            //var_dump($loops); 
            $template = 'includes/templates' . $dir . $genopts['template'] . '.php';
            include plugin_dir_path( dirname( __FILE__ ) ) . $template ;
        }
        
        $output .= "</div>\n";
        
        return $output;
    }
    
    private function sliderGeneralOpt($sliderID){
        $prefix = '_xoxslider_';
        $return = array();
        
        $return['effect'] = get_post_meta( $sliderID, $prefix . 'effect', true);
        $return['speed'] = get_post_meta( $sliderID, $prefix . 'speed', true);
        $return['template'] = get_post_meta( $sliderID, $prefix . 'template', true);
        $return['bgcolor'] = get_post_meta( $sliderID, $prefix . 'bgcolor', true);
        $return['bgimage'] = get_post_meta( $sliderID, $prefix . 'bgimage', true);
        
        return $return;

    }
    
    private function carGeneralOpt($sliderID){
        $prefix = '_xoxcarousel_';
        $return = array();
        
        $return['scroll'] = get_post_meta( $sliderID, $prefix . 'scroll', true);
        $return['timeout'] = get_post_meta( $sliderID, $prefix . 'timeout', true);
        $return['visible'] = get_post_meta( $sliderID, $prefix . 'visible', true);
        $return['template'] = get_post_meta( $sliderID, $prefix . 'template', true);
        $return['bgcolor'] = get_post_meta( $sliderID, $prefix . 'bgcolor', true);
        $return['bgimage'] = get_post_meta( $sliderID, $prefix . 'bgimage', true);
        
        return $return;

    }
    
    private function get_loop($dataType, $sliderID, $xtype){
        GLOBAL $woocommerce;
        $return = array();
        $thumb_size = $xtype == 'slider' ? 'full' : 'thumbnail';
        
        switch($dataType){
            case 'product_cat':
            
            $cat = get_terms( 'product_cat', 'orderby=id&hide_empty=1' );
            $num = count($cat);
            for($i = 0; $i < $num; $i++){
                $thumbnail_id = get_woocommerce_term_meta( $cat[$i]->term_id, 'thumbnail_id', true );
                
                $image_attributes = wp_get_attachment_image_src( $thumbnail_id, $thumb_size ); // returns an array
                $return[$i]['img'] = $image_attributes[0];
                $return[$i]['title'] = $cat[$i]->name;
                $return[$i]['text'] = $cat[$i]->description;
                $return[$i]['url'] = get_term_link($cat[$i]);
            }
            
            break;
            
            case 'products':
            
            //$cat = get_post_meta( $sliderID, '_xox_group_product_cat', true ); 
            $cat = get_post_meta( $sliderID, '_xox_group_taxonomy_pcat', true );
            $args = array(
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $cat,
                    ),
                ),
                //'product_cat' => $product_cat,
                'post_type' => 'product',
                'post_status' => 'publish',
                'orderby' => 'ID',
                'order' => 'DESC'
            );
            $my_product = get_posts($args);
            
            if( $my_product ){
                
                $num = count($my_product);
                for($i = 0; $i < $num; $i++){
                    $product_attr = self::get_product_attr($my_product[$i]->ID);
                    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($my_product[$i]->ID), $thumb_size ); // returns an array
                    $return[$i]['img'] = $image_attributes[0];
                    $return[$i]['title'] = $my_product[$i]->post_title;
                    $return[$i]['text'] = $my_product[$i]->post_excerpt;
                    $return[$i]['url'] = get_permalink($my_product[$i]->ID);
                    $return[$i]['price'] = $product_attr['regular_price'];
                }
            }
            
            break;
            
            case 'featured':
            
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'product',
                'meta_key' => '_featured',  
                'meta_value' => 'yes', 
                'post_status' => 'publish',
                'orderby' => 'ID',
                'order' => 'DESC'
            );
            $my_product = get_posts($args);
            
            if( $my_product ){
                
                $num = count($my_product);
                for($i = 0; $i < $num; $i++){
                    $product_attr = self::get_product_attr($my_product[$i]->ID);
                    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($my_product[$i]->ID), $thumb_size ); // returns an array
                    $return[$i]['img'] = $image_attributes[0];
                    $return[$i]['title'] = $my_product[$i]->post_title;
                    $return[$i]['text'] = $my_product[$i]->post_excerpt;
                    $return[$i]['url'] = get_permalink($my_product[$i]->ID);
                    $return[$i]['price'] = $product_attr['regular_price'];
                }
            }
            
            break;
            
            case 'custom':
            
            $custom = get_post_meta( $sliderID, '_xox_group_custom', true );
            if($custom){
                $num = count($custom);
                for($i = 0; $i < $num; $i++){
                    $return[$i]['img'] = $custom[$i]['image'];
                    $return[$i]['title'] = $custom[$i]['image_caption'];
                    //$return[$i]['text'] = $custom[$i][''];
                    $return[$i]['url'] = $custom[$i]['url'];
                }
            }
            
            break;
            
        }
        return $return;
    }
    
    private function get_product_attr($postID){
        GLOBAL $woocommerce;
        $return = array();
        $product = new WC_Product_Variable($postID);
        #Step 1: Get product varations
        $available_variations = $product->get_available_variations();

        #Step 2: Get product variation id
        $variation_id=$available_variations[0]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.

        #Step 3: Create the variable product object
        $variable_product1= new WC_Product_Variation( $variation_id );

        #Step 4: You have the data. Have fun :)
        $return['regular_price'] = get_post_meta( $postID, '_regular_price', true);
        
        return $return;
    }

}

// Add Shortcode

add_shortcode( 'xoxslider', array( 'Xox_Woo_Carousel_Public', 'xoxslider' ) );
