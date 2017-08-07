<?php
function vallLoadCSS() {
  global $plugin_path;
  global $plugin_url;
  if ( is_admin() ) {
    foreach ( glob( $plugin_path . "assets/css/*.admin.css" ) as $file ) {
      // Folder path uit string halen en vervangen met site url
      $fileurl =  str_replace($plugin_path, $plugin_url, $file);
      echo '<link rel="stylesheet" type="text/css" href="'. $fileurl . '">';
    }
  } else {}
}

add_action('admin_head', 'vallLoadCSS');

?>
