<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				atu_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
		<div class="entry-meta">
			<?php 
				atu_entry_footer(); 
				atu_posted_by();
			?>
		</div>
		    
	</header><!-- .entry-header -->

	<?php atu_post_thumbnail(); ?>
   
	<div class="entry-content">
		<?php 
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'atu' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atu' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
