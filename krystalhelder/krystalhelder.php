<?php
/*
 * Plugin Name: Krystal Helder
 * Description: Takes exports db to from woocommerce
 * Version: 1.0
*/
require "krystal_install.php";

register_activation_hook(__FILE__, 'krystal_install');
register_deactivation_hook(__FILE__, 'krystal_uninstall');

if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}

function display_db() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'krystalhelder';

    $result = $wpdb->get_results("SELECT order_item_id, order_item_name, order_item_type, order_id FROM {$table_name}");
    $retVal = "";
    foreach($result as $value) {
        $retVal  = "{$retVal} {$value->order_item_id} {$value->order_item_name}, {$value->order_item_type}, {$value->order_id}<br><br>";
    }
    return $retVal;
}
add_shortcode('shortcodeKrys', 'display_db');
