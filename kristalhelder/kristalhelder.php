<?php
/*
 * Plugin Name:     Kristal Helder
*/
require "kristal_install.php";

register_activation_hook(__FILE__, 'kristal_install');
register_deactivation_hook(__FILE__, 'kristal_uninstall');