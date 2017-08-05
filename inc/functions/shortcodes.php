<?php
## SHORTCODE: Vallonic.com url
function vall() {
  return "http://vallonic.com";
}

function vallGroet() {
  $Hour = date('G');
  $greet = "";

  if ( $Hour >= 5 && $Hour <= 11 ) {
    $greet = "Goedemorgen";
  } else if ( $Hour >= 12 && $Hour <= 18 ) {
    $greet = "Goedemiddag";
  } else if ( $Hour >= 19 || $Hour <= 0 ) {
    $greet = "Goedeavond";
  } else if ( $Hour >= 1 || $Hour <= 4) {
    $greet = "Goedenacht";
  }
  return $greet;
}

// Shortcode nu registreren en daarna inladen
function loadShortcodes() {
  add_shortcode( 'vall-groet', 'vallGroet' );
  add_shortcode( 'vall', 'vall' );
}
?>
