<?php
namespace AUC;

class AdminCSS {
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'add_menu' ] );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
		add_action( 'admin_head', [ $this, 'output_css' ] );
	}

	public function add_menu() {
		add_options_page( __( 'Admin UI Cleaner', 'admin-ui-cleaner' ), __( 'Admin UI Cleaner', 'admin-ui-cleaner' ), 'manage-options', 'admin-ui-cleaner', [ $this, 'render' ] );
	}

	public function render() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form method="POST" action="options.php">
				<?php
				settings_fields( 'admin-ui-cleaner' );
				do_settings_sections( 'admin-ui-cleaner' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	public function register_settings() {
		register_setting( 'admin-ui-cleaner', 'admin_ui_cleaner' );
		add_settings_section( 'general', ' ', '__return_empty_string', 'admin-ui-cleaner' );
    	add_settings_field( 'css', __( 'Admin CSS', 'admin-ui-cleaner' ), [ $this, 'render_css_field' ], 'admin-ui-cleaner', 'general' );
	}

	public function render_css_field() {
		?>
		<textarea name="admin_ui_cleaner[css]" class="large-text" rows="10" style="font-family: monospace;"><?php echo esc_textarea( $this->get_css() ); ?></textarea>
		<?php
	}

	public function output_css() {
		$css = $this->get_css();
		if ( $css ) {
			echo '<style>', esc_html( $css ), '</style>';
		}
	}

	private function get_css() {
		$option = get_option( 'admin_ui_cleaner', [] );
		return isset( $option['css'] ) ? $option['css'] : '';
	}
}