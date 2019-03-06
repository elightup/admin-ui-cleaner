<?php
/**
 * Plugin Name: Admin UI Cleaner
 * Plugin URI:  https://elightup.com
 * Description: Cleanup WordPress admin area.
 * Version:     0.0.1
 * Author:      eLightUp
 * Author URI:  https://elightup.com
 * License:     GPL2+
 * Text Domain: admin-ui-cleaner
 * Domain Path: /languages/
 */

require 'vendor/autoload.php';

new AUC\AdminBar;
new AUC\Login;

if ( ! is_admin() ) {
	return;
}

new AUC\Dashboard;
new AUC\Notices;
new AUC\Footer;

add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style( 'elu-admin-cleaner', plugin_dir_url( __FILE__ ) . '/cleaner.css' );
} );
