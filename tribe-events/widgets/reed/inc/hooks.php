<?php
/**
 * Functions hooked into theme defined action hooks
 *
 * @package TheFuture
 */


/*----------------------------------
I. Header
----------------------------------*/

/**
 * Main header
 */
function thefuture_header() {
	?>
	<header id="masthead" class="site-header">
		<div class="container-fluid">
			<div class="row">		
			<?php
				//The site branding will be displayed inside thefuture_main_navigation() if the left-menu is active
				if ( !has_nav_menu( 'left-menu' ) ) {
					thefuture_site_branding();
				}
				thefuture_main_navigation();
			?>
			</div>
		</div>
	</header>
	<?php		
}
add_action( 'thefuture_header', 'thefuture_header', 10 );


function thefuture_top_bar() {
	?>
		<div class="top-bar">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 header-contact">
						<span><i class="fa fa-envelope"></i> office@example.org</span>
						<span><i class="fa fa-phone"></i> +9454.43534.433</span>
						<span><i class="fa fa-map"></i> Canal st, 15, New York</span>
					</div>
					<div class="col-md-4 header-social">
						<div class="row">
							<div class="col-md-8 header-social-inner">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-youtube"></i></a>
							</div>
							<div class="col-md-4">
								<a class="button header-button" href="#">Get a quote</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
}
add_action( 'thefuture_header_before', 'thefuture_top_bar' );


/**
 * Handles the site branding markup
 * Includes logo, site title and description
 */
function thefuture_site_branding( $cols = 'col-md-3' ) {
	?>
	<div class="site-branding <?php echo esc_attr( $cols ); ?>">
		<?php
		the_custom_logo();
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		else :
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;
		$thefuture_description = get_bloginfo( 'description', 'display' );
		if ( $thefuture_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $thefuture_description; /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>
	</div><!-- .site-branding -->
	<?php
}

/**
 * Handles the main menu
 */
function thefuture_main_navigation() {

	//Check if the left menu is active and set things accordingly
	if ( has_nav_menu( 'left-menu' ) ) {
		$nav = array( 
			'exists' => true,
			'cols' => 'col-md-4',
		);
	} else {
		$nav = array( 
			'exists' => false,
			'cols' => 'col-md-9',
		);
	}
	?>

	<?php if ( $nav['exists'] ) : ?>
		<nav id="site-navigation-left" class="main-navigation main-nav-left col-md-4">
			<button class="menu-toggle" aria-controls="primary-menu-left" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'thefuture' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'left-menu',
				'menu_id'        => 'primary-menu-left',
			) );
			?>
		</nav><!-- #site-navigation -->

		<?php
			//Display the site branding between the two menus
			thefuture_site_branding( $cols = 'col-md-4' );
		?>
	<?php endif; ?>

	<nav id="site-navigation-right" class="main-navigation main-nav-right <?php echo $nav['cols']; ?>">
		<button class="menu-toggle" aria-controls="primary-menu-right" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'thefuture' ); ?></button>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'right-menu',
			'menu_id'        => 'primary-menu-right',
		) );
		?>
	</nav><!-- #site-navigation -->
	<?php
}
