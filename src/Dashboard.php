<?php
namespace AUC;

class Dashboard {
	public function __construct() {
		remove_action( 'welcome_panel', 'wp_welcome_panel' );

		add_action( 'wp_dashboard_setup', [ $this, 'remove_widgets' ] );
	}

	public function remove_widgets() {
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );

		// Gutenberg.
		remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );

		// Elementor.
		remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal' );
	}
}