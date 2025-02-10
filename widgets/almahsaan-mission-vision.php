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
class Almahsaan_Mission_Vision_Widget extends \Elementor\Widget_Base {

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
		return 'mission';
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
		return esc_html__( 'Mision Vision', 'elementor-oembed-widget' );
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
		<section class="latest-project section-space">
        <div class="container">
            <div class="row gx-100 mb-minus-60">
                <div class="col-lg-6">
                    <div class="latest-project__item">
                        <div class="latest-project__media">
                            <img class="wow clip-a-z" src="./assets/imgs/mission.jpg" alt="image not found" style="visibility: visible; animation-name: clip-a-z;">
                        </div>
                        <div class="latest-project__text">
                            <h5 class="title-animation" style="perspective: 100px;"><a href="protfolio-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 98.3px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 29.4333px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Our</div></div> <div style="position: relative; display: inline-block; transform-origin: 50.5917px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; transform-origin: 59.4833px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Mission</div></div></a></h5>
                            <p>Our core objective is to sustain plans of growth in the Manufacturing domain and expand our array in quality products by means of candid practices that will positively impact our Brand Equity and Clientsâ€™ loyalty.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="latest-project__item">
                        <div class="latest-project__media">
                            <img class="wow clip-a-z" src="./assets/imgs/vission.jpg" alt="image not found" style="visibility: visible; animation-name: clip-a-z;">
                        </div>
                        <div class="latest-project__text">
                            <h5 class="title-animation" style="perspective: 100px;"><a href="protfolio-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 55.3917px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 29.4333px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Our</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 50.5917px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; transform-origin: 48.3px 20px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Vision</div></div></a></h5>
                            <p>Moving the establishment forward to an imminent superior standing, by delivering unrivaled value products truthful to the tradition of business conduct and the ethics of industry practices.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
		<?php
	}

}
