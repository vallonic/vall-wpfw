<?php
## SHORTCODE: Vallonic.com url
function vall() {
  return "http://vallonic.com";
}

function vallGroet() {
  date_default_timezone_set('Europa/Amsterdam');
  $Hour = date('G');
  $greet = "";

  if ( $Hour >= 5 && $Hour <= 11 ) {
    $greet = "Goedemorgen";
  } else if ( $Hour >= 12 && $Hour <= 17 ) {
    $greet = "Goedemiddag";
  } else if ( $Hour >= 18 && $Hour <= 0 ) {
    $greet = "Goedeavond";
  } else if ( $Hour >= 1 && $Hour <= 4) {
    $greet = "Goedenacht";
  }
  return $greet;
}

// Shortcode nu registreren
function loadShortcodes() {
  add_shortcode( 'vall-groet', 'vallGroet' );
  add_shortcode( 'vall', 'vall' );
}
?>
