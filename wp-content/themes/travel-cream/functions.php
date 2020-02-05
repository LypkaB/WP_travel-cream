<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'tc_setup' ) ) :
	function tc_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'travelcream' )
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
		) );
		
		// Add thumbnail size 
		/* 
			add_image_size( 'desktop', 1920 ); 
			add_image_size( 'tablet', 900 ); 
			add_image_size( 'mobile', 640 ); 
		*/
	}
endif; 
add_action( 'after_setup_theme', 'tc_setup' );

/**
 * Register widget area.
 */
function tc_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'travelcream' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'travelcream' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tc_widgets_init' );

/**
 * JavaScript Detection.
 */
function tc_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'tc_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function tc_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'travelcream-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'travelcream-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );

	tc_viewport();
}
add_action( 'wp_enqueue_scripts', 'tc_scripts' );


// Determining the type of device
function tc_viewport() {
	require_once 'inc/mobile_detect.php';

	global $tc;
	$detect = new Mobile_Detect;
	
	// check device
	if( $detect->isTablet() ){
		$tc['device'] = 'tablet';
	} else if ( $detect->isMobile() ) {
		$tc['device'] = 'mobile';
	} else {
		$tc['device'] = 'desktop';
	}
	
	// set image size
	$tc['image-size'] = $tc['device'];

	// check is retina device
	$tc['retina'] = ( $detect->is('iOS') ) ? true : false;
	
	wp_localize_script( 'travelcream-script', 'tc', array(
		'retina' => $tc['retina'],
		'mobile' => ( $tc['device'] == "mobile" ) ? true : false,
	) );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';