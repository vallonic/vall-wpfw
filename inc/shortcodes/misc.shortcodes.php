<?php
## SHORTCODE: Vallonic.com url
function miscShortcodeVallonic() {
  return "http://vallonic.com";
}


function miscShortcodeGoodMEN() {
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

?>
