<?php
add_action('wp_dashboard_setup', 'remove_wpseo_dashboard_overview' );
function remove_wpseo_dashboard_overview() {
  // In some cases, you may need to replace 'side' with 'normal' or 'advanced'.
  remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
}
?>
