<?php

class FOCUS_Theme {
	
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'styles_and_scripts' ) );
		add_filter( 'show_admin_bar', '__return_false' );
		add_filter( 'task_due_date', array( $this, 'filter_task_due_date' ), 10, 2 );
	}
	
	public function styles_and_scripts() {
		wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'focus2015', get_template_directory_uri() . '/assets/css/focus.css' );
	}

	public function filter_task_due_date( $task_id, $due_date = '' ) {

		$current_time = current_time('timestamp');
		$due_date = get_post_meta( $task_id, 'due_date', true );

		if ( $current_time > $due_date ) {
			$due_date = human_time_diff( $due_date, current_time('timestamp') ) . ' ago';
		} else {
			$due_date = date('l', get_post_meta( $task_id, 'due_date', true ) );
		}

		return $due_date;

	}

}

$focus_theme = new FOCUS_Theme();