<?php
/**
 * Template part for Menu style 5
 *
 * @package Airi
 */

$show_header_top_on_mobile = get_theme_mod( 'show_header_top_on_mobile' ) ? '' : ' d-none d-md-block';
?>

<header id="masthead" class="site-header">
	
	<div class="container">
		<div class="top-section<?php echo esc_attr( $show_header_top_on_mobile ); ?>">
			<div class="row">
				<div class="left-content col-md-6 col-12 text-md-left text-center">
				<?php
				$airi_left_content = get_theme_mod( 'menu6_top_section_left' );
				echo wp_kses_post( $airi_left_content );
				?>
				</div>
				<div class="botton-section col-md-6 col-12 text-md-right text-center">
					<?php
					$airi_right_content = get_theme_mod( 'menu6_top_section_right' );
					echo wp_kses_post( $airi_right_content );
					?>
				</div>
			</div>
		</div>
		<div class="row bottom-section align-items-center">
			<div class="site-branding col-md-4 col-sm-6 col-lg-3 col-9">
				<?php airi_site_branding(); ?>
			</div><!-- .site-branding -->

			<div class="header-mobile-menu col-lg-9 col-md-8 col-sm-6 col-3">
				<button class="mobile-menu-toggle" aria-controls="primary-menu">
					<span class="mobile-menu-toggle_lines"></span>
					<span class="sr-only"><?php esc_html_e( 'Toggle mobile menu', 'airi' ); ?></span>
				</button>
			</div>			
			<div class="right-content col-xl-9 col-md-12">
				<div class="d-flex align-items-center justify-content-end">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</nav><!-- #site-navigation -->

					<?php airi_header_cart_search(); ?>	

					<?php 
					$airi_button_text = get_theme_mod( 'menu6_button_text' ); 
					$ga_display_class = empty($airi_button_text) ? 'd-none' : 'd-none d-xl-flex'; ?>

					<div class="group-actions align-items-center <?php echo esc_attr( $ga_display_class ); ?>">
						<?php
						if ( $airi_button_text )
						{
							$airi_button_url = get_theme_mod( 'menu6_button_url' );
						?>
							<a href="<?php echo esc_url( $airi_button_url ); ?>" class="btn">
								<?php echo esc_html( $airi_button_text ); ?>
							</a>
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>


</header><!-- #masthead -->