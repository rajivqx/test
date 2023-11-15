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

        //Plugin Frontend CSS
        wp_enqueue_style('wpac-css', WPAC_PLUGIN_DIR. 'assets/css/style.css');

        //FontAwesome CSS
        wp_enqueue_style( 'wpac-font-awesome', WPAC_PLUGIN_DIR. 'assets/font-awesome/css/fontawesome-all.min.css', array(), NULL);
    
        wp_enqueue_script('wpac-js', WPAC_PLUGIN_DIR. 'assets/js/main.js', 'jQuery', '1.0.0', true );
    }
    add_action('wp_enqueue_scripts', 'wpac_plugin_scripts');
}

//Settings Menu & Page
require plugin_dir_path( __FILE__ ). 'inc/settings.php';

// Create Table for our plugin.
require plugin_dir_path( __FILE__ ). 'inc/db.php';

// Create Like & Dislike Buttons using filter.
function wpac_like_dislike_buttons($content) {
    $like_btn_wrap = '<div class="wpac-buttons-container">';
    $like_btn = '<a href="javascript:;" class="wpac-btn wpac-like-btn"><i class="fas fa-thumbs-up"></i> Like</a>';
    $dislike_btn = '<a href="javascript:;" class="wpac-btn wpac-dislike-btn">Dislike <i class="fas fa-thumbs-down"></i></a>';
    $like_btn_wrap_end = '</div>';

    $content .= $like_btn_wrap;
    $content .= $like_btn;
    $content .= $dislike_btn;
    $content .= $like_btn_wrap_end;

    return $content;

}
add_filter('the_content', 'wpac_like_dislike_buttons');


?>