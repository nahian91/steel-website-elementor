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
class Almahsaan_Banner_Widget extends \Elementor\Widget_Base {

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
		return 'banner';
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
		return esc_html__( 'Banner', 'elementor-oembed-widget' );
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
		<section class="banner-2">
        <div class="swiper banner-2__slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-2__item" data-background="./assets/imgs/banner-2/banner-1.jpg">
                        <div class="container">
                            <div class="banner-2__content">
                                <div class="banner-2__shape">
                                    <img src="./assets/imgs/banner-2/shape.png" alt="image not found">
                                </div>
                                <h6 class="banner-2__content-subtitle">
                                    Creative Architecture
                                    <svg width="40" height="19" viewBox="0 0 40 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29 13L34 18L39 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.75 0H0V1.5H0.75H33.25V16.75C33.25 17.1642 33.5858 17.5 34 17.5C34.4142 17.5 34.75 17.1642 34.75 16.75V0.75V0H34.5H33.75H33.25H0.75Z" fill="white"/>
                                    </svg>                                                                            
                                </h6>
                                <h1 class="banner-2__content-title">Architecture With People in Mind.</h1>
                                <p class="description mb-0">Take your business to the next level with Breeza Business agency for business Idea management tools for you</p>

                                <div class="banner-2__btn-box mt-40">
                                    <a href="#" class="rr-btn rr-btn__border">
                                        <span class="btn-wrap">
                                            <span class="text-one">Get In Touch
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <span class="text-two">Get In Touch
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
        
                                    <div class="banner-2__btn-box-wrapper">
                                        <a href="https://www.youtube.com/watch?v=vkew-1KK3Sc" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
                                            <div class="icon zooming">
                                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 0V17.5L13.75 8.75L0 0Z" fill="white"/>
                                                </svg>
                                            </div>
                                            <span>Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-2__item" data-background="./assets/imgs/banner-2/banner-2.jpg">
                        <div class="container">
                            <div class="banner-2__content">
                                <div class="banner-2__shape">
                                    <img src="./assets/imgs/banner-2/shape.png" alt="image not found">
                                </div>
                                <h6 class="banner-2__content-subtitle">
                                    Creative Architecture
                                    <svg width="40" height="19" viewBox="0 0 40 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29 13L34 18L39 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.75 0H0V1.5H0.75H33.25V16.75C33.25 17.1642 33.5858 17.5 34 17.5C34.4142 17.5 34.75 17.1642 34.75 16.75V0.75V0H34.5H33.75H33.25H0.75Z" fill="white"/>
                                    </svg>                                                                            
                                </h6>
                                <h1 class="banner-2__content-title">Architecture With People in Mind.</h1>
                                <p class="description mb-0">Take your business to the next level with Breeza Business agency for business Idea management tools for you</p>

                                <div class="banner-2__btn-box mt-40">
                                    <a href="#" class="rr-btn rr-btn__border">
                                        <span class="btn-wrap">
                                            <span class="text-one">Get In Touch
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <span class="text-two">Get In Touch
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
        
                                    <div class="banner-2__btn-box-wrapper">
                                        <a href="https://www.youtube.com/watch?v=vkew-1KK3Sc" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
                                            <div class="icon zooming">
                                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 0V17.5L13.75 8.75L0 0Z" fill="white"/>
                                                </svg>
                                            </div>
                                            <span>Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-2__item" data-background="./assets/imgs/banner-2/banner-3.jpg">
                        <div class="container">
                            <div class="banner-2__content">
                                <div class="banner-2__shape">
                                    <img src="./assets/imgs/banner-2/shape.png" alt="image not found">
                                </div>
                                <h6 class="banner-2__content-subtitle">
                                    Creative Architecture
                                    <svg width="40" height="19" viewBox="0 0 40 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M29 13L34 18L39 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.75 0H0V1.5H0.75H33.25V16.75C33.25 17.1642 33.5858 17.5 34 17.5C34.4142 17.5 34.75 17.1642 34.75 16.75V0.75V0H34.5H33.75H33.25H0.75Z" fill="white"/>
                                    </svg>                                                                            
                                </h6>
                                <h1 class="banner-2__content-title">Architecture With People in Mind.</h1>
                                <p class="description mb-0">Take your business to the next level with Breeza Business agency for business Idea management tools for you</p>

                                <div class="banner-2__btn-box mt-40">
                                    <a href="#" class="rr-btn rr-btn__border">
                                        <span class="btn-wrap">
                                            <span class="text-one">Get In Touch
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <span class="text-two">Get In Touch
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </span>
                                    </a>
        
                                    <div class="banner-2__btn-box-wrapper">
                                        <a href="https://www.youtube.com/watch?v=vkew-1KK3Sc" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
                                            <div class="icon zooming">
                                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 0V17.5L13.75 8.75L0 0Z" fill="white"/>
                                                </svg>
                                            </div>
                                            <span>Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" banner-2__slider__arrow d-flex justify-content-lg-end justify-content-start">
                <button class=" banner-2__slider__arrow-prev d-flex align-items-center justify-content-center">
                    PREV
                        
                </button>

                <button class=" banner-2__slider__arrow-next d-flex align-items-center justify-content-center">
                    NEXT                   
                </button>
            </div>
        </div>
    </section>
    <!-- "banner-2 area end -->
		<?php
	}

}
