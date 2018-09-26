<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TheFuture
 */

?>

		<?php thefuture_main_container_end(); ?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<?php get_sidebar( 'footer' ); ?>

		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'thefuture' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Powered by %s', 'sgmag' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'sgmag' ), '<a href="https://studiogenium.com/themes/thefuture/">thefuture</a>', 'SG' ); ?>
					</div>
					<div class="col-md-6">
						<nav id="footer-navigation" class="footer-navigation secondary-nav">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'menu_id'        => 'footer-menu',
								'depth' 		 => 1,
								'fallback_cb'	 => false
							) );
							?>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
