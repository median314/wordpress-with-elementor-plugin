<?php
/**
 * Plugin Name: Widget Elementor
 * Description: Buatan gw nih anjay.
 * Version:     1.0.0
 * Author:      Median Ganteng
 * Author URI:  https://crm.autopilot.co.id/
 * Text Domain: elementor-addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 * Elementor Pro tested up to: 3.21.0
 */

function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/hello-widget1.php' );
	require_once( __DIR__ . '/widgets/hello-widget2.php' );

	$widgets_manager->register( new \Elementor_Hello_World_Widget_1() );
	$widgets_manager->register( new \Elementor_Hello_World_Widget_2() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );