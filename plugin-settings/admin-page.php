<?php
/**
 * Renders plugin admin page
 *
 * @package Caledros_Helper
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Caledros Helper - A WordPress plugin
 * Copyright (C) 2025-2026 David Arnado
 *
 * This file is part of Caledros Helper.
 *
 * Caledros Helper is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.

 * Caledros Helper is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License along
 * with Caledros Helper; if not, see <https://www.gnu.org/licenses/>.
 */

/**
 * Registers plugin settings.
 *
 * Registers two plugin settings, one for managing default block patterns
 * and other for managing the WordPress REST API visibility. Both settings
 * will work as on/off switches.
 *
 * The function runs every time a user accesses an admin page in the WordPress
 * dashboard.
 *
 * @return void
 */
function caledros_helper_register_settings() {
	$args = array(
		'type'              => 'integer',
		'sanitize_callback' => 'caledros_helper_sanitize_settings_input',
		'show_in_rest'      => false,
		'default'           => 1,
	);
	register_setting( 'caledros_helper_settings_group', 'caledros_helper_remove_default_block_patterns', $args );
	register_setting( 'caledros_helper_settings_group', 'caledros_helper_deactivate_rest_api', $args );
}
add_action( 'admin_init', 'caledros_helper_register_settings' );


/**
 * Sanitizes a checkbox input's value
 *
 * Converts the input's value into an integer for storage. It returns 1 when the
 * checkbox is checked (input's value equal to '1') and 0 otherwise.
 *
 * @param string $input Checkbox value from the settings form.
 *
 * @return integer Sanitized input value
 */
function caledros_helper_sanitize_settings_input( $input ) {
	return ( '1' === $input ) ? 1 : 0;
}


/**
 * Adds submenu page to the Tools main menu
 *
 * Adds the plugin's admin menu to the Tools section.
 *
 * @return void
 */
function caledros_helper_add_settings_page() {
	add_management_page(
		'Caledros Helper',
		'Caledros Helper',
		'manage_options',
		'caledros-helper-settings',
		'caledros_helper_render_settings_page',
		null
	);
}
add_action( 'admin_menu', 'caledros_helper_add_settings_page' );

/**
 * Renders admin settings page
 *
 * Renders the admin settings page. This page can be accessed through the "Caledros Helper"
 * top level menu located in the dashboard's sidebar.
 *
 * @return void
 */
function caledros_helper_render_settings_page() {
	?>
	<div class="wrap">
		<h1 style="margin-bottom:10px"> <?php esc_html_e( 'Caledros Helper Settings', 'caledros-helper' ); ?> </h1>
		<form method="post" action="options.php">
			<?php settings_fields( 'caledros_helper_settings_group' ); ?>            
			<div style="display:flex; flex-direction:column; row-gap:15px; margin-bottom:15px;">
				<div style="display:flex; flex-direction:flex; column-gap:10px">
					<div style="padding:0px"> <?php esc_html_e( 'Remove default block patterns', 'caledros-helper' ); ?> </div>
					<div style="padding:0px"><input type="checkbox" name="caledros_helper_remove_default_block_patterns" value="1" <?php checked( 1, get_option( 'caledros_helper_remove_default_block_patterns' ), true ); ?> /></div>
				</div>
				<div style="display:flex; flex-direction:flex; column-gap:10px">
					<div style="padding:0px"> <?php esc_html_e( 'Deactivate REST API for non-authenticated users', 'caledros-helper' ); ?> </div>
					<div style="padding:0px"><input type="checkbox" name="caledros_helper_deactivate_rest_api" value="1" <?php checked( 1, get_option( 'caledros_helper_deactivate_rest_api' ), true ); ?> /></div>
				</div>
			</div>
			<?php submit_button( 'Save Changes', 'primary', 'submit', false ); ?>
		</form>
	</div>
	<?php
}