<?php
// Alle shortcodes in includen
foreach(glob('*.shortcodes.php') as $file) {
     include $file;
}
// Shortcode nu registreren en daarna inladen
function initShortcodes() {
  add_shortcode( 'vallonic-groet', 'miscShortcodes_goodMEN' ); //Registreert de shortcode: 'miscShortcodes_goodMEN' uit 'misc'
  add_shortcode( 'vallonic', 'miscShortcodes_vallonic' ); //Registreert de shortcode: 'miscShortcodes_vallonic' uit 'misc'
}
add_action('init', 'initShortcodes');
?>
