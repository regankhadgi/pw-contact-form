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
if ( !class_exists( 'PW_Contact_Form' ) ) {

    class PW_Contact_Form {

        function __construct() {
            $this->define_constants();
            add_action( 'admin_menu', array( $this, 'pw_admin_menu' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_assets' ) );

            add_action( 'admin_post_pw_settings_save_action', array( $this, 'save_settings_action' ) );
        }

        function define_constants() {
            defined( 'PWCF_PATH' ) or define( 'PWCF_PATH', plugin_dir_path( __FILE__ ) );
            defined( 'PWCF_URL' ) or define( 'PWCF_URL', plugin_dir_url( __FILE__ ) );
            defined( 'PWCF_VERSION' ) or define( 'PWCF_VERSION', '1.0.0' );
        }

        function pw_admin_menu() {
            add_menu_page( 'PW Conatct Form', 'PW Contact Form', 'manage_options', 'pw-contact-form', array( $this, 'pw_settings_page' ), 'dashicons-email' );
        }

        function pw_settings_page() {
            include(PWCF_PATH . 'includes/views/backend/settings.php');
        }

        function register_admin_assets() {
            wp_enqueue_style( 'pwcf-backend-style', PWCF_URL . 'assets/css/pwcf-backend.css', array(), PWCF_VERSION );
            wp_enqueue_script( 'pwcf-backend-script', PWCF_URL . 'assets/js/pwcf-backend.js', array( 'jquery' ), PWCF_VERSION );
        }

        function save_settings_action() {
            if ( !empty( $_POST['pwcf_settings_nonce_field'] ) && wp_verify_nonce( $_POST['pwcf_settings_nonce_field'], 'pwcf_settings_nonce' ) ) {
                $name_field_label = sanitize_text_field( $_POST['name_field_label'] );
                $email_field_label = sanitize_text_field( $_POST['email_field_label'] );
                $message_field_label = sanitize_text_field( $_POST['message_field_label'] );
                $submit_button_label = sanitize_text_field( $_POST['submit_button_label'] );
                $admin_email = sanitize_email( $_POST['admin_email'] );
                $pwcf_settings = array(
                    'name_field_label' => $name_field_label,
                    'email_field_label' => $email_field_label,
                    'message_field_label' => $message_field_label,
                    'submit_button_label' => $submit_button_label,
                    'admin_email' => $admin_email );
                update_option( 'pwcf_settings', $pwcf_settings );
                wp_redirect( admin_url( 'admin.php?page=pw-contact-form&message=1' ) );
                exit;
            }
        }

        function print_array( $array ) {
            if ( isset( $_GET['debug'] ) ) {
                echo "<pre>";
                print_r( $array );
                echo "</pre>";
            }
        }

    }

    new PW_Contact_Form();
}
