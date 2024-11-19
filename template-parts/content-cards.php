<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nova
 */

?>

<div class="item card hover-effect">
	<div class="top">
		<figure class="post-image-wrap">
			<a href="<?php the_permalink(); ?>">
				<img class="post-image" src="<?php nova_featured_img_with_fallback(); ?>">
			</a>
		</figure>
	</div>
	<div class="middle">
		<div class="post-meta">
			<div class="post-date"><?php echo get_the_date(); ?></div>
			<div class="post-txn"><?php the_category( ', ' ); ?></div>
		</div>
		<h4 class="post-title">
			<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 5); ?></a>
		</h4>
		<p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
	</div>
	<div class="bottom">
		<div class="post-link">
			<a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
		</div>
	</div>
</div>