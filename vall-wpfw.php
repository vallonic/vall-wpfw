<?php
/*
Plugin Name: Vallonic WordPress Framework
Description: Maakt het leven van Vallonians makkelijker
Version:     v0.0.3
Author:      Vallonic
Author URI:  http://www.vallonic.com
Text Domain: vall-wpfw
*/
if ( is_admin() ) {
  $plugin_data = get_plugin_data( __FILE__ );
  $plugin_path = plugin_dir_path( __FILE__ );
}

// Updater class inladen
require_once( 'inc/classes/updater.php' );
if ( is_admin() ) {
    new VallonicWPFWGitHubPluginUpdater( __FILE__, 'vallonic', "vall-wpfw" );
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

/*// Shortcodes
require_once( 'inc/functions/shortcodes.module.php' );

// Protected pages
require_once( 'inc/functions/protectedpages.module.php' );

// RSS feed Vallonic.com
require_once( 'inc/functions/vallonicrss.widget.admin.php' );

// Admin opties
require_once( 'inc/functions/pages.admin.php' );

// CSS
require_once( 'inc/functions/loadcss.module.admin.php' );*/

?>
