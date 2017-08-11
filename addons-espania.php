<?php
/*
Plugin Name: Addons Espania
Description: Core functionality for Espania Theme
Version: 1.02
Author: ILLID
Author URI:
Text Domain: espania
*/

$theme = wp_get_theme();

if ( 'Espania' == $theme->name || 'Espania' == $theme->parent_theme ) {

    if ( ! addons_espania_is_plugin_active( 'addons-espania-pro' ) ) {

        define('ADDONS_ESPANIA_DIR', dirname(__FILE__));
        define('ADDONS_ESPANIA_URL', plugins_url('', __FILE__));

        // Shortcodes
        include_once("shortcodes/shortcodes.php");
        include_once("shortcodes/shortcodes-init.php");

        // Widgets
        include_once("widgets/widget-flickr.php");
        include_once("widgets/widget-facebook-box.php");
        include_once("widgets/widget-video.php");
        include_once("widgets/widget-social-icons.php");

        // Metabox components
        include_once("meta-box/meta-box.php");
        include_once("meta-box/metaboxes-init.php");

    }

}

/*
 * Check whether the plugin is active by checking the active_plugins list
 */
function addons_espania_is_plugin_active( $plugin ) {
    $plugin = $plugin . '/' . $plugin . '.php';
    return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) || addons_espania_is_plugin_active_for_network( $plugin );
}

/*
 * Check whether the plugin is active for the entire network
 */
function addons_espania_is_plugin_active_for_network( $plugin ) {
    if ( !is_multisite() )
        return false;

    $plugins = get_site_option( 'active_sitewide_plugins');
    if ( isset($plugins[$plugin]) )
        return true;

    return false;
}