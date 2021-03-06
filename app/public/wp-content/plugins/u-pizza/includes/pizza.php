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
    public function __construct() 
    {
        add_filter('woocommerce_settings_tabs_array',[$this, 'add_settings_tab'], 50);
        add_action('woocommerce_settings_u_pizza', [$this, 'settings_page']);
        add_action('woocommerce_update_options_u_pizza', [$this, 'update_woo_settings']);
        // add_filter('u_pizza_default_data', [$this, 'modify_default_data']);
    }

    //zwraca taby
    public function add_settings_tab($settings_tabs)
    {
        $settings_tabs['u_pizza'] = esc_html__('Pizza', 'u-pizza');        
        return $settings_tabs;
    }

    //zwraca jakiś plik php html
    public function settings_page()
    {
        //pizza settings.php
        require_once U_PIZZA_PATH . 'templates/admin/pizza-settings.php';
        
        
    }

    //zapisuje informacje z pliku?
    public function update_woo_settings()
    {
        if (empty($_POST['_pizzanonce']) || !wp_verify_nonce($_POST['_pizzanonce'], 'u_pizza_woo_settings')) {
            return;
        }
        //update_option() updates the value of an option that was already added. Saved to wp_options table
        update_option('u_pizza_data', $_POST['pizza_data']);
    }

    // this ads data
    public function modify_default_data($data) {
        $data[] = [
            'id' => 3,
            'group' => 'Group 3'
        ];
        return $data;
    }

}




