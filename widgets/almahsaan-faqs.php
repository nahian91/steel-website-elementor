<?php 

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Almahsaan_Faqs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'faqs';
    }

    public function get_title() {
        return __('Faqs', 'plugin-name');
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Accordion Items', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'accordion_items',
            [
                'label' => __('Items', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => __('Title', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Accordion Title', 'plugin-name'),
                    ],
                    [
                        'name' => 'content',
                        'label' => __('Content', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __('Accordion Content', 'plugin-name'),
                    ],
                ],
                'default' => [
                    [
                        'title' => __('First Item', 'plugin-name'),
                        'content' => __('Content for the first item', 'plugin-name'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '<div class="custom-accordion">';
        foreach ($settings['accordion_items'] as $index => $item) {
            echo '<div class="accordion-item">';
            echo '<div class="accordion-header" data-index="' . $index . '">';
            echo '<span class="accordion-icon">+</span> ' . esc_html($item['title']);
            echo '</div>';
            echo '<div class="accordion-content">' . esc_html($item['content']) . '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

    public function get_script_depends() {
        return ['custom-accordion-script'];
    }
}

add_action('elementor/widgets/widgets_registered', function($widgets_manager) {
    $widgets_manager->register_widget_type(new Almahsaan_Faqs_Widget());
});

// Enqueue script
add_action('wp_enqueue_scripts', function() {
    wp_register_script('custom-accordion-script', plugins_url('assets/js/main.js', __FILE__), ['jquery'], false, true);
});
