<?php
/**
 * Plugin Name: Admin UI Cleaner
 * Description: Cleanup WordPress admin area.
 * Version:     1.2.0
 * Author:      eLightUp
 * Author URI:  https://elightup.com
 * License:     GPL2+
 * Text Domain: admin-ui-cleaner
 * Domain Path: /languages/
 */

require __DIR__ . '/vendor/autoload.php';

new AUC\AdminBar;
new AUC\Login;

if ( ! is_admin() ) {
	return;
}

new AUC\Dashboard;
new AUC\Notices;
new AUC\Footer;
new AUC\AdminCSS;
new AUC\Integrations\Jetpack;

add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style( 'elu-admin-cleaner', plugin_dir_url( __FILE__ ) . '/cleaner.css' );
} );
