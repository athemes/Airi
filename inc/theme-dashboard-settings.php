<?php
/**
 * Theme activation.
 *
 * @package Airi
 */

/**
 * Check Pro Status
 */
function airi_check_pro_status() {
	if ( ! current_user_can( 'install_plugins' ) ) {
		return;
	}

	if ( ! function_exists( 'get_plugin_data' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$plugin_path = 'airi-pro/airi-pro.php';

	if ( in_array( $plugin_path, (array) get_option( 'active_plugins', array() ), true ) || is_plugin_active_for_network( $plugin_path ) ) {
		return true;
	}
}

/**
 * Theme Dashboard [Free VS Pro]
 */
function airi_free_vs_pro_html() {
	ob_start();
	?>
	<div class="thd-heading"><?php esc_html_e( 'Differences between Airi and Airi Pro', 'airi' ); ?></div>
	<div class="thd-description"><?php esc_html_e( 'Here is the list of differences between Airi and Airi Pro:', 'airi' ); ?></div>

	<table class="thd-table-compare">
		<thead>
			<tr>
				<th><?php esc_html_e( 'Feature', 'airi' ); ?></th>
				<th><?php esc_html_e( 'Airi', 'airi' ); ?></th>
				<th><?php esc_html_e( 'Airi Pro', 'airi' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php esc_html_e( 'Elementor support', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Access to all Google Fonts', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Responsive', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Parallax backgrounds', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Social Icons', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Custom Elementor blocks', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Translation ready', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Color options', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Blog options', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Widgetized footer', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Background image support', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'WooCommerce compatible', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Growing collection of premium demos', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Footer Credits option', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Footer background image', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra Elementor blocks (portfolio, shop categories, slider)', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Two extra menu types', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra blog layouts (list, masonry)', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extended WooCommerce options', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Priority support', 'airi' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
		</tbody>
	</table>

	<div class="thd-separator"></div>

	<p>
		<a href="https://athemes.com/theme/airi/?utm_source=theme_table&utm_medium=button&utm_campaign=Airi" class="thd-button button">
			<?php esc_html_e( 'Get Airi Pro Today', 'airi' ); ?>
		</a>
	</p>
	<?php
	return ob_get_clean();
}

/**
 * Theme Dashboard Settings
 *
 * @param array $settings The settings.
 */
function airi_dashboard_settings( $settings ) {

	// PRO Status.
	$settings['pro_status'] = airi_check_pro_status();

	// Starter.
	$settings['starter_plugin_slug'] = 'athemes-starter-sites';

	// Hero.
	$settings['hero_title']       = esc_html__( 'Welcome to Airi', 'airi' );
	$settings['hero_themes_desc'] = esc_html__( 'Airi is now installed and ready to use. Click on Starter Sites to get off to a flying start with one of our pre-made templates, or go to Theme Dashboard to get an overview of everything.', 'airi' );
	$settings['hero_desc']        = esc_html__( 'Airi is now installed and ready to go. To help you with the next step, we\'ve gathered together on this page all the resources you might need. We hope you enjoy using Airi.', 'airi' );
	$settings['hero_image']       = get_template_directory_uri() . '/theme-dashboard/images/welcome-banner@2x.png';

	if ( airi_check_pro_status() ) {
		$settings['hero_image'] = get_template_directory_uri() . '/theme-dashboard/images/welcome-banner-pro@2x.png';
	}

	// Tabs.
	$settings['tabs'] = array(
		array(
			'name'    => esc_html__( 'Theme Features', 'airi' ),
			'type'    => 'features',
			'visible' => array( 'free', 'pro' ),
			'data'    => array(
				array(
					'name'          => esc_html__( 'Change Site Title or Logo', 'airi' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=title_tagline',
				),
				array(
					'name'          => esc_html__( 'Header Options', 'airi' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=airi_section_menu',
				),
				array(
					'name'          => esc_html__( 'Color Options', 'airi' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=airi_panel_colors',
				),
				array(
					'name'          => esc_html__( 'Font Options', 'airi' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=airi_panel_typography',
				),
				array(
					'name'          => esc_html__( 'Blog Options', 'airi' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=airi_panel_blog',
				),
				array(
					'name'          => esc_html__( 'WooCommerce', 'airi' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=airi_woocommerce_panel',
				),
			),
		),
		array(
			'name'    => esc_html__( 'Free vs PRO', 'airi' ),
			'type'    => 'html',
			'visible' => array( 'free' ),
			'data'    => airi_free_vs_pro_html(),
		),
		array(
			'name'    => esc_html__( 'Performance', 'airi' ),
			'type'    => 'performance',
			'visible' => array( 'free', 'pro' ),
		),
	);

	// Documentation.
	$settings['documentation_link'] = 'https://docs.athemes.com/category/260-airi';

	// Promo.
	$settings['promo_title']  = esc_html__( 'Upgrade to Pro', 'airi' );
	$settings['promo_desc']   = esc_html__( 'Take Airi to a whole other level by upgrading to the Pro version.', 'airi' );
	$settings['promo_button'] = esc_html__( 'Discover Airi Pro', 'airi' );
	$settings['promo_link']   = 'https://athemes.com/theme/airi/?utm_source=theme_info&utm_medium=link&utm_campaign=Airi';

	// Review.
	$settings['review_link']       = 'https://wordpress.org/support/theme/airi/reviews/';
	$settings['suggest_idea_link'] = 'https://athemes.com/contact/';

	// Support.
	$settings['support_link']     = 'https://forums.athemes.com/c/airi';
	$settings['support_pro_link'] = 'https://athemes.com/theme/airi/?utm_source=theme_info&utm_medium=link&utm_campaign=Airi';

	// Community.
	$settings['community_link'] = 'https://www.facebook.com/groups/athemes';

	$theme = wp_get_theme();
	// Changelog.
	$settings['changelog_version'] = $theme->version;
	$settings['changelog_link']    = 'https://athemes.com/changelog/airi';

	return $settings;
}
add_filter( 'thd_register_settings', 'airi_dashboard_settings' );

/**
 * Starter Settings
 *
 * @param array $settings The settings.
 */
function airi_demos_settings( $settings ) {

	$settings['categories'] = array(
		'business' 	=> 'Business',
		'portfolio' => 'Portfolio',
		'ecommerce' => 'eCommerce',
	);

	$settings['builders'] = array(
		'elementor' => 'Elementor',
	);	

	// PRO Status.
	$settings['pro_status'] = airi_check_pro_status();

	// Pro.
	$settings['pro_label'] = esc_html__( 'Get Airi Pro', 'airi' );
	$settings['pro_link']  = 'https://athemes.com/theme/airi/?utm_source=theme_table&utm_medium=button&utm_campaign=Airi';

	return $settings;
}
add_filter( 'atss_register_demos_settings', 'airi_demos_settings' );