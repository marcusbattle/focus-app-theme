<?php

class FOCUS_Theme {
	
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'styles_and_scripts' ) );
	}
	
	public function styles_and_scripts() {
		wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'focus2015', get_template_directory_uri() . '/assets/css/focus.css' );
	}

}

$focus_theme = new FOCUS_Theme();