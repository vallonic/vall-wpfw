<?php
function vallLoadCSS() {
  global $plugin_path;
  if ( is_admin() ) {
    foreach ( glob( $plugin_path . "assets/css/*.css" ) as $file ) {
      echo '<link rel="stylesheet" type="text/css" href="'. $file . '">';
    }
  } else {}
}

add_action('admin_head', 'vallLoadCSS');

?>
