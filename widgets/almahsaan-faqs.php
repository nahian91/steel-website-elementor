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
        return 'eicon-question-circle';
    }

    public function get_categories() {
        return ['almahsaan-category'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'faqs_content_section',
            [
                'label' => __('FAQs', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_items',
            [
                'label' => __('FAQ Item', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'faq_title',
                        'label' => __('FAQ Title', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'faq_content',
                        'label' => __('FAQ Content', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __('FAQ Content', 'plugin-name'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'faq_image',
                        'label' => __('FAQ Image', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'faq_url',
                        'label' => __('FAQ URL', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::URL,
                        'placeholder' => __('https://your-link.com', 'plugin-name'),
                        'default' => [
                            'url' => '',
                            'is_external' => true,
                            'nofollow' => false,
                        ],
                        'label_block' => true,
                        'show_external' => true,
                    ],
                ],
            ]
        );
        

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
    
        if (empty($settings['faq_items'])) {
            return;
        }
        ?>
    
        <div class="faq-container">
            <?php foreach ($settings['faq_items'] as $index => $item): 
                $is_first = ($index === 0); // Check if first item
                $image = !empty($item['faq_image']['url']) ? esc_url($item['faq_image']['url']) : '';
                $url = !empty($item['faq_url']['url']) ? esc_url($item['faq_url']['url']) : '';
                $url_title = !empty($item['faq_url_title']) ? esc_html($item['faq_url_title']) : __('Learn More', 'plugin-name');
                $target = (!empty($item['faq_url']['is_external']) && $item['faq_url']['is_external']) ? ' target="_blank" rel="noopener"' : '';
            ?>
                <div class="faq-item">
                    <div class="faq-question">
                        <div class="faq-top-content">
                            <?php if ($image): ?>
                                <div class="faq-image">
                                    <img src="<?php echo $image; ?>" alt="<?php echo esc_attr($item['faq_title']); ?>">
                                </div>
                            <?php endif; ?>
                            <?php echo esc_html($item['faq_title']); ?>
                        </div>
                        <i class="faq-icon fa-solid <?php echo $is_first ? 'fa-minus' : 'fa-plus'; ?>"></i>
                    </div>
                    <div class="faq-answer <?php if ($image){echo 'space';} ?>" style="display: <?php echo $is_first ? 'block' : 'none'; ?>;">    
                        <p><?php echo esc_html($item['faq_content']); ?></p>    
                        <?php if ($url): ?>
                            <div class="faq-link">
                                <a href="<?php echo $url; ?>" <?php echo $target; ?>>Explore More</a>
                            </div>
                        <?php endif; ?>
    
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    
        <?php
    }      

    public function get_script_depends() {
        wp_enqueue_script('custom-accordion-script', plugins_url('assets/js/main.js', __FILE__), ['jquery'], false, true);
        return ['custom-accordion-script'];
    }
}

// Register widget
add_action('elementor/widgets/register', function($widgets_manager) {
    $widgets_manager->register(new Almahsaan_Faqs_Widget());
});
