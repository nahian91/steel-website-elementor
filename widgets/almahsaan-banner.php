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
		return 'almashaan-carousel';
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
		return 'eicon-banner';
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
			'banners_list',
			[
				'label' => esc_html__( 'Banners List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'banner_img',
						'label' => esc_html__( 'Image', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'label_block' => true,
					],
					[
						'name' => 'banner_title',
						'label' => esc_html__( 'Gallery Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Gallery Title', 'textdomain' ),
						'label_block' => true,
					],
					[
						'name' => 'banner_desc',
						'label' => esc_html__( 'Gallery Description', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'label_block' => true,
					],
					[
						'name' => 'banner_features',
						'label' => esc_html__( 'Gallery Features', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'label_block' => true,
					],
					[
						'name' => 'banner_url',
						'label' => esc_html__( 'Gallery URL', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::URL,
						'label_block' => true,
					]
				],
				'title_field' => '{{{ banner_title }}}',
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
		$banners_list = $settings['banners_list'];
		?>
        <div class="container">
			<div id="almashaanBanner" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
    <?php 
        $first_item = true; // Flag to check the first item
        foreach($banners_list as $list) {
            $banner_img = $list['banner_img']['url'];
            $banner_title = $list['banner_title'];
            $banner_desc = $list['banner_desc'];
            $banner_features = $list['banner_features'];
            $banner_url = $list['banner_url'];
            ?>
            <div class="carousel-item <?php echo $first_item ? 'active' : ''; ?>">
                <div class="row align-items-center">
                    <!-- Content Column -->
                    <div class="col-md-7">
                        <div class="almashaan-slider-content">
                            <h4><?php echo $banner_title;?></h4>
                            <p><?php echo $banner_desc;?></p>
                            <?php echo $banner_features;?>
                            <a href="<?php echo $banner_url;?>">learn more</a>
                        </div>
                    </div>
                    <!-- Image Column -->
                    <div class="col-md-5">
                        <img src="<?php echo $banner_img;?>" class="d-block w-100">
                    </div>
                </div>
            </div>
            <?php 
            $first_item = false; // Set flag to false after first iteration
        }
    ?>
</div>

				<button class="carousel-control-prev" type="button" data-bs-target="#almashaanBanner" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#almashaanBanner" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
		<?php
	}

}
