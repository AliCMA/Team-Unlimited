<?php
global $krystal_db_version;
$krystal_db_version = '1.0';

function krystal_install(){
    //wpdb built in class with some functions that you need for db
    global $wpdb;
    //absence doesnt result in error, is customary
    global $krystal_db_version;

    //makes table name to standart prefix (wp_) + 'krystalhelder'
    $table_name = $wpdb->prefix . 'krystalhelder';

    //search up charsets and collation
    $charset_collate = $wpdb->get_charset_collate();

    /* $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        product tinytext NOT NULL,
        text text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;"; */

    $sql = "CREATE TABLE $table_name (
        order_item_id bigint(20) unsigned,
        order_item_name text,
        order_item_type varchar(200),
        order_id bigint(20) unsigned
        ) $charset_collate;"; 

    //needs to run
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    //runs sql query
    dbDelta($sql);

    //adds a new row to wp_options for (in this case) documentation as it is db version
    add_option('krystal_db_version', $krystal_db_version);
}

function krystal_uninstall(){
    global $wpdb;
    global $krystal_db_version;

    $table_name = $wpdb->prefix . 'krystalhelder';

    /* $charset_collate = $wpdb->get_charset_collate(); */
    $firstQuery = "SELECT order_item_id FROM wp_woocommerce_order_items ORDER BY order_item_id DESC LIMIT 1;";
    $secondQuery = "SELECT order_item_name FROM wp_woocommerce_order_items ORDER BY order_item_id DESC LIMIT 1;";
    $thirdQuery = "SELECT order_item_type FROM wp_woocommerce_order_items ORDER BY order_item_id DESC LIMIT 1;";
    $forthQuery = "SELECT order_id FROM wp_woocommerce_order_items ORDER BY order_item_id DESC LIMIT 1;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    
    $ItemIdQuery = dbDelta($firstQuery);
    $NameQuery = dbDelta($secondQuery);
    $typeQuery = dbDelta($thirdQuery);
    $orderIdQuery = dbDelta($forthQuery);

    //problem was with name having a spacebar and line_item being a link
    $sql = "INSERT INTO $table_name(order_item_id, order_item_name, order_item_type, order_id) values ($ItemIdQuery, '$NameQuery', '$typeQuery', $orderIdQuery)";

    dbDelta($sql);

    /* add_option('krystal_db_version', $krystal_db_version); */
}

function krystal_addData($product_data){
    $table_name = $wpdb->prefix . 'krystalhelder';
    $sql = "INSERT INTO $table_name (product) VALUES ($product_data)";
    dbDelta($sql);
}