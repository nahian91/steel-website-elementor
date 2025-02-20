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
class Almahsaan_Gallery_Widget extends \Elementor\Widget_Base {

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
		return 'alsteel_gallery';
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
		return esc_html__( 'Gallery', 'elementor-oembed-widget' );
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
			'gallery_list',
			[
				'label' => esc_html__( 'Gallery List', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'gallery_type',
						'label' => esc_html__( 'Select Type', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => [
							'image' => esc_html__( 'Image', 'textdomain' ),
							'video' => esc_html__( 'Video', 'textdomain' ),
						],
						'default' => 'image',
						'label_block' => true,
					],
					[
						'name' => 'gallery_img',
						'label' => esc_html__( 'Image', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
						'label_block' => true,
						'condition' => [
							'gallery_type' => 'image',
						],
					],
					[
						'name' => 'gallery_video',
						'label' => esc_html__( 'Video URL', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => esc_html__( 'https://your-video-url.com', 'textdomain' ),
						'label_block' => true,
						'condition' => [
							'gallery_type' => 'video',
						],
					],
					[
						'name' => 'gallery_subtitle',
						'label' => esc_html__( 'Sub Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title', 'textdomain' ),
						'label_block' => true,
					],
					[
						'name' => 'gallery_title',
						'label' => esc_html__( 'Gallery Title', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Gallery Title', 'textdomain' ),
						'label_block' => true,
					]
				],
				'title_field' => '{{{ gallery_title }}}',
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
		$gallery_list = $settings['gallery_list'];
		?>
        <div class="container">
            <div class="row">
				<?php
					foreach($gallery_list as $gallery) {
						$gallery_type = $gallery['gallery_type'];
						$gallery_img = $gallery['gallery_img']['url'];
						$gallery_video = $gallery['gallery_video']['url'];
						$gallery_subtitle = $gallery['gallery_subtitle'];
						$gallery_title = $gallery['gallery_title'];
						?>
						<div class="col-md-4">
							<div class="protfolio__item">
								<?php if($gallery_type == 'image'){
									?>
										<div class="protfolio__item-media ">
											<img src="<?php echo esc_url($gallery_img);?>" class="img-fluid" alt="<?php echo esc_html($gallery_title);?>">
										</div>
										<a href="<?php echo esc_url($gallery_img);?>" class="protfolio__item-icon popup-image">
											<svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
									<?php
								} else {
									?>
										<div class="protfolio__item-media ">
										<?php
// Assuming $youtube_url contains the full YouTube URL
$youtube_url = 'https://www.youtube.com/watch?v=ScMzIvxBSi4';

// Extract the video ID from the URL
preg_match('/(?:https?:\/\/)?(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)([a-zA-Z0-9_-]{11})/', $youtube_url, $matches);

$youtube_video_id = isset($matches[1]) ? $matches[1] : ''; // The video ID
?>

<iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_video_id); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

										</div>
										<a href="<?php echo esc_url($gallery_video);?>" class="protfolio__item-icon popup-video">
											<svg id="playButton" width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path class="line" d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
												<path class="line" d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</a>
									<?php
								} ?>
							</div>
						</div>    
						<?php
					}
				?>                 
            </div>
        </div>
		<?php
	}

}
