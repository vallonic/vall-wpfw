<?php
## SHORTCODE: Vallonic.com url
function miscShortcodes_vallonic(){
  return "http://vallonic.com";
}


## SHORTCODE: Groet op basis van tijdstip
function miscShortcodes_goodMEN(){
  $Hour = date('G');
  $greet = "";

  if ( $Hour >= 5 && $Hour <= 11 ) {
    $greet = "Goedemorgen";
  } else if ( $Hour >= 12 && $Hour <= 18 ) {
    $greet = "Goedemiddag";
  } else if ( $Hour >= 19 || $Hour <= 0 ) {
    $greet = "Goedeavond";
  } else if ( $Hour >= 1 || $Hour <= 4) {
    $greet = "Goedenacht"
  }
  return $greet;
}
function initShortcodesMisc() {
  add_shortcode( 'vallonic-groet', 'miscShortcodes_goodMEN' ); //Registreert de shortcode: miscShortcodes_goodMEN
  add_shortcode( 'vallonic', 'miscShortcodes_vallonic' ); //Registreert de shortcode: miscShortcodes_vallonic
}
add_action('init', 'initShortcodesMisc');
?>
