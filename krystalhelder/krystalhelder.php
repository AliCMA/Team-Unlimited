<?php
/*
 * Plugin Name:     Krystal Helder
*/
require "krystal_install.php";

register_activation_hook(__FILE__, 'krystal_install');
register_deactivation_hook(__FILE__, 'krystal_uninstall');