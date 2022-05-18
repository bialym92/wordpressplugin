<?php

class U_Pizza {

    protected static $instance = null;
 
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function __construct() {
        add_filter('woocommerce_settings_tabs_array',[$this, 'add_settings_tab'], 50);
        add_action('woocommerce_settings_u_pizza', [$this, 'settings_page']);
        add_action('woocommerce_update_options-u_pizza', [$this, 'update_woo_settings']);
    }

    //zwraca taby
    public function add_settings_tab($settings_tabs)
    {
        $settings_tabs['u-pizza'] = esc_html__('Pizza', 'u-pizza');        
        return $settings_tabs;
    }

    //zwraca jakiś plik php html
    public function settings_php()
    {
        //pizza settings.php
        require_once U_PIZZA_PATH . 'templates/admin/pizza-settings.php';
    }

    //zapisuje informacje z pliku?
    public function update_woo_settings()
    {
     
    }

}