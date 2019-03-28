<?php
/**
 * Template part for Menu style 5
 *
 * @package Airi
 */
?>

<header id="masthead" class="site-header">
	
	<div class="<?php echo esc_attr( airi_menu_container() ); ?>">
		<div class="row">
			<div class="site-branding col-md-4 col-sm-6 col-lg-2 col-9">
				<?php airi_site_branding(); ?>
			</div><!-- .site-branding -->

			<div class="header-mobile-menu col-lg-10 col-md-8 col-sm-6 col-3">
				<button class="mobile-menu-toggle" aria-controls="primary-menu">
					<span class="mobile-menu-toggle_lines"></span>
					<span class="sr-only"><?php esc_html_e( 'Toggle mobile menu', 'airi' ); ?></span>
				</button>
			</div>			

			<nav id="site-navigation" class="main-navigation col-md-6">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->

			<div class="col-sm-12 col-xl-2 col-lg-6 col-12 contact-us text-center text-lg-left text-xl-right">
				Call Us: <span>001-1234-88888</span>
			</div>
			<div class="col-sm-12 last-block col-xl-2 col-lg-6 col-12">
				<div class="socials d-flex justify-content-end">
					<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="header-search-form">
		<?php get_search_form(); ?>
	</div>


</header><!-- #masthead -->