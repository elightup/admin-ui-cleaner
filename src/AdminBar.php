<?php
namespace AUC;

class AdminBar {
	public function __construct() {
		add_action( 'admin_bar_menu', [ $this, 'remove_items' ], 20 );
	}

	public function remove_items( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'wp-logo' );
	}
}
