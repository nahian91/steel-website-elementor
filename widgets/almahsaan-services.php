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
class Almahsaan_Services_Widget extends \Elementor\Widget_Base {

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
		return esc_html__( 'Services', 'elementor-oembed-widget' );
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
		 <section class="what-we-do section-space">
        <div class="container">
            <div class="row">
                <div class="section__title-wrapper text-center mb-55 mb-xs-40">
                    <span class="section__subtitle justify-content-center">What We Do</span>
                    <h2 class="section__title title-animation" style="perspective: 100px;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 42.2083px 32px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">The</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 48px 32px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">best</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 92.1333px 32px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Services</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 35.6833px 32px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">We</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 85.0833px 32px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Provide</div></h2>
                </div>
            </div>

            <div class="what-we-do__wrapper">
                <div class="what-we-do__bg">
                    <img src="<?php echo get_template_directory_uri();?>//assets/imgs/what-we-do/shape.png" alt="">
                </div>
                <div class="row">
                <div class="col-xl-4 has--border has--border-1">
                    <div class="what-we-do__item has--padding-pb">
                        <div class="what-we-do__item-icon">
                            <img src="<?php echo get_template_directory_uri();?>//assets/imgs/what-we-do/what-we-do-1.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 32.3667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Home</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 41.05px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Interior</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></a></h6>
                            <p class="what-we-do__item-desc">Sagitis himos pulvinar morb socis laoreet posuere enim non auctor etiam pretium libero</p>
                            <a href="service-details.html" class="what-we-do__item-arrow">
                                Read More
                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
    
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 has--border has--border-2">
                    <div class="what-we-do__item has--padding-pb">
                        <div class="what-we-do__item-icon">
                            <img src="<?php echo get_template_directory_uri();?>//assets/imgs/what-we-do/what-we-do-2.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 32.3667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Home</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 44.3333px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Exterior</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></a></h6>
                            <p class="what-we-do__item-desc">Sagitis himos pulvinar morb socis laoreet posuere enim non auctor etiam pretium libero</p>
                            <a href="service-details.html" class="what-we-do__item-arrow">
                                Read More
                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
    
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 has--border has--border-3">
                    <div class="what-we-do__item has--padding-pb">
                        <div class="what-we-do__item-icon">
                            <img src="<?php echo get_template_directory_uri();?>//assets/imgs/what-we-do/what-we-do-3.png" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 35.8833px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">2D/3D</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.4667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Layout</div></a></h6>
                            <p class="what-we-do__item-desc">Sagitis himos pulvinar morb socis laoreet posuere enim non auctor etiam pretium libero</p>
                            <a href="service-details.html" class="what-we-do__item-arrow">
                                Read More
                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
    
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 has--border has--border-4">
                    <div class="what-we-do__item has--padding">
                        <div class="what-we-do__item-icon">
                            <img src="<?php echo get_template_directory_uri();?>//assets/imgs/what-we-do/what-we-do-4.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 58.1083px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Furniture's</div> <div style="position: relative; display: inline-block; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></a></h6>
                            <p class="what-we-do__item-desc">Sagitis himos pulvinar morb socis laoreet posuere enim non auctor etiam pretium libero</p>
                            <a href="service-details.html" class="what-we-do__item-arrow">
                                Read More
                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
    
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 has--border has--border-5">
                    <div class="what-we-do__item has--padding">
                        <div class="what-we-do__item-icon">
                            <img src="<?php echo get_template_directory_uri();?>//assets/imgs/what-we-do/what-we-do-5.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 42.2917px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Modern</div> <div style="position: relative; display: inline-block; transform-origin: 32.3667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Home</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 41.05px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Interior</div></a></h6>
                            <p class="what-we-do__item-desc">Sagitis himos pulvinar morb socis laoreet posuere enim non auctor etiam pretium libero</p>
                            <a href="service-details.html" class="what-we-do__item-arrow">
                                Read More
                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
    
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 has--border has--border-6">
                    <div class="what-we-do__item has--padding">
                        <div class="what-we-do__item-icon">
                            <img src="<?php echo get_template_directory_uri();?>//assets/imgs/what-we-do/what-we-do-6.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 41.6417px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Custom</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 24.1583px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Plan</div></a></h6>
                            <p class="what-we-do__item-desc">Sagitis himos pulvinar morb socis laoreet posuere enim non auctor etiam pretium libero</p>
                            <a href="service-details.html" class="what-we-do__item-arrow">
                                Read More
                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
    
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
		<?php
	}

}
