<?php
// show a placeholder image if no featured image
	function bdn_featured_img_with_fallback(){
		if (has_post_thumbnail()) :
			$postimage = get_the_post_thumbnail_url();
		else :
			$postimage = get_stylesheet_directory_uri() . '/assets/images/image-placeholder-default.webp';
		endif;
		echo $postimage;
	}

// dynamic css from ACF options page
	function brand_css($key, $field){
		if(get_field($field, 'option')) :
			echo $key . ' : ' . get_field($field, 'option') . ';';
		endif;
	}

//insert SVG from ACF 'icon' field
	function bdn_icon_with_fallback(){
		if (get_field('icon')) :
			$icon = get_field('icon');
		else :
			$icon = get_stylesheet_directory_uri() . '/assets/images/icon--fallback.svg';
		endif;
		echo file_get_contents($icon);
	}

// display breadcrumbs
	function display_breadcrumbs(){
		?>
		<div id="wrap-breadcrumbs" class="is-layout-constrained">
			<div>
				<?php if(function_exists('bcn_display')){
					bcn_display();
				} ?>
			</div>
		</div>
		<?php
	}

// global get any title
	function bdn_get_title(){
		if(is_singular()){
			echo get_the_title();
		} else if(is_archive()){
			echo get_the_archive_title('', false);
		}
	}

// path to images
	function path_theme_images(){
		return get_stylesheet_directory_uri() . '/assets/images';
	}

//devinfo
	function dev_themeinfo(){
		echo '<div class="devinfo" style="position: fixed; bottom: 0; left: 0; right: 0; font-size: 12px; text-align: center; font-family: monospace; background-color: black; color: white;">';
		$theme_info = wp_get_theme();
		echo 'theme: ' . esc_html( $theme_info->get( 'TextDomain' ) );
		echo '  |  version: ' . $theme_info->get( 'Version' );
		echo '</div>';

	}