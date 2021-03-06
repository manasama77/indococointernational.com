<?php

/**
 * accesspress_parallax functions and definitions
 *
 * @package accesspress_parallax
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( !function_exists( 'accesspress_parallax_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function accesspress_parallax_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on accesspress_parallax, use a find and replace
         * to change 'accesspress_parallax' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'accesspress-parallax', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        // Add Support WooCommerce
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        /**
         * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
         * @see http://codex.wordpress.org/Function_Reference/add_editor_style
         */
        add_editor_style( 'css/editor-style.css' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'blog-header', 900, 300, array( 'center', 'center' ) ); //blog Image
        add_image_size( 'portfolio-thumbnail', 560, 450, array( 'center', 'center' ) ); //Portfolio Image
        add_image_size( 'blog-thumbnail', 480, 300, array( 'center', 'center' ) ); //Blog Image	
        add_image_size( 'team-thumbnail', 380, 380, array( 'center', 'center' ) ); //Portfolio Image
        add_image_size( 'rect-wide-med', 600, 300, array( 'center', 'center' ) ); //Rectangle Wide
        add_image_size( 'rect-height-med', 400, 600, array( 'center', 'center' ) ); //Rectangle Height
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'accesspress-parallax' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ) );

        // Setup the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'accesspress_parallax_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }

endif; // accesspress_parallax_setup
add_action( 'after_setup_theme', 'accesspress_parallax_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_parallax_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'accesspress-parallax' ),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title"><span>',
        'after_title' => '</span></h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer One', 'accesspress-parallax' ),
        'id' => 'footer-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Two', 'accesspress-parallax' ),
        'id' => 'footer-2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Three', 'accesspress-parallax' ),
        'id' => 'footer-3',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Footer Four', 'accesspress-parallax' ),
        'id' => 'footer-4',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}

add_action( 'widgets_init', 'accesspress_parallax_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_parallax_scripts() {
    $query_args = array( 'family' => 'Roboto:400,300,500,700|Oxygen:400,300,700|Quicksand:400,500,600,700|Poppins:300,400,500,600
' );

    $slider_parameters = array(
        'accesspress_show_pager' => (!accesspress_parallax_of_get_option( 'show_pager' ) || accesspress_parallax_of_get_option( 'show_pager' ) == "yes") ? "true" : "false",
        'accesspress_show_controls' => (!accesspress_parallax_of_get_option( 'show_controls' ) || accesspress_parallax_of_get_option( 'show_controls' ) == "yes") ? "true" : "false",
        'accesspress_auto_transition' => (!accesspress_parallax_of_get_option( 'auto_transition' ) || accesspress_parallax_of_get_option( 'auto_transition' ) == "yes") ? "true" : "false",
        'accesspress_slider_transition' => accesspress_parallax_of_get_option( 'slider_transition' ) == "fade" ? "true" : "false",
        'accesspress_slider_speed' => (!accesspress_parallax_of_get_option( 'slider_speed' )) ? "1000" : accesspress_parallax_of_get_option( 'slider_speed' ),
        'accesspress_slider_pause' => (!accesspress_parallax_of_get_option( 'slider_pause' )) ? "5000" : accesspress_parallax_of_get_option( 'slider_pause' ),
    );


    wp_enqueue_style( 'accesspress-parallax-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/fontawesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css' );
    wp_enqueue_style( 'accesspress-parallax-woocommerce', get_template_directory_uri() . '/woocommerce/ap-parallax-style.css' );
    wp_enqueue_style( 'accesspress-parallax-style', get_stylesheet_uri() );
    wp_enqueue_style( 'accesspress-parallax-responsive', get_template_directory_uri() . '/css/responsive.css' );

    if ( accesspress_parallax_of_get_option( 'enable_animation' ) == '1' && is_front_page() ) :
        wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array( 'jquery' ), '1.0', true );
    endif;
    
    wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/js/jarallax.js', array( 'jquery' ), '1.1.3', true );
    wp_enqueue_script( 'scrollto', get_template_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.14', true );
    wp_enqueue_script( 'jquery-localscroll', get_template_directory_uri() . '/js/jquery.localScroll.min.js', array( 'jquery' ), '1.3.5', true );
    wp_enqueue_script( 'accesspress-parallax-parallax-nav', get_template_directory_uri() . '/js/jquery.nav.js', array( 'jquery' ), '2.2.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery'), '3.0.4', true ); 
    wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '2.0.3', true );
    wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array( 'jquery' ), '1.3', true );
    wp_enqueue_script( 'jquery-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'nivo-lightbox', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array( 'jquery' ), '1.2.0', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array( 'jquery' ), '1.8.0', true );
    wp_enqueue_script( 'accesspress-parallax-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0', true );
    wp_localize_script( 'accesspress-parallax-custom', 'ap_params', $slider_parameters );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'accesspress_parallax_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/accesspress-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/accesspress-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Customizer Options
 * */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load woocommerce function
 * */
require get_template_directory() . '/woocommerce/ap-parallax-woocommerce-function.php';

/**
 * Load Dynamic Styles
 * */
require get_template_directory() . '/css/style.php';


/**
 * Load Welcome Page
 * */
require get_template_directory() . '/welcome/welcome-config.php';

if ( !function_exists( 'accesspress_parallax_of_get_option' ) ) {

    function accesspress_parallax_of_get_option( $option, $default = '' ) {
        $accesspress_parallax_options = get_option( 'accesspress_parallax' );

        if ( isset( $accesspress_parallax_options[ $option ] ) ) {
            return $accesspress_parallax_options[ $option ];
        } else {
            return $default;
        }
    }

}