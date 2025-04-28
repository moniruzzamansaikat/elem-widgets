<?php

/*
 * Plugin Name:       TwentyFive
 * Plugin URI:        https://twentyfive/plugin/
 * Description:       Just for an taste of elementor cusotm widget development.
 * Version:           1.0
 * Requires at least: 6.8
 * Requires PHP:      8.0
 * Author:            Moniruzzaman Saikat
 * Author URI:        https://github.com/moniruzzamansaikat/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       twentyfive
 * Domain Path:       /languages
 * Requires Plugins:  elementor
 */

namespace TwentyFive\Plugin;

use TwentyFive\Plugin\Widgets\Nav_Menu;

if (!defined("ABSPATH")) {
    exit;
}

final class TwentyFive
{
    const VERSION               = "1.0";
    const MIN_ELEMENTOR_VERSION = "3.28.0";
    const MIN_PHP_VERSION       = "8.0";


    private static $_instance = null;

    public function __construct()
    {
        add_action('init', [$this, 'i18n']);
        add_action('plugins_loaded', [$this, 'init_plugin']);
        add_action('elementor/elements/categories_registered', [$this, 'create_new_elementor_category']);
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
    }

    public function i18n()
    {
        load_plugin_textdomain('twentyfive');
    }

    public function init_plugin()
    {
    }

    public function init_controls()
    {
    }

    public function init_widgets()
    {
        require_once __DIR__ . '/widgets/nav-menu.php';

        $widget_manager = \Elementor\Plugin::instance()->widgets_manager;

        $widget_manager->register(new Nav_Menu());

    }


    public static function get_instance()
    {
        if (null == self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function create_new_elementor_category($elements_manager)
    {
        $elements_manager->add_category(
            'twentyfive',
            [
                'title' => __('Twenty Five', 'twentyfive'),
                'icon' => 'fa fa-list',
            ]
        );

    }
}

TwentyFive::get_instance();

