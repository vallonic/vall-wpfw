<?php
/*
Plugin Name: Vallonic WordPress Framework
Description: Maakt het leven van Vallonians makkelijker
Version:     v0.0.2.1
Author:      Vallonic
Author URI:  http://www.vallonic.com
*/

// Updater class inladen
require_once( 'inc/classes/updater.php' );
if ( is_admin() ) {
    new VallonicWPFWGitHubPluginUpdater( __FILE__, 'vallonic', "vall-wpfw" );
}

// Shortcodes
require_once( 'inc/functions/shortcodes.php' );
loadShortcodes();

// Protected pages
require_once( 'inc/functions/protectedpages.php' );

// RSS feed Vallonic.com
require_once( 'inc/functions/vallonicrss.admin.php' );

?>
