<?php
function vall_wpfw_siteChecker() {
  $siteurl = site_url();
  if (strpos($siteurl, 'vallonic.') !== false) {
    return 'true';
  }
}
?>
