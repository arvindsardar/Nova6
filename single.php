<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nova
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header is-layout-constrained">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					By <?php the_author(); ?> on <?php the_date(); ?>
					<div class="categories">Categories: <?php the_category( ', ' ); ?></div>
					<div class="tags">Tagged: <?php the_tags( '',', ' ); ?></div>
					<?php edit_post_link('Edit Post'); ?>

				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content is-layout-constrained">
			<?php the_post_thumbnail(); ?>
			<?php the_content(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nova3' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->

	<div class="is-layout-constrained">
		<?php
		//POST NAV
		the_post_navigation(
			array(
				'next_text' => '<span class="next-post">' . __( 'Next post', 'nd_dosth' ) . '</span> ' .
				'<span class="post-title">%title</span>',
				'prev_text' => '<span class="previous-post">' . __( 'Previous post', 'nd_dosth' ) . '</span> ' .
				'<span class="post-title">%title</span>',
				)
			);
		endwhile; ?>
	</div>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>