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
class Almahsaan_Projects_Widget extends \Elementor\Widget_Base {

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
		return esc_html__( 'Projects', 'elementor-oembed-widget' );
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
            <div class="row mb-55 mb-xs-40">
                <div class="col-lg-12">
                    <div class="section__title-wrapper text-center">
                        <h2 class="section__title title-animation" style="perspective: 100px;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 42.9333px 32px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Our</div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 90.5417px 32px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Projects</div></h2>
                    </div>
                </div>
            </div>

            <div class="row gx-100 mb-minus-60">

                <div class="col-lg-6">
                    <div class="latest-project__item">
                        <div class="latest-project__media">
                            <img class="wow clip-a-z" src="<?php echo get_template_directory_uri();?>/assets/imgs/latest-project/latest-project-1.jpg" alt="image not found" style="visibility: visible; animation-name: clip-a-z;">
                            <a class="icon" href="protfolio-details.html">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.48633 23.4867L22.4072 5.56579" stroke="#906E50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.3848 4.61475H23.3501V13.58" stroke="#906E50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>                                                                                          
                            </a>
                        </div>
                        <div class="latest-project__text">
                            <h5 class="title-animation" style="perspective: 100px;"><a href="protfolio-details.html">Government Sector</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="latest-project__item">
                        <div class="latest-project__media">
                            <img class="wow clip-a-z" src="<?php echo get_template_directory_uri();?>/assets/imgs/latest-project/latest-project-2.jpg" alt="image not found" style="visibility: visible; animation-name: clip-a-z;">
                            <a class="icon" href="protfolio-details.html">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.48633 23.4867L22.4072 5.56579" stroke="#906E50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.3848 4.61475H23.3501V13.58" stroke="#906E50" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>                                                                                          
                            </a>
                        </div>
                        <div class="latest-project__text">
                            <h5 class="title-animation" style="perspective: 100px;"><a href="protfolio-details.html">Private Sector</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
		<?php
	}

}
