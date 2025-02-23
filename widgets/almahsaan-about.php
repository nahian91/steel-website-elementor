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
class Almahsaan_About_Widget extends \Elementor\Widget_Base {

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
		return 'about';
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
		return esc_html__( 'About', 'elementor-oembed-widget' );
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
		return 'eicon-user-circle-o';
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
		return [ 'almahsaan-category' ];
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
		<!--about-us area start -->
		<section class="about-us section-space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us__media">
                        <img class="wow clip-a-z" src="./assets/imgs/about-us/about.jpg" alt="image not found">

                        <div class="about-us__box">
                            <h4><span class="odometer" data-count="20">0</span></h4>
                            <h6>Years <br> Experience</h6>
                        </div>

                        <div class="about-us__socail">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-us__content">
                        <div class="section__title-wrapper mb-45 mb-xs-40">
                            <span class="section__subtitle justify-content-center">Welcome To Artima</span>
                            <h2 class="section__title mb-25 title-animation">Interior Design with Different Approach</h2>
                            <p class="mb-0">Et purus duis sollicitudin dignissim habitant. Egestas nulla quis venenatis cras sed eu massa eu faucibus Urna fusce Et purus duis sollicitudin dig- nissim habitant.</p>
                        </div>

                        <div class="skill-one__progress mb-50 mb-xs-30">
                            <div class="skill-one__progress-single">
                                <h6 class="skill-one__progress-title">Interior Design</h6>
                                <div class="bar">
                                    <div class="bar-inner count-bar counted" data-percent="90%">
                                        <div class="count-text">90%</div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="skill-one__progress-single">
                                <h6 class="skill-one__progress-title">Architecture</h6>
                                <div class="bar">
                                    <div class="bar-inner count-bar counted" data-percent="80%">
                                        <div class="count-text">80%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="skill-one__progress-single">
                                <h6 class="skill-one__progress-title">3D Design</h6>
                                <div class="bar">
                                    <div class="bar-inner count-bar counted" data-percent="95%">
                                        <div class="count-text">95%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <a href="about-us.html" class="rr-btn">
                            <span class="btn-wrap">
                                <span class="text-one">Learn More 
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <span class="text-two">Learn More 
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about-us area end -->
		<?php
	}

}
