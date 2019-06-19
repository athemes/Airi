<?php
/**
 * Template part for Menu style 5
 *
 * @package Airi
 */
?>

<header id="masthead" class="site-header">
	
	<div class="container">
		<div class="row justify-content-md-center align-items-center">
			<div class="site-branding col-xl-12 col-6 text-left text-xl-center">
				<?php airi_site_branding(); ?>
			</div><!-- .site-branding -->

			<div class="header-mobile-menu text-right col-xl-12 col-6">
				<button class="mobile-menu-toggle" aria-controls="primary-menu">
					<span class="mobile-menu-toggle_lines"></span>
					<span class="sr-only"><?php esc_html_e( 'Toggle mobile menu', 'airi' ); ?></span>
				</button>
			</div>			
			<div class="bottom-content col-9 col-md-12">
				<div class="d-flex align-items-center justify-content-center">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</div>


</header><!-- #masthead -->