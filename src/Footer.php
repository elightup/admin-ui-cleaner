<?php
namespace ELUAdminCleaner;

class Footer {
	public function __construct() {
		add_filter( 'admin_footer_text', '__return_empty_string' );
		add_filter( 'update_footer', '__return_empty_string', 9999 );
	}
}