<?php
/*
Plugin Name: Vallonic WordPress Framework
Description: Maakt het leven van Vallonians makkelijker
Version:     v0.0.1.3-alpha0.3.2
Author:      Vallonic
Author URI:  http://www.vallonic.com
*/

// Updater class inladen
require_once( 'inc/classes/updater.php' );
if ( is_admin() ) {
    new VallonicWPFWGitHubPluginUpdater( __FILE__, 'vallonic', "vall-wpfw" );
}

// Shortcodes inladen
require_once( 'inc/shortcodes/shortcodes.php' );
?>
