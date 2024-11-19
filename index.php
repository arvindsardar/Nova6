<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nova
 */

get_header(); ?>

<header class="entry-header is-layout-constrained">
	<?php if ( !is_front_page() ) {
		single_post_title( '<h1 class="entry-title">', '</h1>' );
	} ?>
</header><!-- .entry-header -->

<div class="is-layout-constrained">
	<?php if ( have_posts() ) : ?>

		<div class="layout--grid">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content-cards' ); ?>
			<?php endwhile; ?>
		</div>

		<div class="pagination"><?php the_posts_pagination(); ?></div>

	<?php else : ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nova' ); ?></p>
		<?php get_search_form();
	endif; ?>
</div>

<?php get_footer();
