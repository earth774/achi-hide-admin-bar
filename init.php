<?php

/**
 * Plugin Name:     Achi Hide Admin Bar
 * Plugin URI:      https://wordpress.org/plugins/achi-hide-admin-bar     
 * Description:     A simple plugin to hide and show the WordPress admin bar.
 * Version:         1.0.0          
 * Requires at least: 6.4.2 
 * Requires PHP:    8.0 
 * Author:          Sutthipong Nuanma
 * Author URI:      https://amiearth.com/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

require __DIR__ . '/helpers.php';
require __DIR__ . '/vendor/autoload.php';
Achi\HideAdminBar\Setup::init();

