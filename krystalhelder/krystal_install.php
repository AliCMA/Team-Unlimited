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
    write_log('THIS IS THE START OF MY CUSTOM DEBUG');

    global $wpdb;
    global $krystal_db_version;

    $table_name = $wpdb->prefix . 'krystalhelder';

    /* $charset_collate = $wpdb->get_charset_collate(); */

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    
    $ItemQuery = $wpdb->get_results("SELECT order_item_id, order_item_name, order_item_type, order_id FROM wp_woocommerce_order_items ORDER BY order_item_id ASC");

    write_log($ItemQuery);


    /* add_option('krystal_db_version', $krystal_db_version); */
    /* $result = $wpdb->get_results("SELECT product FROM {$table_name}"); */

    foreach($ItemQuery as $value){
        insert_data($value->order_item_id, $value->order_item_name, $value->order_item_type, $value->order_id);
    }
    
    
}

function insert_data($itemId, $itemName, $itemType, $orderId) {
    $url = "host.docker.internal:3030/kristal/create?access-token=100-token";

    $ch = curl_init( $url );
    # Setup request to send json via POST.
    $payload = json_encode( array(
        'order_item_id' => $itemId,
        'order_item_name' =>  $itemName /* $NameQuery */,
        'order_item_type' => $itemType/* $typeQuery */,
        'order_id' => $orderId/* $orderIdQuery */,
    ) );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    # Send request.
    write_log($ch);
    $result = curl_exec($ch);
    curl_close($ch);
    write_log($result);
}