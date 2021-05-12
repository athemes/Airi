<?php
/**
 * Template part for Menu style 1
 *
 * @package Airi
 */
?>

<header id="masthead" class="site-header">
	
	<div class="<?php echo esc_attr( airi_menu_container() ); ?>">
		<div class="row">
		<div class="site-branding col-md-4 col-sm-6 col-9">
				<?php airi_site_branding(); ?>
			</div><!-- .site-branding -->

			<div class="header-mobile-menu col-md-8 col-sm-6 col-3">
				<button class="mobile-menu-toggle" aria-controls="primary-menu">
					<span class="mobile-menu-toggle_lines"></span>
					<span class="sr-only"><?php esc_html_e( 'Toggle mobile menu', 'airi' ); ?></span>
				</button>
			</div>			

			<div class="d-flex justify-content-end col-md-8">
				<nav id="site-navigation" class="main-navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</nav><!-- #site-navigation -->

				<?php airi_header_cart_search(); ?>
			</div>
		</div>
	</div>
	


</header><!-- #masthead -->