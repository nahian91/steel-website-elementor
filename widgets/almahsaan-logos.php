<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Almahsaan_Logos_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name(): string {
		return 'logos';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title(): string {
		return esc_html__( 'Logos', 'elementor-oembed-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon(): string {
		return 'eicon-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories(): array {
		return [ 'basic' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords(): array {
		return [ 'oembed', 'url', 'link' ];
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url(): string {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Whether the widget requires inner wrapper.
	 *
	 * Determine whether to optimize the DOM size.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return bool Whether to optimize the DOM size.
	 */
	public function has_widget_inner_wrapper(): bool {
		return false;
	}

	/**
	 * Whether the element returns dynamic content.
	 *
	 * Determine whether to cache the element output or not.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return bool Whether to cache the element output.
	 */
	protected function is_dynamic_content(): bool {
		return false;
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls(): void {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'url',
			[
				'label' => esc_html__( 'URL to embed', 'elementor-oembed-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render(): void {
		$settings = $this->get_settings_for_display();
		?>
		<!-- text-slider area start -->
        <section class="text-slider text-slider__section-space overflow-hidden">
        <div class="text-slider__slider carouselTicker carouselTicker-nav">
            <ul class="carouselTicker__list">
                <li><h2 data-text="ARCHITECTURE" class="title">ARCHITECTURE</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="INTORIOR" class="title">INTORIOR</h2></li>
                <li><img src="assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="CONSTRUCTION" class="title">CONSTRUCTION</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="ARCHITECTURE" class="title">ARCHITECTURE</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="INTORIOR" class="title">INTORIOR</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="CONSTRUCTION" class="title">CONSTRUCTION</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="ARCHITECTURE" class="title">ARCHITECTURE</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="INTORIOR" class="title">INTORIOR</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
                <li><h2 data-text="CONSTRUCTION" class="title">CONSTRUCTION</h2></li>
                <li><img src="<?php echo get_template_directory_uri();?>/assets/imgs/text-slider/star.png" alt="image not found"></li>
            </ul>
        </div>
    </section>
    <!-- text-slider area end -->
		<?php
	}

}
