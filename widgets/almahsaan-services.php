<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Widget_Base;

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
		return 'services';
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
	protected function register_controls() {
		
		// Start of the Content Tab Section
	   	$this->start_controls_section(
	       'wb_about_subheading_contents',
		    [
		        'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
		    ]
	    );

		// About Sub Heading Show?
		$this->add_control(
			'wb_about_subheading_show_btn',
			[
				'label' => esc_html__( 'Show Sub Heading', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		
		// About Sub Heading
		$this->add_control(
			'wb_about_subheading',
			[
				'label' => esc_html__('Sub Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('About Us', 'webbricks-addons'),
				'condition' => [
					'wb_about_subheading_show_btn' => 'yes'
				],
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		// Start of the Content Tab Section
		$this->start_controls_section(
			'wb_about_heading_contents',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );
		
		// About Heading
		$this->add_control(
			'wb_about_title',
			[
				'label' => esc_html__('Heading', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('100+ Businesses Trust Us For Last Decade', 'webbricks-addons'),
			]
		);		

		// Section Heading Separator Style
		$this->add_control(
			'wb_about_title_tag',
			[
				'label' => __( 'Html Tag', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'webbricks-addons' ),
					'h2' => __( 'H2', 'webbricks-addons' ),
					'h3' => __( 'H3', 'webbricks-addons' ),
					'h4' => __( 'H4', 'webbricks-addons' ),
					'h5' => __( 'H5', 'webbricks-addons' ),
					'h6' => __( 'H6', 'webbricks-addons' ),
					'p' => __( 'P', 'webbricks-addons' ),
					'span' => __( 'Span', 'webbricks-addons' ),
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		$this->start_controls_section(
			'wb_about_desc_contents',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );
		
		// About Description
		$this->add_control(
			'wb_about_desc',
			[
				'label' => esc_html__('Description', 'webbricks-addons'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'webbricks-addons'),
			]
		);

		$this->end_controls_section();
		// end of the Content tab section

		$this->start_controls_section(
			'wb_about_images_contents',
			[
				'label' => esc_html__('Images', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT	   
			]
		 );

		// About Featured Image
		$this->add_control(
			'wb_about_featured_img',
			[
				'label' => esc_html__( 'Choose Featured Image', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => plugins_url( 'assets/img/about.png', dirname(__FILE__, 2) ),
				]
			]
		);
		 
		// About Secondary Image
		$this->add_control(
			'wb_about_bg_img',
			[
				'label' => esc_html__( 'Background Pattern', 'webbricks-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => plugins_url( 'assets/img/about-bg.png', dirname(__FILE__, 2) ),
				]
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_about_counters',
			[
				'label' => esc_html__('Counters', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,		
			]
		);

		// About Counter Show?
		$this->add_control(
			'wb_about_counter_show_btn',
			[
				'label' => esc_html__( 'Show Counter', 'webbricks-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'webbricks-addons' ),
				'label_off' => esc_html__( 'Hide', 'webbricks-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		 
		// About Counters
		$repeater = new Repeater();

		// About Counter Number
		$repeater->add_control(
			'wb_about_counter_number',
			[
				'label' => esc_html__( 'Counter Number', 'webbricks-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => esc_html__( '100', 'webbricks-addons' ),
			]
		);

		// About Counter Number Suffix
		$repeater->add_control(
			'wb_about_counter_suffix',
			[
				'label' => esc_html__( 'Counter Suffix', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '+', 'webbricks-addons' ),
			]
		);

		// About Counter Title
		$repeater->add_control(
			'wb_about_counter_title',
			[
				'label' => esc_html__( 'Counter Title', 'webbricks-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Counter Visiting', 'webbricks-addons' ),
			]
		);

		// About Counter Repeater
		$this->add_control(
			'wb_about_counter',
			[
				'label' => esc_html__( 'Counters', 'webbricks-addons' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ wb_about_counter_title }}}',
				'default' => [
					[
						'wb_about_counter_number' => esc_html__( '100', 'webbricks-addons' ),
						'wb_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wb_about_counter_title' => esc_html__( 'Countries Visiting', 'webbricks-addons' ),
					],
					[
						'wb_about_counter_number' => esc_html__( '50', 'webbricks-addons' ),
						'wb_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wb_about_counter_title' => esc_html__( 'Hotels & Resorts', 'webbricks-addons' ),
					],
					[
						'wb_about_counter_number' => esc_html__( '10', 'webbricks-addons' ),
						'wb_about_counter_suffix' => esc_html__( '+', 'webbricks-addons' ),
						'wb_about_counter_title' => esc_html__( 'Branches All Over', 'webbricks-addons' ),
					]
				],
				'condition' => [
					'wb_about_counter_show_btn' => 'yes'
				],
			]
		); 

		$this->add_control(
			'important_note',
			[
				'label' => esc_html__( 'Suggestion:Three counter looks fit properly. You can add moreÂ ifÂ needed.', 'webbricks-addons' ),
				'type' => Controls_Manager::RAW_HTML,
				'content_classes' => 'notice-style',
				'condition' => [
					'wb_about_counter_show_btn' => 'yes'
				]
			]
		);
		 
		$this->end_controls_section();
		// End of the Content Tab Section

		// Start of the Buttons Tab Section
		$this->start_controls_section(
		'wb_about_buttons',
			[
				'label' => esc_html__('Buttons', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT,			
			]
		);
		 
		// About Button 1 Title
		$this->add_control(
		    'wb_about_btn1_title',
			[
			    'label' => esc_html__('Button 1 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Contact Us', 'webbricks-addons')
			]
		);

		// About Button 1 Link
		$this->add_control(
		    'wb_about_btn1_link',
			[
			    'label' => esc_html__( 'Button 1 Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);		
		
		// About Button 2 Title
		$this->add_control(
		    'wb_about_btn2_title',
			[
			    'label' => esc_html__('Button 2 Text', 'webbricks-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Know More', 'webbricks-addons'),
				'separator' => 'before'
			]
		);

		// About Button 2 Link
		$this->add_control(
		    'wb_about_btn2_link',
			[
			    'label' => esc_html__( 'Button 2 Link', 'webbricks-addons' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'https://getwebbricks.com',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				]
			]
		);
		 
		$this->end_controls_section();
		// End of the Buttons Tab Section

		// start of the Content tab section
		$this->start_controls_section(
			'wb_about_pro_message',
			[
				'label' => esc_html__('Premium', 'webbricks-addons'),
				'tab'   => Controls_Manager::TAB_CONTENT		
			]
		 );

		 $this->add_control( 
			'wb_about_pro_message_notice', 
			[
				'type'      => Controls_Manager::RAW_HTML,
				'raw'       => sprintf(
					'<div style="text-align:center;line-height:1.6;">
						<p style="margin-bottom:10px">%s</p>
					</div>',
					esc_html__('Web Bricks Premium is coming soon with more widgets, features, and customization options.', 'webbricks-addons')
				)
			]  
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'wb_about_subheading_style_section',
			[
				'label' => esc_html__( 'Sub Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_about_subheading_show_btn' => 'yes'
				],
			]
		);	

		$this->add_control(
			'wb_about_subheading_sep_head',
			[
				'label' => __('Bullet', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		// About Content Sub Heading Separator Style
		$this->add_control(
			'wb_about_subheading_sep_variotion',
			[
				'label' => __( 'Style', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'webbricks-addons' ),
					'round' => __( 'Round', 'webbricks-addons' ),
					'square' => __( 'Square', 'webbricks-addons' ),
					'circle' => __( 'Circle', 'webbricks-addons' ),
					'custom' => __( 'Custom', 'webbricks-addons' ),
					'none' => __( 'None', 'webbricks-addons' ),
				],
				'default' => 'default',
			]
		);

		// About Content Sub Heading Separator Round
		$this->add_control(
			'wb_about_subheading_sep_round',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .section-title span:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'wb_about_subheading_sep_variotion' => 'custom', 
				],
			]
		);

		// About Content Sub Heading Separator Color
		$this->add_control(
			'wb_about_subheading_sep_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->add_control(
			'wb_about_subheading_head',
			[
				'label' => __('Sub Heading', 'webbricks-addons'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Content Sub Heading Color
		$this->add_control(
			'wb_about_subheading_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Content Sub Heading Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_subheading_typography',
				'selector' => '{{WRAPPER}} .section-title span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_SECONDARY,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_about_heading_style_section',
			[
				'label' => esc_html__( 'Heading', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// About Content Title Color
		$this->add_control(
			'wb_about_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title .section-heading' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// About Content Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_title_typography',
				'selector' => '{{WRAPPER}} .section-title .section-heading',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_about_desc_style_section',
			[
				'label' => esc_html__( 'Description', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);	

		// About Content Description Color
		$this->add_control(
			'wb_about_desc_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-desc, {{WRAPPER}} .about-desc p, {{WRAPPER}} .about-desc ul, {{WRAPPER}} .about-desc ol' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Content Description Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_desc_typography',
				'selector' => '{{WRAPPER}} .about-desc, {{WRAPPER}} .about-desc p, {{WRAPPER}} .about-desc ul, {{WRAPPER}} .about-desc ol',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		// Start of the Style Tab Section
		$this->start_controls_section(
			'wb_about_style_images',
			[
				'label' => esc_html__( 'Images', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// About Featured Image Heading
		$this->add_control(
			'wb_about_featured_heading',
			[
				'label' => esc_html__( 'Featured', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		// About Featured Image Width
		$this->add_control(
			'wb_about_featured_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .about-img img:first-child' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Featured Image Height
		$this->add_control(
			'wb_about_featured_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .about-img img:first-child' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Separator Image Heading
		$this->add_control(
			'wb_about_sep_heading',
			[
				'label' => esc_html__( 'Pattern', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Separator Image Width
		$this->add_control(
			'wb_about_sep_image_width',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Width', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .about-img img:last-child' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// About Separator Image Height
		$this->add_control(
			'wb_about_sep_image_height',
			[
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Height', 'webbricks-addons' ),
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .about-img img:last-child' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_about_counters_style',
			[
				'label' => esc_html__( 'Counters', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'wb_about_counter_show_btn' => 'yes'
				]
			]
		);

		// About Counter Number Options
		$this->add_control(
			'wb_about_counter_number_options',
			[
				'label' => esc_html__( 'Number', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		// About Counter Number Color
		$this->add_control(
			'wb_about_counter_number_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter div, .single-about-counter span' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Counter Number Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_counter_number_typography',
				'selector' => '{{WRAPPER}} .single-about-counter div, .single-about-counter span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Counter Title Options
		$this->add_control(
			'wb_about_counter_title_options',
			[
				'label' => esc_html__( 'Title', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Title Color
		$this->add_control(
			'wb_about_counter_title_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter .about-counter-title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Counter Title Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_counter_title_typography',
				'selector' => '{{WRAPPER}} .single-about-counter .about-counter-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// Section Heading Separator Style
		$this->add_control(
			'wb_about_counter_title_tag',
			[
				'label' => __( 'Html Tag', 'webbricks-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'webbricks-addons' ),
					'h2' => __( 'H2', 'webbricks-addons' ),
					'h3' => __( 'H3', 'webbricks-addons' ),
					'h4' => __( 'H4', 'webbricks-addons' ),
					'h5' => __( 'H5', 'webbricks-addons' ),
					'h6' => __( 'H6', 'webbricks-addons' ),
					'p' => __( 'P', 'webbricks-addons' ),
					'span' => __( 'Span', 'webbricks-addons' ),
				],
				'default' => 'p',
			]
		);

		// About Counter Separator Options
		$this->add_control(
			'wb_about_counter_sep_options',
			[
				'label' => esc_html__( 'Separator', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// About Counter Separator Color
		$this->add_control(
			'wb_about_counter_sep_color',
			[
				'label' => esc_html__( 'Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-about-counter' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		$this->end_controls_section();
		// end of the Style tab section

		$this->start_controls_section(
			'wb_buttons_style',
			[
				'label' => esc_html__( 'Buttons', 'webbricks-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// About Button 1 Options
		$this->add_control(
			'wb_about_button1_options',
			[
				'label' => esc_html__( 'Button 1', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn1_style_tab'
		);

		// About Button 1 Normal Tab
		$this->start_controls_tab(
			'wb_about_btn1_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// About Button 1 Color
		$this->add_control(
			'wb_about_btn1_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Background
		$this->add_control(
			'wb_about_btn1_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				]
			]
		);

		// About Button 1 Border
		$this->add_control(
			'wb_about_btn1_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_btn1_typography',
				'selector' => '{{WRAPPER}} .btn-bg',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Button 1 Border Radius
		$this->add_control(
			'wb_about_btn1_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// About Button 1 Padding
		$this->add_control(
			'wb_about_btn1_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// About Button 1 Hover Tab
		$this->start_controls_tab(
			'wb_about_btn1_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// About Button 1 Hover Color
		$this->add_control(
			'wb_about_btn1_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn-bg:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// About Button 1 Hover Background
		$this->add_control(
			'wb_about_btn1_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 1 Hover Background
		$this->add_control(
			'wb_about_btn1_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-bg:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();


		// About Button 2 Options
		$this->add_control(
			'wb_about_button2_options',
			[
				'label' => esc_html__( 'Button 2', 'webbricks-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->start_controls_tabs(
			'wp_about_btn2_style_tab'
		);

		// About Button 2 Normal Tab
		$this->start_controls_tab(
			'wb_about_btn2_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'webbricks-addons' ),
			]
		);

		// About Button 2 Color
		$this->add_control(
			'wb_about_btn2_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Button 2 Border
		$this->add_control(
			'wb_about_btn2_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				]
			]
		);

		// About Button 2 Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wb_about_btn2_typography',
				'selector' => '{{WRAPPER}} .btn-border',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				]
			]
		);

		// About Button 2 Border Radius
		$this->add_control(
			'wb_about_btn2_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// About Button 2 Padding
		$this->add_control(
			'wb_about_btn2_padding',
			[
				'label' => esc_html__( 'Padding', 'webbricks-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .btn-border' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		// About Button 2 Hover Tab
		$this->start_controls_tab(
			'wb_about_btn2_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'webbricks-addons' ),
			]
		);

		// About Button 2 Hover Color
		$this->add_control(
			'wb_about_btn2_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .btn-border:hover svg path' => 'fill: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_SECONDARY,
				]
			]
		);

		// About Button 2 Hover Color
		$this->add_control(
			'wb_about_btn2_hover_border',
			[
				'label' => esc_html__( 'Border Color', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover' => 'border-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		// About Button 2 Hover Background
		$this->add_control(
			'wb_about_btn2_hover_bg',
			[
				'label' => esc_html__( 'Background', 'webbricks-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-border:hover:before' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				]
			]
		);

		$this->end_controls_tab();
		
		$this->end_controls_tabs();

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
                    <h2 class="section__title title-animation">
                        <div style="position: relative; display: inline-block;">The</div>
                        <div style="position: relative; display: inline-block;">best</div>
                        <div style="position: relative; display: inline-block;">Services</div>
                        <div style="position: relative; display: inline-block;">We</div>
                        <div style="position: relative; display: inline-block;">Provide</div>
                    </h2>
                </div>
            </div>

            <div class="what-we-do__wrapper">
                <div class="what-we-do__bg">
                    <img src="./assets/imgs/what-we-do/shape.png" alt="">
                </div>
                <div class="row">
                <div class="col-xl-4 has--border has--border-1">
                    <div class="what-we-do__item has--padding-pb">
                        <div class="what-we-do__item-icon">
                            <img src="./assets/imgs/what-we-do/what-we-do-1.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 32.3667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.575px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Home</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 41.05px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; transform-origin: 45.6083px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Interior</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 43.5667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></div></a></h6>
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
                            <img src="./assets/imgs/what-we-do/what-we-do-2.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 32.3667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.575px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Home</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 44.3333px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; transform-origin: 48.3667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Exterior</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 43.5667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></div></a></h6>
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
                            <img src="./assets/imgs/what-we-do/what-we-do-3.png" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 35.8833px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 38px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">2D/3D</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 43.5667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.4667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 42.0917px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Layout</div></div></a></h6>
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
                            <img src="./assets/imgs/what-we-do/what-we-do-4.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 58.1083px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 66.525px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Furniture's</div></div> <div style="position: relative; display: inline-block; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; transform-origin: 43.5667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></div></a></h6>
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
                            <img src="./assets/imgs/what-we-do/what-we-do-5.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 42.2917px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 48.1px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Modern</div></div> <div style="position: relative; display: inline-block; transform-origin: 32.3667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; transform-origin: 37.575px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Home</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 41.05px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; transform-origin: 45.6083px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Interior</div></div></a></h6>
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
                            <img src="./assets/imgs/what-we-do/what-we-do-6.svg" alt="image not found">
                        </div>
                        <div class="text">
                            <h6 class="what-we-do__item-title title-animation" style="perspective: 100px;"><a href="service-details.html"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 41.6417px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 48.0417px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Custom</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 37.45px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 43.5667px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Design</div></div> <div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 24.1583px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;"><div style="position: relative; display: inline-block; translate: none; rotate: none; scale: none; transform-origin: 27.675px 17px 0px; transform: translate(0px); opacity: 1; visibility: inherit;">Plan</div></div></a></h6>
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
