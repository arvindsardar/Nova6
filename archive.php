<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nova
 */

get_header();
?>

<header class="page-header is-layout-constrained">
<?php
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
	?>
</header><!-- .page-header -->

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

<?php
//get_sidebar();
get_footer();
