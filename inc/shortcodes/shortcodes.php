<?php
// Alle shortcodes in includen
foreach(glob('*.shortcodes.php') as $file) {
     include $file;
}

// Shortcode nu registreren en daarna inladen
add_shortcode( 'vallonic-groet', 'miscShortcodeGoodMEN' ); //Registreert de shortcode: 'miscShortcodes_goodMEN' uit 'misc'
add_shortcode( 'vallonic', 'miscShortcodeVallonic' ); //Registreert de shortcode: 'miscShortcodes_vallonic' uit 'misc'

/*
function initShortcodes() {
  add_shortcode( 'vallonic-groet', 'miscShortcodeGoodMEN' ); //Registreert de shortcode: 'miscShortcodes_goodMEN' uit 'misc'
  add_shortcode( 'vallonic', 'miscShortcodeVallonic' ); //Registreert de shortcode: 'miscShortcodes_vallonic' uit 'misc'
}
add_action('init', 'initShortcodes');*/
?>
