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
	protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Product List', 'plugin-name'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'product_title',
            [
                'label'       => __('Product Title', 'plugin-name'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'product_price',
            [
                'label' => __('Product Price', 'plugin-name'),
                'type'  => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'product_category',
            [
                'label'   => __('Product Category', 'plugin-name'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'General',
            ]
        );

        $repeater->add_control(
            'product_image',
            [
                'label' => __('Product Image', 'plugin-name'),
                'type'  => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'products',
            [
                'label'       => __('Products', 'plugin-name'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ product_title }}}',
            ]
        );

        $this->end_controls_section();
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
	
		?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">

			<ul class="filters text-center">
				<li class="active" data-filter="*">
					<a href="#!"><i class="fas fa-star-of-life"></i> All</a>
				</li>
				<li data-filter=".desktop">
					<a href="#!"><i class="fas fa-laptop-code"></i> Desktop</a>
				</li>
				<li data-filter=".Web">
					<a href="#!"><i class="fas fa-globe"></i> Web</a>
				</li>
				<li data-filter=".design">
					<a href="#!"><i class="far fa-object-group"></i> Design</a>
				</li>
			</ul>

			<div class="projects">
				<div class="row">
					<div class="col-lg-4 item desktop CSharp">
						<div class="project">
							<div class="project-head">
								<img src="https://cdn.pixabay.com/photo/2016/11/30/20/58/programming-1873854_960_720.png" alt="" class="img-fluid card-img">
								<div class="project-overlay">
									<h4>Encryption Translator</h4>
								</div>
								<div class="project-hover">
									<p>
										This text does not contain any purpose other than
										filling the design.
									</p>
								</div>
							</div>

							<div class="project-body text-center">
								<h3 class="title">Encryption Translator</h3>

								<ul class="filters filters-tag text-center">
									tag:
									<li data-filter=".CSharp"><a href="#!">C#</a></li>
								</ul>

								<div class="btn-group" role="group">
									<a href="#!" class="btn project-btn"><i class="fas fa-file-download"></i> Download</a>
									<a href="#!" class="btn project-btn disabled"><i class="far fa-eye-slash"></i> View</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 item Web html css jquery">
						<div class="project">
							<div class="project-head">
								<img src="https://cdn.pixabay.com/photo/2016/11/30/20/58/programming-1873854_960_720.png" alt="" class="img-fluid card-img">
								<div class="project-overlay">
									<h2>Web</h2>
								</div>
								<div class="project-hover">
									<p>
										This text does not contain any purpose other than
										filling the design.
									</p>
								</div>
							</div>

							<div class="project-body text-center">
								<h3 class="title">Web</h3>

								<ul class="filters filters-tag text-center">
									tag:
									<li data-filter=".html"><a href="#!">HTML</a></li>
									<li data-filter=".css"><a href="#!">CSS</a></li>
									<li data-filter=".jquery"><a href="#!">jQuery</a></li>
								</ul>

								<div class="btn-group" role="group">
									<a href="#!" class="btn  project-btn"><i class="fas fa-code"></i> Code</a>
									<a href="#!" class="btn  project-btn"><i class="far fa-eye"></i> View</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 item design psd">
						<div class="project">
							<div class="project-head">
								<img src="https://cdn.pixabay.com/photo/2016/11/30/20/58/programming-1873854_960_720.png" alt="" class="img-fluid card-img">
								<div class="project-overlay">
									<h2>design</h2>
								</div>
								<div class="project-hover">
									<p>
										This text does not contain any purpose other than
										filling the design.
									</p>
								</div>
							</div>

							<div class="project-body text-center">
								<h3 class="title">design</h3>

								<ul class="filters filters-tag text-center">
									tag:
									<li data-filter=".psd"><a href="#!">PSD</a></li>
								</ul>

								<div class="btn-group" role="group">
									<a href="#!" class="btn  project-btn"><i class="fas fa-code"></i> Code</a>
									<a href="#!" class="btn  project-btn"><i class="far fa-eye"></i> View</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 item Web html css javascript">
						<div class="project">
							<div class="project-head">
								<img src="https://cdn.pixabay.com/photo/2016/11/30/20/58/programming-1873854_960_720.png" alt="" class="img-fluid card-img">
								<div class="project-overlay">
									<h2>Web</h2>
								</div>
								<div class="project-hover">
									<p>
										This text does not contain any purpose other than
										filling the design.
									</p>
								</div>
							</div>

							<div class="project-body text-center">
								<h3 class="title">Web</h3>

								<ul class="filters filters-tag text-center">
									tag:
									<li data-filter=".html"><a href="#!">HTML</a></li>
									<li data-filter=".css"><a href="#!">CSS</a></li>
									<li data-filter=".javascript">
										<a href="#!">JavaScript</a>
									</li>
								</ul>

								<div class="btn-group" role="group">
									<a href="#!" class="btn  project-btn"><i class="fas fa-code"></i> Code</a>
									<a href="#!" class="btn  project-btn"><i class="far fa-eye"></i> View</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 item design psd">
						<div class="project">
							<div class="project-head">
								<img src="https://cdn.pixabay.com/photo/2016/11/30/20/58/programming-1873854_960_720.png" alt="" class="img-fluid card-img">
								<div class="project-overlay">
									<h2>design</h2>
								</div>
								<div class="project-hover">
									<p>
										This text does not contain any purpose other than
										filling the design.
									</p>
								</div>
							</div>

							<div class="project-body text-center">
								<h3 class="title">design</h3>

								<ul class="filters filters-tag text-center">
									tag:
									<li data-filter=".psd"><a href="#!">PSD</a></li>
								</ul>

								<div class="btn-group" role="group">
									<a href="#!" class="btn  project-btn"><i class="fas fa-code"></i> Code</a>
									<a href="#!" class="btn  project-btn"><i class="far fa-eye"></i> View</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 item Web html css javascript">
						<div class="project">
							<div class="project-head">
								<img src="https://cdn.pixabay.com/photo/2016/11/30/20/58/programming-1873854_960_720.png" alt="" class="img-fluid card-img">
								<div class="project-overlay">
									<h2>Web</h2>
								</div>
								<div class="project-hover">
									<p>
										This text does not contain any purpose other than
										filling the design.
									</p>
								</div>
							</div>

							<div class="project-body text-center">
								<h3 class="title">Web</h3>

								<ul class="filters filters-tag text-center">
									tag:
									<li data-filter=".html"><a href="#!">HTML</a></li>
									<li data-filter=".css"><a href="#!">CSS</a></li>
									<li data-filter=".javascript">
										<a href="#!">JavaScript</a>
									</li>
								</ul>

								<div class="btn-group" role="group">
									<a href="#!" class="btn  project-btn"><i class="fas fa-code"></i> Code</a>
									<a href="#!" class="btn  project-btn"><i class="far fa-eye"></i> View</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<?php
	}
}	