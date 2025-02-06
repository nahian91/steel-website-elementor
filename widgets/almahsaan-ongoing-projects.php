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
class Almahsaan_Ongoing_Projects_Widget extends \Elementor\Widget_Base {

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
		return esc_html__( 'Ongoing Projects', 'elementor-oembed-widget' );
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
		<!-- recent-project area start -->
		<section class="recent-project section-space">
        <div class="container">
            <div class="row mb-60 mb-md-100 mb-sm-100 mb-xs-80 justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section__title-wrapper mb-20">
                        <span class="section__subtitle">Ongoing Project</span>
                        <h2 class="section__title title-animation">Our Ongoing Projects</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="recent-project__slider__arrow d-flex justify-content-lg-end justify-content-start">
                        <button class="recent-project__slider__arrow-prev d-flex align-items-center justify-content-center">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1L1 9L9 17" stroke="#080A0B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                                
                        </button>

                        <button class="recent-project__slider__arrow-next d-flex align-items-center justify-content-center">
                            <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L9 9L1 17" stroke="#080A0B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                      
                        </button>
                    </div>
                </div>
            </div>

            <div class="swiper recent-project__active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="recent-project__item">
                            <div class="recent-project__media">
                                <img src="<?php echo get_template_directory_uri();?>/assets/imgs/recent-project/recent-project-1.jpg" alt="image not found">

                                <a href="protfolio-details.php" class="recent-project__arrow">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.50684 18.5306L20.2812 2.01485" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.1182 0.978088L21.0834 1.0086L21.0529 9.97384" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="recent-project__text">
                                <h6>Custom furniture</h6>
                                <a href="protfolio-details.php">Explore More
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                            
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="recent-project__item">
                            <div class="recent-project__media">
                                <img src="<?php echo get_template_directory_uri();?>/assets/imgs/recent-project/recent-project-2.jpg" alt="image not found">

                                <a href="protfolio-details.php" class="recent-project__arrow">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.50684 18.5306L20.2812 2.01485" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.1182 0.978088L21.0834 1.0086L21.0529 9.97384" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="recent-project__text">
                                <h6>Residential projects</h6>
                                <a href="protfolio-details.php">Explore More
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                            
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="recent-project__item">
                            <div class="recent-project__media">
                                <img src="<?php echo get_template_directory_uri();?>/assets/imgs/recent-project/recent-project-3.jpg" alt="image not found">

                                <a href="protfolio-details.php" class="recent-project__arrow">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.50684 18.5306L20.2812 2.01485" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.1182 0.978088L21.0834 1.0086L21.0529 9.97384" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="recent-project__text">
                                <h6>Family Apartment</h6>
                                <a href="protfolio-details.php">Explore More
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                            
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="recent-project__item">
                            <div class="recent-project__media">
                                <img src="<?php echo get_template_directory_uri();?>/assets/imgs/recent-project/recent-project-4.jpg" alt="image not found">

                                <a href="protfolio-details.php" class="recent-project__arrow">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.50684 18.5306L20.2812 2.01485" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.1182 0.978088L21.0834 1.0086L21.0529 9.97384" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="recent-project__text">
                                <h6>Eco-friendly design</h6>
                                <a href="protfolio-details.php">Explore More
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                            
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="recent-project__item">
                            <div class="recent-project__media">
                                <img src="<?php echo get_template_directory_uri();?>/assets/imgs/recent-project/recent-project-5.jpg" alt="image not found">

                                <a href="protfolio-details.php" class="recent-project__arrow">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.50684 18.5306L20.2812 2.01485" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.1182 0.978088L21.0834 1.0086L21.0529 9.97384" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="recent-project__text">
                                <h6>Eco-friendly design</h6>
                                <a href="protfolio-details.php">Explore More
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                                            
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- recent-project area end -->
		<?php
	}

}
