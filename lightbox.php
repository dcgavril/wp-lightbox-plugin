<?php
/*
Plugin Name: Lightbox
Plugin URI: https://github.com/tronsha/wp-lightbox-plugin
Description: Lightbox Plugin
Version: 1.0
Author: Stefan Hüsges
Author URI: http://www.mpcx.net/
Copyright: Stefan Hüsges
License: MIT
*/

if (!defined('ABSPATH')) {
    header("HTTP/1.0 404 Not Found");
    die;
}

if (version_compare(phpversion(), '5.3', '<') === true) {

    echo 'Your version of PHP is ' . phpversion() . PHP_EOL;
    echo 'PHP 5.3 or higher is required' . PHP_EOL;

} else {

    add_action(
        'init',
        function () {
            if (!is_admin()) {
                wp_register_style(
                    'lightbox',
                    plugin_dir_url(__FILE__) . 'lightbox/css/lightbox.css',
                    array(),
                    '2.7.1'
                );
                wp_register_script(
                    'lightbox',
                    plugin_dir_url(__FILE__) . 'lightbox/js/lightbox.js',
                    array('jquery'),
                    '2.7.1'
                );
                wp_register_script(
                    'lightbox2gallery',
                    plugin_dir_url(__FILE__) . 'js/lightbox2gallery.js',
                    array('jquery', 'lightbox'),
                    '1.0.0'
                );
                wp_enqueue_style('lightbox');
                wp_enqueue_script('lightbox');
                wp_enqueue_script('lightbox2gallery');
            }
        }
    );

}