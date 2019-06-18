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
 * @package Airi
 */

get_header();

$layout = airi_blog_layout();
?>

	<div id="primary" class="content-area <?php echo esc_attr( $layout['type'] ); ?> <?php echo esc_attr( $layout['cols'] ); ?>">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			if	( 'layout-list-box' == $layout['type'] )
			{
			?>
				<div class="page-title">
					<h1><?php single_post_title(); ?></h1>
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
				</div>
			<?php
			}
			?>
			<div class="blog-loop" <?php echo airi_masonry_data(); ?>>
				<div class="row">
				<div class="grid-sizer"></div>

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					if	( 'layout-list-2' == $layout['type'] )
					{
						get_template_part( 'template-parts/content-list', '2' );
					}
					else if	( 'layout-two-columns' == $layout['type'] )
					{
						get_template_part( 'template-parts/content-two', 'columns' );
					}
					else if	( 'layout-list-box' == $layout['type'] )
					{
						get_template_part( 'template-parts/content', 'box' );
					}
					else
					{
						get_template_part( 'template-parts/content', get_post_type() );
					}

				endwhile;
				?>
				</div>
			</div>
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( $layout['sidebar'] ) {
	get_sidebar();
}
get_footer();
