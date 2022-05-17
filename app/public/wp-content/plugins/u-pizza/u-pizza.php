<?php

/**
 * Plugin Name:       u-pizza
 * Description:       Pizza builder for woocommerce.
 * Version:           1.0.0
 * Requires at least: 5.5
 * Requires PHP:      7.0.0
 * Author:            Maciej Białecki
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       u-pizza
 */

/// get_template_directory_uri in themes ===get plugins_url in plugins
/// get_template_directory in themes === plugin_dir_path in plugins

// // Test to see if WooCommerce is active (including network activated).
// $plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';

// if (
//     in_array( $plugin_path, wp_get_active_and_valid_plugins() )
//     || in_array( $plugin_path, wp_get_active_network_plugins() )
// ) {
//     // Custom code here. WooCommerce is active, however it has not 
//     // necessarily initialized (when that is important, consider
//     // using the `woocommerce_init` action).
// }

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    exit;
}

if (!defined('U_PIZZA_PATH')) {
    define('U_PIZZA_PATH', plugin_dir_path(__FILE__));
}
if (!defined('U_PIZZA_DIR')) {
    define('U_PIZZA_DIR', __FILE__);
}

class U_Pizza_Install 
{

    protected static $instance = null;

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() 
    {
        $this->include();
    }
    public function include()
    {
        require_once U_PIZZA_PATH . 'includes/pizza.php';

        U_Pizza::instance();
    }
}

function init_plugin_pizza() 
{
    U_Pizza_Install::instance(); 
}

add_action('plugins_loaded', 'init_plugin_pizza', 5);

