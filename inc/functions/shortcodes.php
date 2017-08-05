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
    return $greet;
  } else if ( $Hour >= 12 && $Hour <= 18 ) {
    $greet = "Goedemiddag";
    return $greet;
  } else if ( $Hour >= 19 || $Hour <= 0 ) {
    $greet = "Goedeavond";
    return $greet;
  } else if ( $Hour >= 1 || $Hour <= 4) {
    $greet = "Goedenacht";
    return $greet;
  }
  //return $greet;
  //return "hallo";
}

// Shortcode nu registreren en daarna inladen
add_shortcode( 'vall-groet', 'miscShortcodeGoodMEN' ); //Registreert de shortcode: 'miscShortcodes_goodMEN' uit 'misc'
add_shortcode( 'vall', 'miscShortcodeVallonic' ); //Registreert de shortcode: 'miscShortcodes_vallonic' uit 'misc'
?>
