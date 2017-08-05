<?php
// Alle shortcodes in includen
foreach(glob('*.shortcodes.php') as $file) {
     include $file;
}

// Shortcode nu registreren en daarna inladen
add_shortcode( 'vall-groet', 'miscShortcodeGoodMEN' ); //Registreert de shortcode: 'miscShortcodes_goodMEN' uit 'misc'
add_shortcode( 'vall', 'miscShortcodeVallonic' ); //Registreert de shortcode: 'miscShortcodes_vallonic' uit 'misc'
?>
