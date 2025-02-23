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
class Almahsaan_Counter_Widget extends \Elementor\Widget_Base {

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
		return 'counter';
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
		return esc_html__( 'Counter', 'elementor-oembed-widget' );
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
		return 'eicon-counter';
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
			'counters_list',
			[
				'label' => esc_html__( 'Counters List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'counter_image',
						'label' => esc_html__( 'Image', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'label_block' => true,
					],
					[
						'name' => 'counter_title',
						'label' => esc_html__( 'Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'counter_number',
						'label' => esc_html__( 'Number', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'label_block' => true,
					],
					[
						'name' => 'counter_suffix',
						'label' => esc_html__( 'Suffix', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
					]
				]
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
		$counters_list = $settings['counters_list'];
	?>
		 <!-- experience start -->
		 <section class="experience"> 
        <div class="container">
            <div class="experience__item-wrapper">
				<?php 
					foreach($counters_list as $counter) {
						$counter_image = $counter['counter_image']['url'];
						$counter_title = $counter['counter_title'];
						$counter_number = $counter['counter_number'];
						$counter_suffix = $counter['counter_suffix'];
						?>
						<div class="experience__item">
							<div class="experience__item-content">
								<div class="experience__item-content-icon">
									<img src="<?php echo esc_url($counter_image);?>" alt="<?php echo $counter_title;?>">
								</div>
								<div class="experience__item-content-text">
									<h6 class="title-animation"><?php echo $counter_title;?></h6>
									<h2><span class="odometer" data-count="<?php echo $counter_number;?>">0</span><?php echo $counter_suffix;?></h2>
								</div>
							</div>
						</div>
						<?php
					}
				?>
            </div>
        </div>
    </section>
    <!-- experience end -->
		<?php
	}
}	
