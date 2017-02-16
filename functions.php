<?php
/**
 * Asia Pacific Airways functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Asia_Pacific_Airways
 */


// ACF SUPPORT
// ACF PLUGIN
define( 'ACF_LITE', true );
include_once('advanced-custom-fields/acf.php');
include_once('acf-repeater/acf-repeater.php' );




if ( ! function_exists( 'asiapacificairways_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function asiapacificairways_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Asia Pacific Airways, use a find and replace
	 * to change 'asiapacificairways' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'asiapacificairways', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'asiapacificairways' ),
		'menu-2' => ('Footer Menu 1'),
		'menu-3' => ('Footer Menu 2'),
		'sitemap-1' => ('Sitemap 1'),
		'sitemap-2' => ('Sitemap 2'),
		'sitemap-3' => ('Sitemap 3'),
		'sitemap-4' => ('Sitemap 4'),
		'sitemap-5' => ('Sitemap 5'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'asiapacificairways_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'asiapacificairways_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function asiapacificairways_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'asiapacificairways_content_width', 640 );
}
add_action( 'after_setup_theme', 'asiapacificairways_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function asiapacificairways_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'asiapacificairways' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'asiapacificairways' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'asiapacificairways_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function asiapacificairways_scripts() {

	// Enqueue Styles
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet');

	wp_enqueue_style( 'asiapacificairways-style', get_stylesheet_uri() );

	wp_enqueue_style( 'zurb-foundation', get_template_directory_uri().'/css/foundation.css'); //FOUNDATION

	wp_enqueue_style( 'main-style', get_template_directory_uri().'/css/main-style.css');

	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/css/fa/css/font-awesome.min.css');

	if (is_front_page()) {
		wp_enqueue_style('oc-main', get_template_directory_uri().'/css/oc/owl.carousel.min.css');
		wp_enqueue_style('oc-theme', get_template_directory_uri().'/css/oc/owl.theme.default.min.css');
	}

	// Enqueue Scripts
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'asiapacificairways-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'asiapacificairways-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if (is_front_page()) {
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', false, false, true);
		wp_enqueue_script( 'front-page', get_template_directory_uri().'/js/front-page-specific.js', false, false, true);
	}

	wp_enqueue_script( 'main-script', get_template_directory_uri().'/js/main.js', false, false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'asiapacificairways_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/*
	==================================================
	Custom Post Types
	==================================================
*/

// Slider
function carousel_cpt() {
	$labels = array(
		'name' => 'Carousel',
		'singular_name' => 'Carousel Image',
		'all_items' => 'All Carousel Images',
		'add_new' => 'Add New Image',
		'add_new_item' => 'Add New Image',
		'edit_item' => 'Edit',
		'view_items' => 'View Images',
		'featured_image' => 'Image to Show',
		'set_featured_image' => 'Set Image',
		'remove_featured_image' => 'Remove Image'
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' =>  60,
		"menu_icon" => "dashicons-images-alt",
		'supports' => array(
			'title'
			)
		);
	register_post_type('carousel', $args);
}
add_action('init','carousel_cpt');

// Offers
function cptui_register_my_cpts_offers() {

	/**
	 * Post Type: Offers.
	 */

	$labels = array(
		"name" => __( 'Offers', 'asiapacificairways' ),
		"singular_name" => __( 'Offer', 'asiapacificairways' ),
		"menu_name" => __( 'Offers', 'asiapacificairways' ),
		"all_items" => __( 'All Offers', 'asiapacificairways' ),
		"add_new" => __( 'Add New', 'asiapacificairways' ),
		"add_new_item" => __( 'Add New Offer', 'asiapacificairways' ),
		"edit_item" => __( 'Edit Offer', 'asiapacificairways' ),
		"new_item" => __( 'New Offer', 'asiapacificairways' ),
		"view_item" => __( 'View Offer', 'asiapacificairways' ),
		"view_items" => __( 'View Offers', 'asiapacificairways' ),
		"search_items" => __( 'Search Offers', 'asiapacificairways' ),
		"not_found" => __( 'No offers found', 'asiapacificairways' ),
		"not_found_in_trash" => __( 'No offers found in trash', 'asiapacificairways' ),
		"archives" => __( 'Offers', 'asiapacificairways' ),
		"insert_into_item" => __( 'Insert into offer', 'asiapacificairways' ),
	);

	$args = array(
		"label" => __( 'Offers', 'asiapacificairways' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "offers", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-tag",
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "offers", $args );
}

add_action( 'init', 'cptui_register_my_cpts_offers' );


// Services

function cptui_register_my_cpts_services() {

	/**
	 * Post Type: Services.
	 */

	$labels = array(
		"name" => __( 'Services', 'asiapacificairways' ),
		"singular_name" => __( 'Service', 'asiapacificairways' ),
		"menu_name" => __( 'Services', 'asiapacificairways' ),
		"all_items" => __( 'All Services', 'asiapacificairways' ),
		"add_new" => __( 'Add New', 'asiapacificairways' ),
		"add_new_item" => __( 'Add New Service', 'asiapacificairways' ),
		"edit_item" => __( 'Edit Service', 'asiapacificairways' ),
		"new_item" => __( 'New Service', 'asiapacificairways' ),
		"view_item" => __( 'View Service', 'asiapacificairways' ),
		"view_items" => __( 'View Services', 'asiapacificairways' ),
		"search_items" => __( 'Search Service', 'asiapacificairways' ),
		"archives" => __( 'Air Charter & Cargo Services', 'asiapacificairways' ),
		"insert_into_item" => __( 'Insert into service', 'asiapacificairways' ),
		"uploaded_to_this_item" => __( 'Uploaded to this service', 'asiapacificairways' ),
		"filter_items_list" => __( 'Filter services list', 'asiapacificairways' ),
	);

	$args = array(
		"label" => __( 'Services', 'asiapacificairways' ),
		"labels" => $labels,
		"description" => "Air Charter & Cargo Services",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "services", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 6,
		"menu_icon" => "dashicons-thumbs-up",
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
	);

	register_post_type( "services", $args );
}

add_action( 'init', 'cptui_register_my_cpts_services' );




/*
	==================================================
	Site Options
	==================================================
*/

// Display Paragraph
function apa_fp_dp($wp_customize) {
	// add section
	$wp_customize->add_section('apa_fp_dp_section', array(
		'title' => 'Front Page Text'
		));

	// add text setting
	$wp_customize->add_setting('apa_fp_dp_text', array(
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae esse aut obcaecati nam labore eaque.'
		));

	// add text control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_dp_text_control', array(
		'label' => 'Content',
		'section' => 'apa_fp_dp_section',
		'settings' => 'apa_fp_dp_text',
		'type' => 'textarea'
		)));

	// add link setting
	$wp_customize->add_setting('apa_fp_dp_link', array(
		'default' => '#'
		));

	// add link control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_dp_link_control', array(
		'label' => 'Link (URL)',
		'section' => 'apa_fp_dp_section',
		'settings' => 'apa_fp_dp_link',
		'type' => 'text'
		)));
}
add_action('customize_register','apa_fp_dp');

// Callout 1
function apa_fp_callout1($wp_customize) {
	// add section
	$wp_customize->add_section('apa_fp_callout1_section', array(
		'title' => 'Callout 1'
		));

	// add headline setting
	$wp_customize->add_setting('apa_fp_callout1_headline', array(
		'default' => 'Callout 1 Headline'
		));

	// add headline control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout1_headline_control', array(
		'label' => 'Heading',
		'section' => 'apa_fp_callout1_section',
		'settings' => 'apa_fp_callout1_headline',
		'type' => 'text'
		)));

	// add text setting
	$wp_customize->add_setting('apa_fp_callout1_text', array(
		'default' => 'Sample text'
		));

	// add text control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout1_text_control', array(
		'label' => 'Content',
		'section' => 'apa_fp_callout1_section',
		'settings' => 'apa_fp_callout1_text',
		'type' => 'textarea'
		)));

	// add image setting
	$wp_customize->add_setting('apa_fp_callout1_image');

	// add image control
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'apa_fp_callout1_image_control', array(
		'label' => 'Image',
		'section' => 'apa_fp_callout1_section',
		'settings' => 'apa_fp_callout1_image',
		'width' => 400,
		'height' => 400
		)));

	// add link setting
	$wp_customize->add_setting('apa_fp_callout1_link', array(
		'default' => '#'
		));

	// add link control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout1_link_control', array(
		'label' => 'Link (URL)',
		'section' => 'apa_fp_callout1_section',
		'settings' => 'apa_fp_callout1_link',
		'type' => 'text'
		)));
}
add_action('customize_register','apa_fp_callout1');

// Callout 2
function apa_fp_callout2($wp_customize) {
	// add section
	$wp_customize->add_section('apa_fp_callout2_section', array(
		'title' => 'Callout 2'
		));

	// add headline setting
	$wp_customize->add_setting('apa_fp_callout2_headline', array(
		'default' => 'Callout 2 Headline'
		));

	// add headline control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout2_headline_control', array(
		'label' => 'Heading',
		'section' => 'apa_fp_callout2_section',
		'settings' => 'apa_fp_callout2_headline',
		'type' => 'text'
		)));

	// add text setting
	$wp_customize->add_setting('apa_fp_callout2_text', array(
		'default' => 'Sample text'
		));

	// add text control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout2_text_control', array(
		'label' => 'Content',
		'section' => 'apa_fp_callout2_section',
		'settings' => 'apa_fp_callout2_text',
		'type' => 'textarea'
		)));

	// add image setting
	$wp_customize->add_setting('apa_fp_callout2_image');

	// add image control
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'apa_fp_callout2_image_control', array(
		'label' => 'Image',
		'section' => 'apa_fp_callout2_section',
		'settings' => 'apa_fp_callout2_image',
		'width' => 400,
		'height' => 400
		)));

	// add link setting
	$wp_customize->add_setting('apa_fp_callout2_link', array(
		'default' => '#'
		));

	// add link control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout2_link_control', array(
		'label' => 'Link (URL)',
		'section' => 'apa_fp_callout2_section',
		'settings' => 'apa_fp_callout2_link',
		'type' => 'text'
		)));
}
add_action('customize_register','apa_fp_callout2');

// Callout 3
function apa_fp_callout3($wp_customize) {
	// add section
	$wp_customize->add_section('apa_fp_callout3_section', array(
		'title' => 'Callout 3'
		));

	// add headline setting
	$wp_customize->add_setting('apa_fp_callout3_headline', array(
		'default' => 'Callout 3 Headline'
		));

	// add headline control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout3_headline_control', array(
		'label' => 'Heading',
		'section' => 'apa_fp_callout3_section',
		'settings' => 'apa_fp_callout3_headline',
		'type' => 'text'
		)));

	// add text setting
	$wp_customize->add_setting('apa_fp_callout3_text', array(
		'default' => 'Sample text'
		));

	// add text control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout3_text_control', array(
		'label' => 'Content',
		'section' => 'apa_fp_callout3_section',
		'settings' => 'apa_fp_callout3_text',
		'type' => 'textarea'
		)));

	// add image setting
	$wp_customize->add_setting('apa_fp_callout3_image');

	// add image control
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'apa_fp_callout3_image_control', array(
		'label' => 'Image',
		'section' => 'apa_fp_callout3_section',
		'settings' => 'apa_fp_callout3_image',
		'width' => 400,
		'height' => 400
		)));

	// add link setting
	$wp_customize->add_setting('apa_fp_callout3_link', array(
		'default' => '#'
		));

	// add link control
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'apa_fp_callout3_link_control', array(
		'label' => 'Link (URL)',
		'section' => 'apa_fp_callout3_section',
		'settings' => 'apa_fp_callout3_link',
		'type' => 'text'
		)));
}
add_action('customize_register','apa_fp_callout3');


/*
	==================================================
	Custom Fields
	==================================================
*/

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_carousel-fields',
		'title' => 'Carousel Fields',
		'fields' => array (
			array (
				'key' => 'field_588b04797e65f',
				'label' => 'Image',
				'name' => 'carousel_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'carousel',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_contact-us-page-details',
		'title' => 'Contact Us Page Details',
		'fields' => array (
			array (
				'key' => 'field_58a545a5c9042',
				'label' => 'Heading',
				'name' => 'contact_us_heading',
				'type' => 'text',
				'instructions' => 'This will be the heading that will appear on your Contact Us page.',
				'required' => 1,
				'default_value' => 'Enquiry',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58a5432da1834',
				'label' => 'Contact Details',
				'name' => 'contact_us_details',
				'type' => 'repeater',
				'instructions' => 'This will appear on the Contact Details box on your Contact Us page. Click "Add New" to add new set of fields. Click on the "+" or "-" sign on the right side of a set of fields to remove or add a new set of fields above it. ',
				'sub_fields' => array (
					array (
						'key' => 'field_58a5441da1835',
						'label' => 'Name',
						'name' => 'name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_58a5442ea1836',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
					array (
						'key' => 'field_58a54436a1837',
						'label' => 'Address',
						'name' => 'address',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
					array (
						'key' => 'field_58a54446a1838',
						'label' => 'Telephone',
						'name' => 'telephone',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_58a544d4a1839',
						'label' => 'Mobile',
						'name' => 'mobile',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_58a544e6a183a',
						'label' => 'Fax',
						'name' => 'fax',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_58a544f9a183b',
						'label' => 'Sat',
						'name' => 'sat',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_58a54510a183c',
						'label' => 'Website',
						'name' => 'website',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_58a54522a183d',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'email',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add New',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template_contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'custom_fields',
				1 => 'comments',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_offers-list-fields',
		'title' => 'Offers List Fields',
		'fields' => array (
			array (
				'key' => 'field_588bf5ffe2a26',
				'label' => 'Title to Display',
				'name' => 'display_title',
				'type' => 'text',
				'instructions' => 'This will be the title appearing on the top of the page.',
				'required' => 1,
				'default_value' => 'Offers',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template_offers.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_office-details',
		'title' => 'Office Details',
		'fields' => array (
			array (
				'key' => 'field_5891d16d65382',
				'label' => 'Head Office',
				'name' => 'head_office',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5891d20865385',
				'label' => 'Other Offices Heading',
				'name' => 'other_offices_heading',
				'type' => 'text',
				'instructions' => 'This will appear as the heading on top of your "other offices" list.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5891d1aa65383',
				'label' => 'Other Offices',
				'name' => 'other_offices_list',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5891d1e065384',
						'label' => 'Office',
						'name' => 'office',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => 1,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Office',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template_offices.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'custom_fields',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_services-list-fields',
		'title' => 'Services List Fields',
		'fields' => array (
			array (
				'key' => 'field_588bf01a8831b',
				'label' => 'Title to Display',
				'name' => 'display_title',
				'type' => 'text',
				'instructions' => 'This will be the title that appears on top of the services page.',
				'required' => 1,
				'default_value' => 'Services',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template_services.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
}
