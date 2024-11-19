<?php
/**
 * The header for our theme
 * @package nova
 */

	//Theme Settings Page
	$sitename = get_bloginfo( 'name' );
	$sitelogo_url =
		wp_get_attachment_image_src(get_theme_mod('custom_logo')) ?
		esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ) :
		get_stylesheet_directory_uri() . '/assets/images/logo--fallback.png';
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="pagetop"></div>


	<!-- ------------ offscreen search ------------ -->
	<dialog id="modalSiteSearch">
		<span id="button--search-close" onclick="window.modalSiteSearch.close();">
			<i class="ri-close-large-fill"></i>
		</span>
		<form id="sitesearch" class="sitewidth" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>" >
			<label class="screen-reader-text" for="s">Search</label>
			<input class="searchinput" type="text" placeholder="... type & enter, or esc ..." value="<?php get_search_query(); ?>" name="s" id="s" />
		</form>
	</dialog>
		<!-- ------------ offscreen mobile menu ------------ -->
			<section id="offscreen-menu" class="wrapper">
				<?php wp_nav_menu(array(
					'menu' => 'main',
					'container' => false,
					'menu_id' => 'menu-main-mobile',
					'menu_class' => 'level-1',
					"items_wrap" => '<nav id="%1$s" class="%2$s">%3$s</nav>',
					'walker' => new Nova_Menu_Walker,
				)); ?>
			</section>


	<div class="ghost-header"></div>
	<header id="zone__header" class="is-layout-constrained">
		<div class="inner">

			<!-- ------------ brand ------------ -->
			<div id="section__brand" class="section">
				<a href="/" class="site-logo"><img src="<?php echo $sitelogo_url; ?>" alt="logo"></a>
			</div><!-- wrap-outer -->

			<!-- ------------ navigation ------------ -->
			<div id="section__nav" class="section">
				<?php wp_nav_menu(array(
					'menu' => 'main',
					'container' => false,
					'menu_id' => 'menu-main-desktop',
					'menu_class' => 'level-1 hide-mobile',
					"items_wrap" => '<nav id="%1$s" class="%2$s">%3$s</nav>',
					'walker' => new Nova_Menu_Walker,
				)); ?>
			</div>

			<!-- ------------ widgets ------------ -->
			<div class="header-widgets">
				<!-- search-toggle -->
				<span id="button--search-show" onclick="window.modalSiteSearch.showModal();">
					<i class="ri-search-line"></i>
				</span>
				<!-- mobile-menu-button -->
				<div id="hamburger-button" class="hide-desktop">
					<div class="label"></div>
					<div class="bars">
						<div class="bar bar1"></div>
						<div class="bar bar2"></div>
						<div class="bar bar3"></div>
					</div>
				</div>
			</div>

		</div><!-- /inner -->

	</header><!-- END wrap-outer -->

		<!-- ------------ START page content ------------ -->
	<main id="zone__content" class="wrapper">
