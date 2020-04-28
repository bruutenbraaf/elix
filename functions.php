<?php
add_theme_support('post-thumbnails');
add_theme_support('editor-styles');
add_image_size('home', 1920, 600, true);


function elix_add_editor_styles() {
    add_editor_style( 'style-editor.css' );
}
add_action( 'admin_init', 'elix_add_editor_styles' );


function flexupdate_scripts()
{
	// Scripts
	wp_enqueue_script('jquery', get_template_directory_uri() . '/bootstrap/js/jquery.min.js', array(), '1.0.0', true);
	wp_enqueue_script('bootjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('slickslider', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true);
	wp_enqueue_script('cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array(), '1.0.0', false);

	// Scrollmagic
	wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/TweenMax.min.js', array(), '1.0.0', true);
	wp_enqueue_script('ScrollMagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), '1.0.0', true);
	wp_enqueue_script('AnimationGsap', get_template_directory_uri() . '/js/animation.gsap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('addIndicators', get_template_directory_uri() . '/js/debug.addIndicators.min.js', array(), '1.0.0', true);

	// Custom JS
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);

	// CSS
	wp_enqueue_style('bootcss', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'flexupdate_scripts');



// Add option page

acf_add_options_page(array(

	'page_title' 	=> 'Website informatie',
	'menu_title' 	=> 'Logo & Opties',
	'menu_slug' 	=> 'website-informatie',
	'capability' 	=> 'edit_posts',
	'icon_url' => 'dashicons-universal-access-alt',
	'position' => 3

));


// Menu's

function register_my_menus()
{
	register_nav_menus(
		array(
			'main_menu' => __('Hoofd Menu'),
			'extra_menu' => __('Footer Menu'),
		)
	);
}
add_action('init', 'register_my_menus');


function arphabet_widgets_init()
{

	register_sidebar(array(
		'name'          => 'Footer een',
		'id'            => 'footer_1',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer twee',
		'id'            => 'footer_2',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer drie',
		'id'            => 'footer_3',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));
}


// ACF Blocks - Homepagina header
add_action('acf/init', 'header_block');
function header_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'homeheader',
			'title'				=> __('Homepagina header'),
			'description'		=> __('Voeg een header toe aan de homepagina.'),
			'render_callback'	=> 'home_header_render',
			'category'			=> 'formatting',
			'icon'				=> 'dashicons-art',
			'keywords'			=> array( 'header', 'homepagina' ),
		));
	}
}

function home_header_render( $block ) {

	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}


// ACF Blocks - Homepagina content
add_action('acf/init', 'home_content');
function home_content() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'homecontent',
			'title'				=> __('Homepagina content'),
			'description'		=> __('Voeg een contentblock toe onder de header'),
			'render_callback'	=> 'home_content_render',
			'category'			=> 'formatting',
			'icon'				=> 'dashicons-art',
			'keywords'			=> array( 'content', 'homepagina', 'home' ),
		));
	}
}

function home_content_render( $block ) {

	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}

// ACF Blocks - Homepagina content
add_action('acf/init', 'home_callout');
function home_callout() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'homecallout',
			'title'				=> __('Homepagina call out'),
			'description'		=> __('Voeg een contentblock toe onder de header'),
			'render_callback'	=> 'home_callout_render',
			'category'			=> 'formatting',
			'icon'				=> 'dashicons-art',
			'keywords'			=> array( 'content', 'homepagina', 'home', 'call', 'out' ),
		));
	}
}

function home_callout_render( $block ) {

	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}



// ACF Blocks - Pagina Elix waarden
add_action('acf/init', 'page_elixwaarden');
function page_elixwaarden() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'pageelixwaarden',
			'title'				=> __('Elix waarden'),
			'description'		=> __('Voeg een contentblock toe onder de header'),
			'render_callback'	=> 'page_elixwaarden_render',
			'category'			=> 'formatting',
			'icon'				=> 'dashicons-art',
			'keywords'			=> array( 'content', 'pagina', 'waarden', 'elix', 'elix waarden' ),
		));
	}
}

function page_elixwaarden_render( $block ) {

	$slug = str_replace('acf/', '', $block['name']);
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}







add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Blue', 'ea_genesis_child' ),
		'slug'  => 'blue',
		'color'	=> '#425CC7',
	),
	array(
		'name'  => __( 'Paragraph', 'ea_genesis_child' ),
		'slug'  => 'Paragraph',
		'color' => '#252525',
	),
) );

add_theme_support( 'disable-custom-colors' );
add_theme_support('editor-gradient-presets', []);
add_theme_support('disable-custom-gradients', true);
add_theme_support( 'disable-custom-radius' );










//Gutenberg block script rout
if( !defined( 'WP_BLOCKS_URL' ) ) {
    define( 'WP_BLOCKS_URL', get_template_directory_uri() . '/blocks/' );
}

//Register Gutenberg block
function content_gutenberg_block() {

    if( !function_exists('register_block_type') ) return; //Gutenberg is not active

    //Script version
    $version = time(); //Сhange to a fixed number after development

    //Section block script
    wp_register_script(
        'wp-section-block-script', WP_BLOCKS_URL . 'section/block.js', array( 'wp-blocks', 'wp-element', 'wp-editor' ), $version
    );

    //Register block
    register_block_type( 'content/section', array(
        'editor_script' => 'wp-section-block-script',
    ));
}
add_action( 'init', 'content_gutenberg_block' );