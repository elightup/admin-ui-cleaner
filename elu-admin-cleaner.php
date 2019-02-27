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

if ( ! is_admin() ) {
	return;
}

new ELUAdminCleaner\Dashboard;

add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style( 'elu-admin-cleaner', plugin_dir_url( __FILE__ ) . '/cleaner.css' );
} );

// Footer text.
add_filter( 'admin_footer_text', '__return_empty_string' );
add_filter( 'update_footer', '__return_empty_string', 9999 );