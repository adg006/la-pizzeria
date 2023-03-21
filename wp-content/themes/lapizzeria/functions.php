<?php

/***** INCLUDING EXTERNAL FUNCTIONALITIES *****/
require get_template_directory() . '/inc/database.php';
require get_template_directory() . '/inc/reservations.php';
require get_template_directory() . '/inc/options.php';

/***** ENQUEUING ALL CSS, JS & CDN FILES FOR FRONTEND*****/
add_action('wp_enqueue_scripts','lapizzeria_styles');
function lapizzeria_styles(){

	/***** CSS CDN FILES *****/
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.1/css/all.min.css', array(), '5.6.1');
	wp_enqueue_style('google-font','https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900&display=swap');
	wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css', array(), '1.6.0');


	/***** LOCAL CSS FILES *****/
	//wp_enqueue_style('fluidbox-css', get_template_directory_uri() . '/css/fluidbox.min.css', array(), '2.0.5');
	//wp_enqueue_style('fluidbox-css-map', get_template_directory_uri() . '/css/fluidbox.min.css.map', array(), '2.0.5');
	wp_enqueue_style('normalize-css', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
	wp_enqueue_style('theme-css', get_template_directory_uri() . '/style.css', array('normalize-css'), '1.0');
	wp_enqueue_style('lapizzeria-css', get_template_directory_uri() . '/css/lapizzeria.css', array('theme-css'), '1.0');

	/***** JS CDN FILES *****/
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', '3.4.1', true);
	wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', array(), '1.6.0', true);
	//wp_enqueue_script('throttle-debouce', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js', array('jquery'), '1.1', true);

	/***** LOCAL JS FILES *****/
	wp_enqueue_script('lapizzeria-js', get_template_directory_uri() . '/js/lapizzeria.js', array('jquery','leaflet-js'), '1.0', true);
	//wp_enqueue_script('fluidbox-js', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array('jquery'), '2.0.5', true);


	/***** LOCALIZE SCRIPT FOR SEND PHP VALUE TO JS FILE *****/
	wp_localize_script(
		'lapizzeria-js', 
		'options', 
		array(
			'latitude' => esc_html(get_option('lapizzeria_gmap_latitude')),
			'longitude' => esc_html(get_option('lapizzeria_gmap_longitude')),
			'zoom' => esc_html(get_option('lapizzeria_gmap_zoom'))
		)
	);
}

/***** ENQUEUING JS FILE FOR BACKEND *****/
add_action('admin_enqueue_scripts','lapizzeria_admin_scripts');
function lapizzeria_admin_scripts() {
	/***** LOCAL CSS FILES (BACKEND) *****/
	wp_enqueue_style('sweetalert-css', get_template_directory_uri() . '/css/sweetalert2.css', array(), '1.0');

	/***** LOCAL JS FILES (BACKEND) *****/
	wp_enqueue_script('sweetalert-js', get_template_directory_uri() . '/js/sweetalert2.js', array('jquery'), '1.0', true);
	wp_enqueue_script('admin-js', get_template_directory_uri() . '/js/admin-ajax.js', array('jquery'), '1.0', true);

	/***** LOCALIZE SCRIPT (BACKEND) FOR SEND PHP VALUE TO JS FILE *****/
	wp_localize_script(
		'admin-js', 
		'admin_ajax', 
		array(
			'ajaxurl' => admin_url('admin-ajax.php')
		)
	);
}

/***** CHANGE THE SIZE OF THUMBNAILS *****/
add_action('after_setup_theme','lapizzeria_thumbnail');
function lapizzeria_thumbnail(){
	add_image_size('specialty-portrait', 354, 530, true);
	update_option('thumbnail_size_w', 253);
	update_option('thumbnail_size_h', 164);
}

/***** REGISTERING MENUS *****/
add_action('init','lapizzeria_menus');
function lapizzeria_menus(){
	register_nav_menus(array(
		'header-menu' => __('Header Menu','lapizzeria'),
		'social-menu' => __('Social Menu', 'lapizzeria')
	));
}

/****** REGISTERING WIDGETS *****/
add_action('widgets_init','lapizzeria_widgets');
function lapizzeria_widgets() {
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

/***** ACTIVATING BASIC FEATURES *****/
add_action('after_setup_theme','lapizzeria_setups');
function lapizzeria_setups(){
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
};

/***** SETTING HEIGHT & WIDTH OF LOGO *****/
add_action('after_setup_theme','lapizzeria_custom_logo');
function lapizzeria_custom_logo(){
	$logo = array(
		'height' => 200,
		'width' => 200
	);
	add_theme_support('custom-logo', $logo);
};

/***** GENERATING CUSTOM POST TYPE *****/
add_action('init','lapizzeria_specialties');
function lapizzeria_specialties() {
	$labels = array(
		'name'               => _x( 'Pizzas', 'lapizzeria' ),
		'singular_name'      => _x( 'Pizza', 'post type singular name', 'lapizzeria' ),
		'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
		'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
		'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
		'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
		'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
		'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
		'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
		'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
		'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
		'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
		'not_found'          => __( 'No Pizzas found.', 'lapizzeria' ),
		'not_found_in_trash' => __( 'No Pizzas found in Trash.', 'lapizzeria' )
	);

	$args = array(
		'labels'             => $labels,
    	'description'        => __( 'Description.', 'lapizzeria' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'specialties' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    	'taxonomies'          => array( 'category' )
	);

	register_post_type( 'specialties', $args );
}