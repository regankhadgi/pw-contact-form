<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );
/**
 * Plugin Name:       PW Contact Form
 * Plugin URI:        https://github.com/regankhadgi/pw-contact-form
 * Description:       A demo contact form plugin for the WordPress Plugin Development Workshop
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.0
 * Author:            Regan Khadgi
 * Author URI:        https://github.com/regankhadgi
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pw-contact-form
 * Domain Path:       /languages
 */
add_action( 'admin_menu', 'pw_admin_menu' );
if ( !function_exists( 'pw_admin_menu' ) ) {

    function pw_admin_menu() {
        add_menu_page( 'PW Conatct Form', 'PW Contact Form', 'manage_options', 'pw-contact-form', 'pw_settings_page', 'dashicons-email' );
    }

}

if ( !function_exists( 'pw_settings_page' ) ) {

    function pw_settings_page() {
        echo "This is our plugin's settings page";
    }

}