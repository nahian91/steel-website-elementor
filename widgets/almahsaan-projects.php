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
		return 'projects';
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
	protected function _register_controls() {
		$this->start_controls_section(
			'gallery_section',
			[
				'label' => __( 'Gallery', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
	
		// Add a repeater field for gallery items
		$repeater = new \Elementor\Repeater();
	
		$repeater->add_control(
			'image',
			[
				'label' => __( 'Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
	
		$repeater->add_control(
			'category',
			[
				'label' => __( 'Category', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'description' => 'Category for filtering',
			]
		);
	
		// Add the title field
		$repeater->add_control(
			'title',
			[
				'label' => __( 'Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'description' => 'Title for the image',
			]
		);
	
		// Add the link field
		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '',
				],
				'description' => 'Link for the image',
			]
		);
	
		// Add the repeater control
		$this->add_control(
			'gallery_items',
			[
				'label' => __( 'Gallery Items', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'image' => ['url' => ''],
						'category' => 'Nature',
						'title' => 'Sample Image',
						'link' => ['url' => ''],
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
	
		$this->end_controls_section();
	}
	
    protected function render() {
		$settings = $this->get_settings_for_display();
		$gallery_items = $settings['gallery_items'];
	
		echo '<div class="filterable-gallery">';
		echo '<div class="filters">';
		$categories = array_unique(array_column($gallery_items, 'category')); // Extract unique categories for filtering
		foreach ($categories as $category) {
			echo '<button class="filter-btn" data-filter="' . esc_attr($category) . '">' . esc_html($category) . '</button>';
		}
		echo '</div>'; // end filters section
	
		echo '<div class="gallery-items">';
		foreach ( $gallery_items as $item ) {
			$image_url = esc_url($item['image']['url']);
			$category = esc_attr($item['category']);
			$title = esc_html($item['title']);
			$link = isset($item['link']['url']) ? esc_url($item['link']['url']) : '';
	
			echo '<div class="gallery-item ' . esc_attr( $category ) . '">';
			
			if ($link) {
				echo '<a href="' . $link . '" class="gallery-item-link">';
			}
	
			echo '<img src="' . $image_url . '" alt="' . $title . '">';
			
			if ($link) {
				echo '</a>';
			}
	
			if ($title) {
				echo '<h3 class="gallery-item-title">' . $title . '</h3>';
			}
	
			echo '</div>';
		}
		echo '</div>'; // end gallery items
		echo '</div>'; // end filterable gallery
	}	
}