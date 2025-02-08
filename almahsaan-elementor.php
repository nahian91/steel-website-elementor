<?php
/**
 * Plugin Name: Elementor oEmbed Widget
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-oembed-widget
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register oEmbed Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_oembed_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/almahsaan-about.php' );
	require_once( __DIR__ . '/widgets/almahsaan-breadcumb.php' );
	require_once( __DIR__ . '/widgets/almahsaan-counter.php' );
	require_once( __DIR__ . '/widgets/almahsaan-faqs.php' );
	require_once( __DIR__ . '/widgets/almahsaan-ongoing-projects.php' );
	require_once( __DIR__ . '/widgets/almahsaan-process.php' );
	require_once( __DIR__ . '/widgets/almahsaan-projects.php' );
	require_once( __DIR__ . '/widgets/almahsaan-section-title.php' );
	require_once( __DIR__ . '/widgets/almahsaan-services.php' );
	require_once( __DIR__ . '/widgets/almahsaan-banner.php' );
	require_once( __DIR__ . '/widgets/almahsaan-logos.php' );
	require_once( __DIR__ . '/widgets/almahsaan-contact1.php' );

	$widgets_manager->register( new \Almahsaan_About_Widget() );
	$widgets_manager->register( new \Almahsaan_Breadcumb_Widget() );
	$widgets_manager->register( new \Almahsaan_Counter_Widget() );
	$widgets_manager->register( new \Almahsaan_Faqs_Widget() );
	$widgets_manager->register( new \Almahsaan_Ongoing_Projects_Widget() );
	$widgets_manager->register( new \Almahsaan_Process_Widget() );
	$widgets_manager->register( new \Almahsaan_Projects_Widget() );
	$widgets_manager->register( new \Almahsaan_Section_Title_Widget() );
	$widgets_manager->register( new \Almahsaan_Services_Widget() );
	$widgets_manager->register( new \Almahsaan_Logos_Widget() );
	$widgets_manager->register( new \Almahsaan_Banner_Widget() );
	$widgets_manager->register( new \Almahsaan_Contact1_Widget() );

}
add_action( 'elementor/widgets/register', 'register_oembed_widget' );
