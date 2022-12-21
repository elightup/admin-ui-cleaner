<?php
namespace AUC\Integrations;

class Jetpack {
	public function __construct() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'remove_external_media' ], 99 );
	}

	public function remove_external_media() {
		$js = '
			document.addEventListener( "DOMContentLoaded", function() {
				wp.hooks.removeFilter( "blocks.registerBlockType", "external-media/individual-blocks" );
				wp.hooks.removeFilter( "editor.MediaUpload", "external-media/replace-media-upload" );
			} );
		';
		wp_add_inline_script( 'jetpack-blocks-editor', $js );
	}
}