<?php
global $krystal_db_version;
$krystal_db_version = '1.0';

function kristal_install(){
    //wpdb built in class with some functions that you need for db
    global $wpdb;
    //absence doesnt result in error, is customary
    global $krystal_db_version;

    //makes table name to standart prefix (wp_) + 'krystalhelder'
    $table_name = $wpdb->prefix . 'krystalhelder';

    //search up charsets and collation
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        product tinytext NOT NULL,
        text text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    //needs to run
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    //runs sql query
    dbDelta($sql);

    //adds a new row to wp_options for (in this case) documentation as it is db version
    add_option('krystal_db_version', $krystal_db_version);
}




function kristal_uninstall(){
    global $wpdb;
    global $krystal_db_version;

    $table_name = $wpdb->prefix . 'krystalhelder';

    /* $charset_collate = $wpdb->get_charset_collate(); */

    $sql = "INSERT INTO $table_name(id) values (4)";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);

    /* add_option('krystal_db_version', $krystal_db_version); */
}

function kristal_addData($product_data){
    $table_name = $wpdb->prefix . 'kristalhelder';
    $sql = "INSERT INTO $table_name (product) VALUES ($product_data)";
    dbDelta($sql);
}