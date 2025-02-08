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
		 <section class="about-us section-space__bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-us__media">
                        <img class="wow clip-a-z" src="<?php echo get_template_directory_uri();?>/assets/imgs/about-us/about.jpg" alt="image not found" style="visibility: visible; animation-name: clip-a-z;">

                        <div class="about-us__box">
                            <h4><span class="odometer odometer-auto-theme" data-count="20"><div class="odometer-inside"><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">2</span></span></span></span></span><span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value">0</span></span></span></span></span></div></span></h4>
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
                        <h2 class="section__title mb-25 title-animation" >Welcome to AL MASHAAN STEEL CO.</h2>
                        <p>Since 2006, Al Mashaan Steel Co. has forged a strong legacy in Kuwait’s metal fabrication industry by blending innovation with superior craftsmanship. Over the years, we have continually refined our techniques and expanded our expertise, delivering exceptional steel fabrication solutions from architectural metal works to fire rated and stainless steel doors that meet and exceed global standards. Our longstanding commitment to quality, reliability, and customer satisfaction sets us apart as a trusted leader in the field. </p>
                        <p class="mb-0">At Al Mashaan Steel Co., we specialise in comprehensive structural and architectural metal fabrication, offering top-quality solutions in stainless steel, mild steel, and galvanised steel. As an internationally recognized manufacturer of metal fire-rated and stainless steel doors, all our products are rigorously tested and certified to BS 476: Part 22 standards for superior safety and durability. Our range includes:</p>
                            <p><br>Each product is supported by authoritative certifications and licenses, ensuring the highest quality and compliance:</p>
                            <ul style="list-style: none" class="mb-20">
                                <li><strong>Product Certification: UKAZ No. 012</strong></li>
                                <li><strong>Quality Certification: BM Trada Product No. 565</strong></li>
                                <li><strong>Fire Testing: Certified International Fire Laboratory</strong></li>
                                <li><strong>Kuwait Fire Brigade Licenses: No. 372 &amp; 118</strong></li>
                            </ul>
                            <p>Our unwavering commitment to innovation, supported by seasoned professionals and advanced manufacturing techniques, ensures that our products consistently surpass industry standards. By blending global insight with local expertise, Al Mashaan Steel Co. crafts tailor-made metal solutions designed to withstand the test of time and meet the evolving demands of modern infrastructure.</p>
    
                            <a href="contact.php" class="rr-btn__header">
                                        <span class="btn-wrap">
                                            <span class="text-one">Company Profile
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                            <span class="text-two">Company Profile
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
		<?php
	}

}
