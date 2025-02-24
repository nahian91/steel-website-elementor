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
class Almahsaan_Projects_Slider_Widget extends \Elementor\Widget_Base {

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
		return 'projects-slider';
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
		return esc_html__( 'Projects Slider', 'elementor-oembed-widget' );
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
		return 'eicon-folder';
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
	
    protected function render() {
		$settings = $this->get_settings_for_display();
	
		?>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
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
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <!-- Image Column -->
        <div class="col-md-6">
          <img src="https://via.placeholder.com/600x400" class="d-block w-100" alt="...">
        </div>
        <!-- Content Column -->
        <div class="col-md-6">
          <div class="carousel-caption d-none d-md-block">
            <h5>Another Title</h5>
            <p>Another description about this content.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Add more carousel items as needed -->
  </div>
  <!-- Carousel Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

		<?php
	}	
}