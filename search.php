<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nova
 */

get_header();
?>

<div class="is-layout-constrained">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="entry-title">
				Search results
			</h1>
			<h4>
				<?php
				/* translators: %s: search query. */
				printf (esc_html__( 'Your searched for: %s', 'nova' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h4>
		</header><!-- .page-header -->

		<div class="layout--grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content-cards' ); ?>
			<?php endwhile; ?>
		</div>

		<div class="pagination"><?php the_posts_pagination(); ?></div>

	<?php else : ?>

		<section class="no-results not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nova' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nova' ); ?></p>
					<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section><!-- .no-results -->

	<?php endif; ?>

</div>

<?php

get_footer();
