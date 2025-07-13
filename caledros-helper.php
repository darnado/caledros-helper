<?php
/**
 * Plugin Name: Caledros Helper
 * Plugin URI: https://caledrosforge.com/
 * Description: Adds additional features for managing the REST API and default patterns.
 * Version: 1.0.0
 * Requires at least: 6.8
 * Requires PHP: 8.3
 * Author: David Arnado
 * Author URI: https://caledrosforge.com/about/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: caledros-helper
 * Domain Path: /languages
 * 
 * Caledros Helper - A Wordpress plugin
 * Copyright (C) 2025  David Arnado
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

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define base folder
define('CALEDROS_HELPER_BASE_FOLDER', plugin_dir_path(__FILE__));

// Remove default block patterns
require_once(CALEDROS_HELPER_BASE_FOLDER . '/plugin-settings/remove-default-block-patterns.php');

// Deactivate REST API
require_once(CALEDROS_HELPER_BASE_FOLDER . '/plugin-settings/deactivate-rest-api.php');

// Add admin page
require_once(CALEDROS_HELPER_BASE_FOLDER . '/plugin-settings/admin-page.php');

// Run on plugin activation
function caledros_helper_activate() {
    update_option('caledros_helper_remove_default_block_patterns', 1);
    update_option('caledros_helper_deactivate_rest_api', 0);
}
add_action('after_switch_theme', 'caledros_helper_activate');