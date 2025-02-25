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

	require_once( __DIR__ . '/widgets/almahsaan-image-box.php' );
	require_once( __DIR__ . '/widgets/almahsaan-breadcumb.php' );
	require_once( __DIR__ . '/widgets/almahsaan-faqs.php' );
	require_once( __DIR__ . '/widgets/almahsaan-process.php' );
	require_once( __DIR__ . '/widgets/almahsaan-banner.php' );
	require_once( __DIR__ . '/widgets/almahsaan-gallery.php' );
	require_once( __DIR__ . '/widgets/almahsaan-projects-slider.php' );

	$widgets_manager->register( new \Almahsaan_Image_Box_Widget() );
	$widgets_manager->register( new \Almahsaan_Breadcumb_Widget() );
	$widgets_manager->register( new \Almahsaan_Faqs_Widget() );
	$widgets_manager->register( new \Almahsaan_Process_Widget() );
	$widgets_manager->register( new \Almahsaan_Banner_Widget() );
	$widgets_manager->register( new \Almahsaan_Gallery_Widget() );
	$widgets_manager->register( new \Almahsaan_Projects_Slider_Widget() );

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

    wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], '2.3.4');
    wp_enqueue_style('owl-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], '2.3.4');
    wp_enqueue_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['jquery'], '2.3.4', true);
    wp_enqueue_script('mixitup-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.min.js', ['jquery'], '2.3.4', true);
}
add_action('wp_enqueue_scripts', 'my_elementor_addon_enqueue_scripts');

/**
 * Register a custom category for Elementor widgets.
 *
 * @param \Elementor\Elements_Manager $elements_manager Elementor elements manager.
 */
function register_almahsaan_elementor_category( $elements_manager ) {
    $elements_manager->add_category(
        'almahsaan-category',
        [
            'title' => __( 'Al Mashaan Steel', 'almashaansteel-elementor' ),
            'icon'  => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'register_almahsaan_elementor_category' );
