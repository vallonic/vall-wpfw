<?php
// Alle shortcodes in includen
foreach(glob('*.shortcodes.php') as $file) {
     include $file;
}
?>
