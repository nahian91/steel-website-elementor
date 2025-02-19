<?php 

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Almahsaan_Image_Faqs_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'image-faqs';
    }

    public function get_title() {
        return __('Image FAQs', 'plugin-name');
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
                'label' => __('FAQs', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'faq_items',
            [
                'label' => __('FAQ Items', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => __('Image', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'title',
                        'label' => __('Title', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Image Title', 'plugin-name'),
                    ],
                    [
                        'name' => 'description',
                        'label' => __('Description', 'plugin-name'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => __('Lorem ipsum dolor sit amet...', 'plugin-name'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
        <div class="image-accordion">
            <?php foreach ($settings['faq_items'] as $index => $item): ?>
                <?php 
                    $is_active = $index === 0 ? 'active' : ''; 
                    $img_url = isset($item['image']['url']) ? esc_url($item['image']['url']) : '';
                ?>
                <div class="single-image-accordion <?php echo $is_active; ?>">
                    <div class="image-accordion-header">
                        <img src="<?php echo $img_url; ?>" alt="<?php echo esc_attr($item['title']); ?>">
                        <span class="accordion-toggle">+</span>
                    </div>
                    <div class="image-accordion-content" style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>;">
                        <h4><?php echo esc_html($item['title']); ?></h4>
                        <p><?php echo esc_html($item['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <style>
            .image-accordion {
                width: 100%;
            }
            .single-image-accordion {
                border-bottom: 1px solid #ddd;
                cursor: pointer;
                padding: 10px;
            }
            .image-accordion-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .image-accordion-header img {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: 5px;
                margin-right: 10px;
            }
            .accordion-toggle {
                font-size: 18px;
                font-weight: bold;
            }
            .image-accordion-content {
                display: none;
                padding: 10px;
                background: #f9f9f9;
            }
            .single-image-accordion.active .image-accordion-content {
                display: block;
            }
            .single-image-accordion.active .accordion-toggle {
                content: "-";
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let accordions = document.querySelectorAll(".single-image-accordion");
                accordions.forEach((accordion, index) => {
                    accordion.addEventListener("click", function() {
                        accordions.forEach(acc => {
                            if (acc !== accordion) {
                                acc.classList.remove("active");
                                acc.querySelector(".image-accordion-content").style.display = "none";
                                acc.querySelector(".accordion-toggle").textContent = "+";
                            }
                        });

                        let content = accordion.querySelector(".image-accordion-content");
                        let toggle = accordion.querySelector(".accordion-toggle");
                        
                        if (accordion.classList.contains("active")) {
                            accordion.classList.remove("active");
                            content.style.display = "none";
                            toggle.textContent = "+";
                        } else {
                            accordion.classList.add("active");
                            content.style.display = "block";
                            toggle.textContent = "-";
                        }
                    });
                });
            });
        </script>
        <?php
    }
}
