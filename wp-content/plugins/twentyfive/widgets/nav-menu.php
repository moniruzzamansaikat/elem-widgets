<?php

namespace TwentyFive\Plugin\Widgets;


use Elementor\Widget_Base;

class Nav_Menu extends Widget_Base
{

    private $display_menu_id = null;

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_enqueue_script('twentyfive-menu-js', plugin_dir_url(__FILE__) . '../assets/js/menu.js');
        wp_enqueue_style('twentyfive-menu-css', plugin_dir_url(__FILE__) . '../assets/css/menu.css');
    }

    public function get_name()
    {
        return 'Twenty Five Menu';
    }


    public function get_title()
    {
        return __('Twenty Five Menu', 'twentyfive');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    public function get_categories()
    {
        return ['twentyfive'];
    }

    private function get_menus()
    {

        $menus = wp_get_nav_menus();

        $menu_list = [];

        foreach ($menus as $menu) {
            $menu_list[$menu->slug] = $menu->name;
        }

        return $menu_list;
    }

    private function get_default_slug()
    {
        return key($this->get_menus());
    }

    public function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content Page', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pdf',
            [
                'label' => esc_html__('Choose PDF', 'twentyfive'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['application/pdf'],
            ]
        );

        $this->add_control(
            'more_options',
            [
                'label' => esc_html__('Additional Options', 'twentyfive'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'separator' => 'before',
                'default' => 'Content goes here',
            ]
        );


        $this->add_control(
            'due_date',
            [
                'label' => esc_html__('Due Date', 'twentyfive'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'menu_selection',
            [
                'label' => __('Menu Selection', 'twentyfive'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('menu', [
            'label' => __('Select Menu', 'twentyfive'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => $this->get_menus(),
            'default' => $this->get_default_slug(),
            'label_block' => true
        ]);


        $this->end_controls_section();

        $this->start_controls_section(
            'menu_selection_style',
            [
                'label' => __('Menu Style', 'twentyfive'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        /** bg color */
        $this->add_control('menu_bg_color', [
            'label' => __('Background Color', 'twentyfive'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .twentyfive-menu' => 'background-color: {{VALUE}}'
            ]
        ]);

        /** link color */
        $this->add_control('menu_link_color', [
            'label' => __('Link Color', 'twentyfive'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .twentyfive-menu a' => 'color: {{VALUE}}'
            ]
        ]);


        /** link hover color */
        $this->add_control('menu_link_hover_color', [
            'label' => __('Link Hover Color', 'twentyfive'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .twentyfive-menu a:hover' => 'color: {{VALUE}}'
            ]
        ]);

        /** font family */
        $this->add_control('menu_text_font_family', [
            'label' => __('Font Family', 'twentyfive'),
            'type' => \Elementor\Controls_Manager::FONT,
            'default' => "'Open Sans', sans-serif",
            'selectors' => [
                '{{WRAPPER}} .twentyfive-menu a' => 'font-family: {{VALUE}}'
            ]
        ]);


        $this->end_controls_section();
    }

    public function get_style_depends()
    {
        return ['twentyfive-menu-css'];
    }

    public function get_script_depends()
    {
        return ['twentyfive-menu-js'];
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->display_menu_id = $settings['menu'];

        echo "<div>" . $settings['more_options'] . "</div>";
        echo wp_nav_menu([
            'menu' => $this->display_menu_id,
            'container' => '',
            'menu_class' => 'twentyfive-menu'
        ]);
    }

    protected function content_template()
    {
        ?>
        <div>{{{ settings.more_options }}}</div>
        <?php
        echo wp_nav_menu([
            'menu' => $this->display_menu_id,
            'container' => '',
            'menu_class' => 'twentyfive-menu'
        ]);
    }

}