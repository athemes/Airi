<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TheFuture
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php thefuture_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
	</header><!-- .entry-header -->	
		
	<?php if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php
			thefuture_posted_on();
			thefuture_post_cats();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php $layout = thefuture_blog_layout(); ?>

	<?php if ( $layout['type'] != 'layout-grid-3cols' ) : ?>
	<div class="entry-content">
		<?php
		the_excerpt();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thefuture' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
