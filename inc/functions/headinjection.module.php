<?php
function vall_wpfw_headInjection() {
  echo get_option('vall_wpfw_option_general_injectcustomcodeheader');
}

add_action('wp_head', 'vall_wpfw_headInjection');

?>
