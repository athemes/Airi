<?php
/**
 * Template part for Extended 2 menu style
 *
 * @package Airi
 */

//Get the options
$above_phone_number = get_theme_mod( 'above_phone_number', esc_html__( 'Call us', 'airi' ) );
$phone_number 		= get_theme_mod( 'phone_number', '999.999.999' );
$phone_number_url 	= get_theme_mod( 'phone_number_url', '#' );
$above_address		= get_theme_mod( 'above_address', esc_html__( 'Address', 'airi' ) );
$address			= get_theme_mod( 'address_details', esc_html__( 'Brooklyn Street', 'airi' ) );
$address_url			= get_theme_mod( 'address_url', '#' );
$above_opening		= get_theme_mod( 'above_opening', esc_html__( 'Opening hours', 'airi' ) );
$opening_hours		= get_theme_mod( 'opening_hours', esc_html__( '9-18 Mon-Fri', 'airi' ) );
$opening_hours_url 	= get_theme_mod( 'opening_hours_url', '#' );
$cta_text			= get_theme_mod( 'cta_text_menustyle4', esc_html__( 'Get a quote', 'airi' ) );
$cta_url			= get_theme_mod( 'cta_url_menustyle4', '#' );

$has_phone_url		= !empty($phone_number_url) && $phone_number_url != '#';
$has_address_url	= !empty($address_url) && $address_url != '#';
$has_opening_hours_url	= !empty($opening_hours_url) && $opening_hours_url != '#';
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

			<div class="contact-area col-md-8">
				<div class="contact-block">
					<div class="contact-icon">
						<i class="fa fa-phone"></i>
					</div>
					<div class="contact-text">
						<span><?php echo esc_html( $above_phone_number ); ?></span>
						<?php if ($has_phone_url) { ?>
							<a href="<?php echo $phone_number_url; ?>"><span><?php echo esc_html( $phone_number ); ?></span></a>
						<?php } else { ?>
							<span><?php echo esc_html( $phone_number ); ?></span>
						<?php } ?>
					</div>
				</div>
				
				<div class="contact-block">
					<div class="contact-icon">
						<i class="fa fa-map-marker"></i>
					</div>
					<div class="contact-text">
						<span><?php echo esc_html( $above_address ); ?></span>
						<?php if ($has_address_url) { ?>
							<a href="<?php echo $address_url; ?>"><span><?php echo esc_html( $address ); ?></span></a>
						<?php } else { ?>
							<span><?php echo esc_html( $address ); ?></span>
						<?php } ?>
					</div>
				</div>
				<div class="contact-block">
					<div class="contact-icon">
						<i class="fa fa-clock-o"></i>
					</div>
					<div class="contact-text">
						<span><?php echo esc_html( $above_opening ); ?></span>
						<?php if ($has_opening_hours_url) { ?>
							<a href="<?php echo $opening_hours_url; ?>"><span><?php echo esc_html( $opening_hours ); ?></span></a>
						<?php } else { ?>
							<span><?php echo esc_html( $opening_hours ); ?></span>
						<?php } ?>
					</div>
				</div>				
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation col-md-12">			
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>

			<?php airi_header_cart_search(); ?>

			<?php if ( $cta_text ) : ?>
			<div class="header-cta">
				<a href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_text ); ?></a>
			</div>
			<?php endif; ?>
			<div class="header-search-form">
				<?php get_search_form(); ?>
			</div>
		</nav><!-- #site-navigation -->
	</div>

</header><!-- #masthead -->
