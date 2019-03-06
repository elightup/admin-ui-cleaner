<?php
/**
 * Plugin Name: ELU Admin Cleaner
 * Plugin URI:  https://elightup.com
 * Description: Cleanup WordPress admin area.
 * Version:     0.0.1
 * Author:      eLightUp
 * Author URI:  https://elightup.com
 * License:     GPL2+
 * Text Domain: elu-admin-cleaner
 * Domain Path: /languages/
 */

require 'vendor/autoload.php';

new ELUAdminCleaner\AdminBar;

if ( ! is_admin() ) {
	return;
}

new ELUAdminCleaner\Dashboard;
new ELUAdminCleaner\Notices;
new ELUAdminCleaner\Footer;


add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style( 'elu-admin-cleaner', plugin_dir_url( __FILE__ ) . '/cleaner.css' );
} );
