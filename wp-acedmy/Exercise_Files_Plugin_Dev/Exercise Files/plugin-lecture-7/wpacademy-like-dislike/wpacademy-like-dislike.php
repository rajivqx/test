<?php
/*
* Plugin Name: WPacademy Like/Dislike
* Plugin URI: https://wpacademy.pk
* Author: WPacademy.PK
* Author URI: https://wpacademy.pk
* Description: Simple Post Like & Dislike System.
* Version: 1.0.0
* License: GPL2
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wpaclike
*/

//If this file is called directly, abort.
if (!defined( 'WPINC' )) {
    die;
}

//Define Constants
if ( !defined('WPAC_PLUGIN_VERSION')) {
    define('WPAC_PLUGIN_VERSION', '1.0.0');
}
if ( !defined('WPAC_PLUGIN_DIR')) {
    define('WPAC_PLUGIN_DIR', plugin_dir_url( __FILE__ ));
}

//Include Scripts & Styles
if( !function_exists('wpac_plugin_scripts')) {
    function wpac_plugin_scripts() {
        wp_enqueue_style('wpac-css', WPAC_PLUGIN_DIR. 'assets/css/style.css');
        wp_enqueue_script('wpac-js', WPAC_PLUGIN_DIR. 'assets/js/main.js', 'jQuery', '1.0.0', true );
    }
    add_action('wp_enqueue_scripts', 'wpac_plugin_scripts');
}

//Settings Menu & Page
require plugin_dir_path( __FILE__ ). 'inc/settings.php';

// Create Table for our plugin.

function wpac_likes_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . "wpac_like_system";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    time timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
    user_id mediumint(9) NOT NULL,
    post_id mediumint(9) NOT NULL,
    like_count mediumint(9) NOT NULL,
    dislike_count mediumint(9) NOT NULL,
    PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'wpac_likes_table' );


?>