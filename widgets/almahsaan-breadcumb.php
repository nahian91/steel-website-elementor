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
class Almahsaan_Breadcumb_Widget extends \Elementor\Widget_Base {

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
		return 'oembed';
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
		return esc_html__( 'Breadcumb', 'elementor-oembed-widget' );
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
		<section class="experience"> 
        <div class="container">
            <div class="experience__item-wrapper">
                <div class="experience__item">
                    <div class="experience__item-content">
                        <div class="experience__item-content-icon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/imgs/experience/experience-1.svg" alt="image not found">
                        </div>
                        <div class="experience__item-content-text">
                            <h6 class="title-animation" style="perspective: 100px;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 23.7667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Years</div> <div style="position: relative; display: inline-block; transform-origin: 10.6px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Of</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 50.125px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Experience</div></h6>
                            <h2><span class="odometer odometer-auto-theme" data-count="15"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">1</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">5</span></span></span></span></span></div></span>+</h2>
                        </div>
                    </div>
                </div>

                <div class="experience__item">
                    <div class="experience__item-content">
                        <div class="experience__item-content-icon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/imgs/experience/experience-2.svg" alt="image not found">
                        </div>
                        <div class="experience__item-content-text">
                            <h6 class="title-animation" style="perspective: 100px;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 35.7667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Success</div> <div style="position: relative; display: inline-block; transform-origin: 36.4333px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Projects</div></h6>
                            <h2><span class="odometer odometer-auto-theme" data-count="600"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">6</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>+</h2>
                        </div>
                    </div>
                </div>

                <div class="experience__item">
                    <div class="experience__item-content">
                        <div class="experience__item-content-icon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/imgs/experience/experience-3.svg" alt="image not found">
                        </div>
                        <div class="experience__item-content-text">
                            <h6 class="title-animation" style="perspective: 100px;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 24.8333px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Team</div> <div style="position: relative; display: inline-block; transform-origin: 43.0917px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Members</div></h6>
                            <h2><span class="odometer odometer-auto-theme" data-count="40"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">4</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>+</h2>
                        </div>
                    </div>
                </div>

                <div class="experience__item">
                    <div class="experience__item-content">
                        <div class="experience__item-content-icon">
                            <img src="<?php echo get_template_directory_uri();?>/assets/imgs/experience/experience-4.svg" alt="image not found">
                        </div>
                        <div class="experience__item-content-text">
                            <h6 class="title-animation" style="perspective: 100px;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 30.7917px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Clients</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 56.8917px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Satisfactions</div></h6>
                            <h2><span class="odometer odometer-auto-theme" data-count="500"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">5</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span>+</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
		<?php
	}

}
