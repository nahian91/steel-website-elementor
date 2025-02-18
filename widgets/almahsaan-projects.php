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
		
		// Add category select field
        $this->add_control(
            'category_filter',
            [
                'label' => esc_html__( 'Select Category', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->fetch_project_categories(), // Get categories dynamically
                'label_block' => true,
            ]
        );

		$this->end_controls_section();
		
		/**
		 * Get Categories for Dropdown
		 *
		 * This method returns an array of category slugs for the select control.
		 *
		 * @return array
		 */

	}

	/**
     * Function to get categories dynamically
     *
     * Fetches all categories and returns them for use in the widget controls
     * 
     * @return array $category_options
     */
    public function fetch_project_categories() {
		// Change 'project_category' to your custom taxonomy slug
		$terms = get_terms([
			'taxonomy' => 'project', // Replace with your custom taxonomy name
			'hide_empty' => false, // Set to true if you want only categories with posts
		]);
	
		$category_options = [];
		
		// Loop through each term and add to options array
		foreach ( $terms as $term ) {
			$category_options[$term->term_id] = $term->name; // Using term_id as the option value
		}
	
		return $category_options;
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
	
		// Query for Projects CPT
		$args = [
			'post_type' => 'projects', // Make sure 'projects' is your CPT slug
			'posts_per_page' => -1, // Adjust as needed for pagination or limit
		];
	
		$projects_query = new WP_Query( $args );
	
		if ( $projects_query->have_posts() ) :
			?>
			<div class="container">
				<div class="row">
					<?php 
					// Loop through the posts
					while ( $projects_query->have_posts() ) : $projects_query->the_post();
						// Get the featured image
						$project_img = get_the_post_thumbnail_url( get_the_ID(), 'full' );
						// Get the title
						$project_title = get_the_title();
						// Get the excerpt
						$project_excerpt = get_the_excerpt();
						// Get the categories of the project
						$categories = get_the_terms( get_the_ID(), 'project' ); // Replace 'project_category' with your taxonomy slug
						$category_names = [];
	
						if ( ! empty( $categories ) ) {
							foreach ( $categories as $category ) {
								$category_names[] = $category->name;
							}
						}
	
						// Display the project
						?>
						<div class="col-lg-4 col-sm-6 grid-item <?php echo esc_attr( implode( ' ', $category_names ) ); ?>">
							<div class="protfolio__item">
								<div class="protfolio__item-media">
									<img src="<?php echo esc_url( $project_img ); ?>" class="img-fluid" alt="<?php echo esc_attr( $project_title ); ?>">
								</div>
								<a href="<?php the_permalink(); ?>" class="protfolio__item-icon">
									<svg width="27" height="27" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M27 2V27" stroke="white" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M27 27H52" stroke="white" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M42 20L52 27L42 34" stroke="white" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</a>
								<div class="protfolio__item-text">                        
									<h6><a href="<?php the_permalink(); ?>"><?php echo esc_html( $project_title ); ?></a></h6>
									<?php if ( ! empty( $project_excerpt ) ) : ?>
										<p><?php echo esc_html( $project_excerpt ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					?>
				</div>
			</div>
			<?php
		else :
			echo '<p>No projects found.</p>';
		endif;
	
		// Reset post data
		wp_reset_postdata();
	}
}	