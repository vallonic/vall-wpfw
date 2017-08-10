<?php
/*
Plugin Name: Vallonic WordPress Framework
Description: Maakt het leven van Vallonians makkelijker.
Version:     v1.0.0
Author:      Vallonic
Author URI:  http://www.vallonic.com
Text Domain: vall-wpfw
*/

if (is_admin()) {
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  $plugin_data = get_plugin_data( __FILE__ );
  $plugin_path = plugin_dir_path( __FILE__ );
  $plugin_url = plugin_dir_url( __FILE__ );
  $vallwpfw = plugin_dir_path( __FILE__ );
}

// Updater class inladen
require_once( 'inc/classes/updater.php' );
if ( is_admin() ) {
  $pluginfile = plugin_dir_path( __FILE__ );
  new VallonicWPFWGitHubPluginUpdater( __FILE__, 'vallonic', "vall-wpfw", 'iD32_v5v897Qb8skTzEa' );
}

// Taalbestanden
function vallwpfw_load_languages() {
    load_plugin_textdomain( 'vall-wpfw', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'vallwpfw_load_languages' );

// Alles inladen van /inc/functions/
foreach ( glob( plugin_dir_path( __FILE__ ) . "inc/functions/*.php" ) as $file ) {
    include_once $file;
}
?>
