<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Gallery Widget.
 *
 * Elementor widget that inserts an image gallery into the page.
 *
 * @since 1.0.0
 */
class Almahsaan_Gallery_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve gallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name(): string {
		return 'alsteel_gallery';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve gallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title(): string {
		return esc_html__( 'Gallery', 'elementor-oembed-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve gallery widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon(): string {
		return 'eicon-gallery-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the gallery widget belongs to.
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
	 * Retrieve the list of keywords the gallery widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords(): array {
		return [ 'gallery', 'image', 'photo' ];
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
	 * Register gallery widget controls.
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
			'gallery_list',
			[
				'label' => esc_html__( 'Gallery List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'gallery_img',
						'label' => esc_html__( 'Image', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'label_block' => true,
					],
					[
						'name' => 'gallery_title',
						'label' => esc_html__( 'Gallery Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Gallery Title', 'textdomain' ),
						'label_block' => true,
					],
					[
						'name' => 'gallery_url',
						'label' => esc_html__( 'Gallery URL', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::URL,
						'label_block' => true,
					]
				],
				'title_field' => '{{{ gallery_title }}}',
			]
		);			

		$this->end_controls_section();

	}

	/**
	 * Render gallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render(): void {
		$settings = $this->get_settings_for_display();
		$gallery_list = $settings['gallery_list'] ?? [];

		if (!empty($gallery_list) && is_array($gallery_list)) {
			?>
			<div class="container-fluid">
				<div class="row">
					<?php foreach ($gallery_list as $gallery): 
						$gallery_img = $gallery['gallery_img']['url'] ?? '';
						$gallery_title = $gallery['gallery_title'] ?? ''; 
						$gallery_url = $gallery['gallery_url']['url'] ?? ''; 
					?>
						
						<div class="col-md-4">
							<div class="almahsaan-image-hover">
								<?php if (!empty($gallery_img)): ?>
									<img src="<?php echo esc_url($gallery_img); ?>" alt="<?php echo esc_attr($gallery_title); ?>">
								<?php endif; ?>

								<div class="almahsaan-image-content">
									<h4><?php echo esc_html($gallery_title); ?></h4>
									<?php 
										if($gallery_url) {
											?>
												<a href="#"><?php echo esc_html__('Find out more', 'textdomain'); ?> <i class="fa-solid fa-plus"></i></a>
											<?php 
										}
									?>
									
								</div>
							</div>
						</div>    
					<?php endforeach; ?>
				</div>
			</div>
			<?php
		}
	}

}
