<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nova
 */

get_header(); ?>

<header class="entry-header is-layout-constrained">
	<?php if ( !is_front_page() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} ?>
</header><!-- .entry-header -->


<?php while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>

	<div class="entry-content is-layout-constrained">
		<?php the_content(); ?>
	</div>

</article>

<?php endwhile; ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>

