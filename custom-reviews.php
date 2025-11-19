<?php
/**
 * Plugin Name: Custom Reviews
 * Description: A custom reviews plugin for WordPress.
 * Version: 1.0.0
 * Author: Moiz
 * Author URI: https:/moiz.codeletdigital.com
 * Plugin URI: https://github.com/moizxox/custom-reviews-plugin
 */

if (!defined('ABSPATH')) exit;

define('CR_PATH', plugin_dir_path(__FILE__));
define('CR_URL', plugin_dir_url(__FILE__));

require_once CR_PATH . 'includes/cpt.php';
require_once CR_PATH . 'includes/api.php';
require_once CR_PATH . 'includes/shortcode.php';
require_once CR_PATH . 'includes/helpers.php';
require_once CR_PATH . 'includes/admin/instructions.php';

add_action('rest_api_init', 'cr_register_api_routes');

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script(
        'cr-form-handler',
        CR_URL . 'assets/js/form-handler.js',
        ['jquery'],
        false,
        true
    );
});
