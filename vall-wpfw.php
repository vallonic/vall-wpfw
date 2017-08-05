<?php
/*
Plugin Name: Vallonic WordPress Framework
Description: Maakt het leven van Vallonians makkelijker
Version:     v0.0.1
Author:      Vallonic
Author URI:  http://www.vallonic.com
*/

// Updater class inladen
require_once( 'updater.php' );
if ( is_admin() ) {
    new VallonicWPFWGitHubPluginUpdater( __FILE__, 'vallonic', "vall-wpfw" );
}
?>
