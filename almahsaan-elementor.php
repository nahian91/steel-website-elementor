<?php
/**
 * Plugin Name: Al Mashaan Steel Elementor
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://devnahian.com/about-me
 * Version:     1.0.0
 * Author:      Abdullah Nahian
 * Author URI:  https://devnahian.com/about-me
 * Text Domain: almashaansteel-elementor
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
	require_once( __DIR__ . '/widgets/almahsaan-process.php' );
	require_once( __DIR__ . '/widgets/almahsaan-projects.php' );
	require_once( __DIR__ . '/widgets/almahsaan-section-title.php' );
	require_once( __DIR__ . '/widgets/almahsaan-banner.php' );
	require_once( __DIR__ . '/widgets/almahsaan-gallery.php' );
	require_once( __DIR__ . '/widgets/almahsaan-image-faqs.php' );

	$widgets_manager->register( new \Almahsaan_About_Widget() );
	$widgets_manager->register( new \Almahsaan_Breadcumb_Widget() );
	$widgets_manager->register( new \Almahsaan_Counter_Widget() );
	$widgets_manager->register( new \Almahsaan_Faqs_Widget() );
	$widgets_manager->register( new \Almahsaan_Image_Faqs_Widget() );
	$widgets_manager->register( new \Almahsaan_Process_Widget() );
	$widgets_manager->register( new \Almahsaan_Projects_Widget() );
	$widgets_manager->register( new \Almahsaan_Section_Title_Widget() );
	$widgets_manager->register( new \Almahsaan_Banner_Widget() );
	$widgets_manager->register( new \Almahsaan_Gallery_Widget() );

}
add_action( 'elementor/widgets/register', 'register_oembed_widget' );

function my_elementor_addon_enqueue_scripts() {
    // CSS File
    wp_enqueue_style(
        'my-elementor-addon-style', 
        plugin_dir_url(__FILE__) . 'assets/css/main.css',
        [],
        '1.0.0'
    );

    // JS File
    wp_enqueue_script(
        'my-elementor-addon-script',
        plugin_dir_url(__FILE__) . 'assets/js/main.js',
        ['jquery'],
        '1.0.0',
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'my_elementor_addon_enqueue_scripts');

