<?php
namespace ELUAdminCleaner;

class Notices {
	public function __construct() {
		add_action( 'admin_init', [ $this, 'init' ] );
	}

	public function init() {
		// Ultimate Addons for Beaver Builder/Elementor.
		remove_action( 'admin_notices', 'bsf_notices', 1000 );
		remove_action( 'network_admin_notices', 'bsf_notices', 1000 );
	}
}