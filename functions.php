<?php

/* SECTION includes
**************************************************/
	include_once( __DIR__ . '/assets/includes/menu-walker.php'); /* » custom walker */
	// include_once( __DIR__ . '/assets/includes/shortcodes.php');
	// include_once( __DIR__ . '/assets/includes/template-functions.php');

/* !SECTION */


/* » theme defaults
**************************************************/
	if ( ! function_exists( 'nova_setup' ) ) :
		function nova_setup() {
			add_theme_support( 'title-tag' ); //let WP manage the <title> head tag
			add_theme_support( 'editor-styles' ); //register gutenberg stylesheet
			add_theme_support( 'customize-selective-refresh-widgets' ); //support for widget selective refresh
			add_theme_support( 'post-thumbnails' ); //Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'responsive-embeds' ); // Add support for responsive embeds.
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'menus' );
			// add_theme_support( 'disable-layout-styles' );


			// Change markup for HTML5
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Support for core custom logo
			add_theme_support('custom-logo');
		}
	endif;
	add_action( 'after_setup_theme', 'nova_setup' );


/* » enqueue scripts & styles
**************************************************/
	//for cache busting
	define( 'MY_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

	add_action( 'wp_enqueue_scripts', function(){

		//swiperslider
		wp_enqueue_style('swiper-style', get_stylesheet_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css');
		wp_enqueue_script('swiper_script', get_stylesheet_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', '', '11.1.8',true);

		// remix icons
		wp_enqueue_style( 'remix-icons', get_stylesheet_directory_uri() . '/assets/vendor/remixicons/remixicon.css' );

		// theme styles load last
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'nova-style', get_stylesheet_uri(), array(), MY_THEME_VERSION );

		// theme scripts load last
		wp_enqueue_script(
			'nova_custom', 												//$handle
			get_stylesheet_directory_uri() . '/assets/js/custom.js', 	//$src
			array('jquery'), 											//$dependencies
			'1.0', 														//$version
			true 														//send to footer
		);

	}, 99 );

	//Block Editor Customisation
	add_action( 'enqueue_block_editor_assets', function() {

		// block editor stylesheet
		wp_enqueue_style(
			'nova-editor-style',
			get_stylesheet_directory_uri() . "/assets/css/block-editor.css",
			false,
			'1.0',
			'all'
		);

		// custom block styles
		wp_enqueue_script(
			'nova-editor',
			get_stylesheet_directory_uri() . '/assets/js/block-editor.js',
			[ 'wp-blocks', 'wp-dom' ],
			filemtime( get_stylesheet_directory() . '/assets/js/block-editor.js' ),
			true
		);

	} );


/* » additional body classes
**************************************************/
	add_filter( 'body_class', 'nova_body_classes' );
	function nova_body_classes( $classes ) {
		//add theme class
		$classes[] = 'nova';

		//add page slug class
		global $post;
		if ( isset( $post ) ) {
			$classes[] = 'page-' . $post->post_name;
		}

		//for blog page
		if ( is_home() || is_archive() ) {
			$classes[] = 'nova-archive';
		}

		//Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'nova-no-sidebar';
		}

		//Adds a class of not-front if it's an internal page
		if ( ! is_front_page() ) {
			$classes[] = 'nova-not-front';
		}


		return $classes;
	}


/* » theme globals
**************************************************/
// show a placeholder image if no featured image
	function nova_featured_img_with_fallback(){
		if (has_post_thumbnail()) :
			$postimage = get_the_post_thumbnail_url();
		else :
			$postimage = get_stylesheet_directory_uri() . '/assets/images/image-placeholder-default.webp';
		endif;
		echo $postimage;
	}

/* » enable svg uploads
**************************************************/
	add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	global $wp_version;
	if ( $wp_version !== '4.7.1' ) {
		return $data;
	}
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
	}, 10, 4 );

	function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );



/* »  enable category archives for cpts
**************************************************/
	function nova_add_cpt_category_archives( $query ) {
		if ( ! is_admin() && is_category() && $query->is_main_query() ) {
			$query->set( 'post_type', array(
					'post',
					'project',
					// 'another_post_type',
			) );
		}
	}
	add_filter( 'pre_get_posts', 'nova_add_cpt_category_archives' );



/* » tests
**************************************************/

