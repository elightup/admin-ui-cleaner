<?php
namespace AUC;

class Notices {
	public function __construct() {
		add_action( 'admin_init', [ $this, 'init' ] );
	}

	public function init() {
		remove_action( 'admin_notices', 'update_nag', 3 );
		remove_action( 'network_admin_notices', 'update_nag', 3 );

		// Ultimate Addons for Beaver Builder/Elementor.
		remove_action( 'admin_notices', 'bsf_notices', 1000 );
		remove_action( 'network_admin_notices', 'bsf_notices', 1000 );
	}
}