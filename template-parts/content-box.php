<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Airi
 */

$layout 		= airi_blog_layout();
$read_more 		= get_theme_mod( 'read_more_text', __( 'Read more', 'airi' ) );
$hide_thumb 	= get_theme_mod( 'index_hide_thumb' );
$hide_date 		= get_theme_mod( 'index_hide_date' );
$hide_cats 		= get_theme_mod( 'index_hide_cats' );
$hide_author 	= get_theme_mod( 'index_hide_author' );
$hide_comments 	= get_theme_mod( 'index_hide_comments' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-inner">
		<div class="flex">


			<div class="post-info <?php echo esc_attr( $layout['item_inner_cols'] ); ?>">
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
				<?php if ( $layout['type'] != 'layout-grid' && $layout['type'] != 'layout-masonry' ) : ?>
					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->

					<?php if ( $read_more != '' ) : ?>
					<footer class="entry-footer">
						<a class="read-more-link" href="<?php the_permalink(); ?>"><?php echo esc_html( $read_more ); ?></a>
					</footer><!-- .entry-footer -->
					<?php endif; ?>
				<?php endif; ?>

			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
