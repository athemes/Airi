<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Airi
 */

$layout 		= airi_single_layout();
$hide_thumb 	= get_theme_mod( 'single_hide_thumb' );
$hide_date 		= get_theme_mod( 'single_hide_date' );
$hide_cats 		= get_theme_mod( 'single_hide_cats' );
$hide_author 	= get_theme_mod( 'single_hide_author' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( $hide_thumb == '' ) : ?>
			<?php
			if ( has_post_thumbnail() )
			{
				?>
				<div class="thumbnail<?php echo esc_attr( $layout['item_inner_cols'] ); ?>">
					<?php airi_post_thumbnail(); ?>
					<?php
					if ( $hide_cats == '' ) {
						echo '<span>';
						airi_first_category();
						echo '</span>';
					}
					?>
				</div>
				<?php
			}
			?>
		<?php endif; ?>
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header><!-- .entry-header -->
	<div class="entry-meta d-sm-flex align-items-center justify-content-sm-center">
		<?php
		if ( $layout['type'] != 'layout-grid' && $layout['type'] != 'layout-masonry' && $hide_author == '' ) {
			airi_posted_by();
		}
		if ( $hide_date == '' ) {
			airi_posted_on();
		}
		if ( $hide_comments == '' ) {
			airi_get_comments_number();
		}
		?>
	</div><!-- .entry-meta -->
	<?php
	$img = get_theme_mod( 'image_separate' );
	if ( $img )
	{
		?>
		<div class="separate">
			<img src="<?php echo esc_url( $img ); ?>">
		</div>
		<?php
	}
	?>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'airi' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'airi' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php airi_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
