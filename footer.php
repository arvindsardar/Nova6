<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nova
 */
?>
	<!-- ------------ END page content ------------ -->
</main><!-- content-zone -->

<footer id="zone__footer" class="is-layout-constrained">
	<div class="inner">
		<div class="section--brand">
			<a href="/" class="site-logo">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo--fallback.png" alt="logo">
			</a>
			<?php the_field('footer_message','option'); ?>
			<div class="socials">
				<?php if(get_field('facebook', 'option')) : ?>
					<a href="<?php echo get_field('facebook', 'option'); ?>" target="_blank"><i class="ri-facebook-fill"></i></a>
				<?php endif; ?>
				<?php if(get_field('youtube', 'option')) : ?>
					<a href="<?php echo get_field('youtube', 'option'); ?>" target="_blank"><i class="ri-youtube-fill"></i></a>
				<?php endif; ?>
				<?php if(get_field('instagram', 'option')) : ?>
					<a href="<?php echo get_field('instagram', 'option'); ?>" target="_blank"><i class="ri-instagram-fill"></i></a>
				<?php endif; ?>
				<?php if(get_field('twitter', 'option')) : ?>
					<a href="<?php echo get_field('twitter', 'option'); ?>" target="_blank"><i class="ri-twitter-x-fill"></i></a>
				<?php endif; ?>
				<?php if(get_field('linkedin', 'option')) : ?>
					<a href="<?php echo get_field('linkedin', 'option'); ?>" target="_blank"><i class="ri-linkedin-fill"></i></a>
				<?php endif; ?>
			</div>
		</div>
		<div></div>
		<div class="section--nav">
			<?php wp_nav_menu(array(
				'menu' => 'Footer1',
				'container' => false,
				'menu_id' => 'menu-footer1',
				'menu_class' => 'level-1 nav-menu',
				"items_wrap" => '<nav id="%1$s" class="%2$s">%3$s</nav>',
				'walker' => new Nova_Menu_Walker,
			)); ?>
			<?php wp_nav_menu(array(
				'menu' => 'Footer2',
				'container' => false,
				'menu_id' => 'menu-footer2',
				'menu_class' => 'level-1 nav-menu',
				"items_wrap" => '<nav id="%1$s" class="%2$s">%3$s</nav>',
				'walker' => new Nova_Menu_Walker,
			)); ?>
			<?php wp_nav_menu(array(
				'menu' => 'Footer3',
				'container' => false,
				'menu_id' => 'menu-footer3',
				'menu_class' => 'level-1 nav-menu',
				"items_wrap" => '<nav id="%1$s" class="%2$s">%3$s</nav>',
				'walker' => new Nova_Menu_Walker,
			)); ?>
		</div>
		<div class="section--imprint">
			All content <i class="ri-copyright-line"></i> <?php echo date('Y'); ?> <?php echo get_bloginfo(); ?>  | <a href="/privacy-policy/">Privacy Policy</a>  |  <a href="/terms-conditions/">Terms & Conditions</a>
		</div>
	</div><!-- inner -->
</footer><!-- #zone_footer -->


<a id="back-to-top" href="#pagetop"><span class="dashicons dashicons-arrow-up-alt"></span></a>

<?php wp_footer(); ?>

</body>
</html>
